<?php
// Empty for now.
$base = '../';
require_once $base . 'includes/init.php';
requireRole(ROLE_LIBRARIAN, $base);

$layout = 'librarian';
$title = t('nav_loans');
$active = 'loans';
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
<body class="layout-librarian layout-app empty-page">
    <?php require $base . 'templates/header.php'; ?>

    <main id="main">
        <h1><?php echo t('nav_loans'); ?></h1>
        <p class="page-lead"><?php echo t('dashboard_staff_loans'); ?></p>
        <div class="empty">
            <div class="empty-shelf" aria-hidden="true"><span></span><span></span><span></span></div>
            <h2><?php echo t('empty_staff_loans_title'); ?></h2>
            <p><?php echo t('empty_staff_loans_text'); ?></p>
            <a class="btn line" href="<?php echo $base; ?>librarian/returns.php"><?php echo t('empty_record_return'); ?></a>
        </div>
    </main>

    <?php require $base . 'templates/icons.php'; ?>
</body>
</html>
