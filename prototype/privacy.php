<?php
// Privacy page: what the site stores, which cookies it uses and who can see what.
$base = '';
require_once $base . 'includes/init.php';

$layout = 'public';
$title = t('privacy_title');
$active = 'privacy';
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
    <link rel="stylesheet" href="<?php echo $base; ?>css/text.css">
</head>
<body class="layout-public">
    <?php require $base . 'templates/header.php'; ?>

    <main id="main">
        <article class="text-page">
            <h1><?php echo t('privacy_title'); ?></h1>
            <p class="lead"><?php echo t('privacy_lead'); ?></p>
            <p class="updated"><?php echo t('privacy_updated'); ?></p>

            <h2><?php echo t('privacy_data_title'); ?></h2>
            <p><?php echo t('privacy_data_text'); ?></p>

            <h2><?php echo t('privacy_cookies_title'); ?></h2>
            <p><?php echo t('privacy_cookies_text'); ?></p>

            <h2><?php echo t('privacy_map_title'); ?></h2>
            <p><?php echo t('privacy_map_text'); ?></p>

            <h2><?php echo t('privacy_fiction_title'); ?></h2>
            <p><?php echo t('privacy_fiction_text'); ?></p>

            <h2><?php echo t('privacy_contact_title'); ?></h2>
            <p><?php echo t('privacy_contact_text'); ?> <a href="mailto:info@achaiareads.test">info@achaiareads.test</a></p>
        </article>
    </main>

    <?php require $base . 'templates/footer.php'; ?>
    <?php require $base . 'templates/icons.php'; ?>
</body>
</html>
