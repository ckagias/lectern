<?php
// Registration page: a form to create a member or librarian account. The server checks every value again, even when the browser already did.
$base = '';
require_once $base . 'includes/init.php';

if (isLoggedIn()) {
    redirect('dashboard.php');
}

$username = '';
$email = '';
$role = 'member';
$errors = ['username' => '', 'email' => '', 'password' => '', 'confirm' => '', 'role' => '', 'code' => '', 'form' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim(post('username'));
    $email = trim(post('email'));
    $password = post('password');
    $role = post('role');
    $validator = new Validator();

    $errors['username'] = $validator->username($username);
    $errors['email'] = $validator->email($email);
    $errors['password'] = $validator->password($password);
    $errors['confirm'] = $validator->passwordsMatch($password, post('confirm'));
    $errors['role'] = $validator->role($role);
    $errors['code'] = $validator->code($role, post('code'));

    try {
        // A username or email that is already used is only looked up when its format is fine.
        $users = new User(new Database());
        if ($errors['username'] === '' && $users->findByUsername($username) !== null) {
            $errors['username'] = 'err_username_taken';
        }
        if ($errors['email'] === '' && $users->findByEmail($email) !== null) {
            $errors['email'] = 'err_email_taken';
        }

        $ok = true;
        foreach ($errors as $message) {
            if ($message !== '') {
                $ok = false;
            }
        }
        if ($ok) {
            // The role id comes from the checked role, never from the form.
            $roleId = ROLE_MEMBER;
            if ($role === 'librarian') {
                $roleId = ROLE_LIBRARIAN;
            }
            $users->create($username, $email, $password, $roleId);
            $_SESSION['flash'] = 'flash_registered';
            redirect('login.php');
        }
    } catch (Exception $e) {
        $errors['form'] = 'err_database';
    }
}
if ($role !== 'librarian') {
    $role = 'member';
}
$codeLabel = 'reg_code_' . $role;

$layout = 'public';
$title = t('reg_title');
$styles = ['css/auth.css'];
$bodyClass = 'layout-auth';
$scripts = ['js/validate.js'];
require $base . 'templates/header.php';
?>
<div class="auth">
    <div class="auth-head">
        <h1><?php echo t('reg_title'); ?></h1>
        <p class="auth-lead"><?php echo t('auth_register_lead'); ?></p>
    </div>
    <?php if ($errors['form'] !== '') { ?>
        <div class="flash flash-error" role="alert"><svg class="icon" aria-hidden="true"><use href="#ic-alert"/></svg><p><?php echo t($errors['form']); ?></p></div>
    <?php } ?>

    <form class="panel" id="register-form" action="register.php" method="post" novalidate>
        <div class="field">
            <label for="username"><?php echo t('reg_username'); ?></label>
            <input class="input" id="username" name="username" type="text" autocomplete="username" required aria-describedby="username-error" data-rule="username" data-error="<?php echo e(t('err_username')); ?>"<?php if ($errors['username'] !== '') { echo ' aria-invalid="true"'; } ?> value="<?php echo e($username); ?>">
            <p class="error" id="username-error" aria-live="polite"><?php echo t($errors['username']); ?></p>
        </div>

        <div class="field">
            <label for="email"><?php echo t('reg_email'); ?></label>
            <input class="input" id="email" name="email" type="email" autocomplete="email" required aria-describedby="email-error" data-rule="email" data-error="<?php echo e(t('err_email')); ?>"<?php if ($errors['email'] !== '') { echo ' aria-invalid="true"'; } ?> value="<?php echo e($email); ?>">
            <p class="error" id="email-error" aria-live="polite"><?php echo t($errors['email']); ?></p>
        </div>

        <div class="field">
            <label for="password"><?php echo t('reg_password'); ?></label>
            <input class="input" id="password" name="password" type="password" autocomplete="new-password" required aria-describedby="password-error" data-rule="password" data-error="<?php echo e(t('err_password')); ?>"<?php if ($errors['password'] !== '') { echo ' aria-invalid="true"'; } ?>>
            <p class="error" id="password-error" aria-live="polite"><?php echo t($errors['password']); ?></p>
        </div>

        <div class="field">
            <label for="confirm"><?php echo t('reg_confirm'); ?></label>
            <input class="input" id="confirm" name="confirm" type="password" autocomplete="new-password" required aria-describedby="confirm-error" data-rule="confirm" data-error="<?php echo e(t('err_password_match')); ?>"<?php if ($errors['confirm'] !== '') { echo ' aria-invalid="true"'; } ?>>
            <p class="error" id="confirm-error" aria-live="polite"><?php echo t($errors['confirm']); ?></p>
        </div>

        <fieldset class="choices">
            <legend><?php echo t('reg_role'); ?></legend>
            <div class="choice-row">
                <label class="choice"><input type="radio" name="role" value="member" data-code-label="<?php echo e(t('reg_code_member')); ?>"<?php if ($role === 'member') { echo ' checked'; } ?>><?php echo t('role_member'); ?></label>
                <label class="choice"><input type="radio" name="role" value="librarian" data-code-label="<?php echo e(t('reg_code_librarian')); ?>"<?php if ($role === 'librarian') { echo ' checked'; } ?>><?php echo t('role_librarian'); ?></label>
            </div>
            <p class="error" id="role-error" aria-live="polite"><?php echo t($errors['role']); ?></p>
        </fieldset>

        <div class="field">
            <label for="code" id="code-label"><?php echo t($codeLabel); ?></label>
            <input class="input" id="code" name="code" type="text" autocomplete="off" required aria-describedby="code-error" data-rule="code" data-error="<?php echo e(t('err_code')); ?>"<?php if ($errors['code'] !== '') { echo ' aria-invalid="true"'; } ?>>
            <p class="error" id="code-error" aria-live="polite"><?php echo t($errors['code']); ?></p>
        </div>

        <button class="btn action block" type="submit"><?php echo t('reg_submit'); ?></button>
    </form>

    <p class="switch"><?php echo t('reg_has_account'); ?> <a href="login.php"><?php echo t('login'); ?></a></p>
    <p class="auth-legal"><?php echo t('auth_legal_before'); ?><a href="privacy.php"><?php echo t('privacy_link'); ?></a><?php echo t('auth_legal_after'); ?></p>
</div>
<?php require $base . 'templates/footer.php'; ?>
