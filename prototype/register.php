<?php
// Registration page: a form to create a member or librarian account.
$base = '';
require_once $base . 'includes/init.php';

$layout = 'public';
$title = t('reg_title');
$styles = ['css/auth.css'];
$bodyClass = 'layout-auth';
$scripts = ['js/validate.js'];
require $base . 'includes/header.php';
?>
<div class="auth">
    <div class="auth-head">
        <h1><?php echo t('reg_title'); ?></h1>
    </div>

    <form class="panel" id="register-form" action="register.php" method="post" novalidate>
        <div class="field">
            <label for="username"><?php echo t('reg_username'); ?></label>
            <input class="input" id="username" name="username" type="text" autocomplete="username" autocapitalize="none" spellcheck="false" required aria-describedby="username-error" data-rule="username" data-error="<?php echo e(t('err_username')); ?>">
            <p class="error" id="username-error" aria-live="polite"></p>
        </div>

        <div class="field">
            <label for="email"><?php echo t('reg_email'); ?></label>
            <input class="input" id="email" name="email" type="email" autocomplete="email" required aria-describedby="email-error" data-rule="email" data-error="<?php echo e(t('err_email')); ?>">
            <p class="error" id="email-error" aria-live="polite"></p>
        </div>

        <div class="field">
            <label for="password"><?php echo t('reg_password'); ?></label>
            <input class="input" id="password" name="password" type="password" autocomplete="new-password" required aria-describedby="password-error" data-rule="password" data-error="<?php echo e(t('err_password')); ?>">
            <p class="error" id="password-error" aria-live="polite"></p>
        </div>

        <div class="field">
            <label for="confirm"><?php echo t('reg_confirm'); ?></label>
            <input class="input" id="confirm" name="confirm" type="password" autocomplete="new-password" required aria-describedby="confirm-error" data-rule="confirm" data-error="<?php echo e(t('err_password_match')); ?>">
            <p class="error" id="confirm-error" aria-live="polite"></p>
        </div>

        <fieldset class="choices">
            <legend><?php echo t('reg_role'); ?></legend>
            <div class="choice-row">
                <label class="choice"><input type="radio" name="role" value="member" data-code-label="<?php echo e(t('reg_code_member')); ?>" checked><?php echo t('role_member'); ?></label>
                <label class="choice"><input type="radio" name="role" value="librarian" data-code-label="<?php echo e(t('reg_code_librarian')); ?>"><?php echo t('role_librarian'); ?></label>
            </div>
        </fieldset>

        <div class="field">
            <label for="code" id="code-label"><?php echo t('reg_code_member'); ?></label>
            <input class="input" id="code" name="code" type="text" autocomplete="off" autocapitalize="characters" spellcheck="false" required aria-describedby="code-error" data-rule="code" data-error="<?php echo e(t('err_code')); ?>">
            <p class="error" id="code-error" aria-live="polite"></p>
        </div>

        <button class="btn action block" type="submit"><?php echo t('reg_submit'); ?></button>

        <p class="auth-note"><?php echo t('reg_privacy'); ?></p>

        <p class="switch"><?php echo t('reg_has_account'); ?> <a href="login.php"><?php echo t('login'); ?></a></p>
    </form>
</div>
<?php require $base . 'includes/footer.php'; ?>
