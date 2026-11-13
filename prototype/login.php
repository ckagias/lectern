<?php
// Login page: email and password. A right pair starts the session and opens the dashboard.
$base = '';
require_once $base . 'includes/init.php';

if (isLoggedIn()) {
    redirect('dashboard.php');
}

// A message left by the page before, for example after registering, is shown once.
$flash = '';
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

$email = '';
$errors = ['email' => '', 'password' => '', 'login' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim(post('email'));
    $password = post('password');
    $validator = new Validator();

    $errors['email'] = $validator->email($email);
    $errors['password'] = $validator->loginPassword($password);

    if (implode('', $errors) === '') {
        $users = new User(new Database());
        $user = $users->checkLogin($email, $password);
        if ($user === null) {
            // One message for a wrong email and a wrong password, so it does not tell which one was wrong.
            $errors['login'] = 'err_login';
        } else {
            // A new session id, so an id someone else knew before the login is no longer valid.
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role_id'] = $user['role_id'];
            redirect('dashboard.php');
        }
    }
}

$layout = 'public';
$title = t('login');
$styles = ['css/auth.css'];
$bodyClass = 'layout-auth';
$scripts = ['js/validate.js'];
require $base . 'includes/header.php';
?>
<div class="auth">
    <?php if ($errors['login'] !== '') { ?>
        <div class="flash flash-error" role="alert"><svg class="icon" aria-hidden="true"><use href="#ic-alert"/></svg><p><?php echo t($errors['login']); ?></p></div>
    <?php } elseif ($flash !== '') { ?>
        <div class="flash flash-success"><svg class="icon" aria-hidden="true"><use href="#ic-check"/></svg><p><?php echo t($flash); ?></p></div>
    <?php } ?>
    <div class="auth-head">
        <h1><?php echo t('login'); ?></h1>
    </div>

    <form class="panel" id="login-form" action="login.php" method="post" novalidate>
        <div class="field">
            <label for="email"><?php echo t('reg_email'); ?></label>
            <input class="input" id="email" name="email" type="email" autocomplete="email" required aria-describedby="email-error" data-rule="email" data-error="<?php echo e(t('err_email')); ?>" value="<?php echo e($email); ?>"<?php if ($errors['email'] !== '') { echo ' aria-invalid="true"'; } ?>>
            <p class="error" id="email-error" aria-live="polite"><?php echo t($errors['email']); ?></p>
        </div>

        <div class="field">
            <label for="password"><?php echo t('reg_password'); ?></label>
            <input class="input" id="password" name="password" type="password" autocomplete="current-password" required aria-describedby="password-error" data-rule="filled" data-error="<?php echo e(t('err_password_empty')); ?>"<?php if ($errors['password'] !== '') { echo ' aria-invalid="true"'; } ?>>
            <p class="error" id="password-error" aria-live="polite"><?php echo t($errors['password']); ?></p>
        </div>

        <button class="btn action block" type="submit"><?php echo t('login'); ?></button>

        <p class="switch"><?php echo t('log_no_account'); ?> <a href="register.php"><?php echo t('register'); ?></a></p>
    </form>
</div>
<?php require $base . 'includes/footer.php'; ?>
