<?php
// Checks the email and password. A right pair starts the session and opens the dashboard.
$base = '';
require_once $base . 'includes/init.php';

if (isLoggedIn()) {
    redirect('dashboard.php');
}

// A message from the previous page shows once. Registering leaves one.
$flash = '';
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

$email = '';
$errors = ['email' => '', 'password' => '', 'login' => ''];

// The form was sent.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim(post('email'));
    $password = post('password');
    $validator = new Validator();

    $errors['email'] = $validator->email($email);
    $errors['password'] = $validator->loginPassword($password);

    if ($errors['email'] === '' && $errors['password'] === '') {
        try {
            $users = new User(new Database());
            $user = $users->checkLogin($email, $password);
            if ($user === null) {
                // One message for a wrong email or password. It does not reveal which failed.
                $errors['login'] = 'err_login';
            } else {
                // A new session id makes an id known before login useless.
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role_id'] = $user['role_id'];
                redirect('dashboard.php');
            }
        } catch (Exception $e) {
            // The database could not be reached.
            $errors['login'] = 'err_database';
        }
    }
}

$layout = 'public';
$title = t('login');
$active = 'login';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="only light">
    <title><?php echo $title; ?> · AchaiaReads</title>
    <link rel="icon" href="<?php echo $base; ?>pictures/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?php echo $base; ?>css/fonts.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/tokens.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/base.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/layout.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/components.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/forms.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/auth.css">
</head>
<body class="layout-public layout-auth">
    <?php require $base . 'templates/header.php'; ?>

    <main id="main">
        <div class="auth">
            <div class="auth-head">
                <h1><?php echo t('login'); ?></h1>
                <p class="auth-lead"><?php echo t('auth_login_lead'); ?></p>
            </div>
            <?php if ($errors['login'] !== '') { ?>
                <div class="flash flash-error" role="alert"><svg class="icon" aria-hidden="true"><use href="#ic-alert"/></svg><p><?php echo t($errors['login']); ?></p></div>
            <?php } elseif ($flash !== '') { ?>
                <div class="flash flash-success"><svg class="icon" aria-hidden="true"><use href="#ic-check-line"/></svg><p><?php echo t($flash); ?></p></div>
            <?php } ?>

            <form class="panel" id="login-form" action="login.php" method="post" novalidate>
                <div class="field">
                    <label for="email"><?php echo t('reg_email'); ?></label>
                    <input class="input" id="email" name="email" type="email" autocomplete="email" required aria-describedby="email-error" data-rule="email" data-error="<?php echo e(t('err_email')); ?>"<?php if ($errors['email'] !== '') { ?> aria-invalid="true"<?php } ?> value="<?php echo e($email); ?>">
                    <p class="error" id="email-error" aria-live="polite"><?php echo t($errors['email']); ?></p>
                </div>

                <div class="field">
                    <label for="password"><?php echo t('reg_password'); ?></label>
                    <input class="input" id="password" name="password" type="password" autocomplete="current-password" required aria-describedby="password-error" data-rule="filled" data-error="<?php echo e(t('err_password_empty')); ?>"<?php if ($errors['password'] !== '') { ?> aria-invalid="true"<?php } ?>>
                    <p class="error" id="password-error" aria-live="polite"><?php echo t($errors['password']); ?></p>
                </div>

                <button class="btn action block" type="submit"><?php echo t('login'); ?></button>
            </form>

            <p class="switch"><?php echo t('log_no_account'); ?> <a href="register.php"><?php echo t('register'); ?></a></p>
            <p class="auth-legal"><?php echo t('auth_legal_before'); ?><a href="privacy.php"><?php echo t('privacy_link'); ?></a><?php echo t('auth_legal_after'); ?></p>
        </div>
    </main>

    <?php require $base . 'templates/footer.php'; ?>
    <?php require $base . 'templates/icons.php'; ?>
    <script src="<?php echo $base; ?>js/validate.js"></script>
</body>
</html>
