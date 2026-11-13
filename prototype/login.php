<?php
// Login page: email and password.
$base = '';
require_once $base . 'includes/init.php';

$layout = 'public';
$title = t('login');
$styles = ['css/auth.css'];
$bodyClass = 'layout-auth';
$scripts = ['js/validate.js'];
require $base . 'includes/header.php';
?>
<div class="auth">
    <div class="auth-head">
        <h1><?php echo t('login'); ?></h1>
    </div>

    <form class="panel" id="login-form" action="login.php" method="post" novalidate>
        <div class="field">
            <label for="email"><?php echo t('reg_email'); ?></label>
            <input class="input" id="email" name="email" type="email" autocomplete="email" required aria-describedby="email-error" data-rule="email" data-error="<?php echo e(t('err_email')); ?>">
            <p class="error" id="email-error" aria-live="polite"></p>
        </div>

        <div class="field">
            <label for="password"><?php echo t('reg_password'); ?></label>
            <input class="input" id="password" name="password" type="password" autocomplete="current-password" required aria-describedby="password-error" data-rule="filled" data-error="<?php echo e(t('err_password_empty')); ?>">
            <p class="error" id="password-error" aria-live="polite"></p>
        </div>

        <button class="btn action block" type="submit"><?php echo t('login'); ?></button>

        <p class="switch"><?php echo t('log_no_account'); ?> <a href="register.php"><?php echo t('register'); ?></a></p>
    </form>
</div>
<?php require $base . 'includes/footer.php'; ?>
