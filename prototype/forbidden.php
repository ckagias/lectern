<?php
// Shown when a user opens a page that belongs to the other role. Visitors who are not logged in go to the login page instead.
$base = '';
require_once $base . 'includes/init.php';
requireLogin($base);
http_response_code(403);

$layout = roleName();
$title = 'Forbidden Action';
$active = '';
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
    <link rel="stylesheet" href="<?php echo $base; ?>css/app.css">
</head>
<body class="layout-<?php echo $layout; ?> layout-app empty-page">
    <?php require $base . 'templates/header.php'; ?>

    <main id="main">
        <h1>Forbidden Action</h1>
        <div class="empty forbidden" role="alert">
            <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-alert"/></svg></span>
            <h2><?php echo t('forbidden_text'); ?></h2>
            <a class="btn action" href="dashboard.php"><?php echo t('forbidden_back'); ?></a>
        </div>
    </main>

    <?php require $base . 'templates/icons.php'; ?>
</body>
</html>
