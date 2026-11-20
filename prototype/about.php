<?php
// Tells what the library does and how borrowing works.
$base = '';
require_once $base . 'includes/init.php';

$layout = 'public';
$title = t('about_link');
$active = 'about';
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
            <h1><?php echo t('about_link'); ?></h1>
            <p class="lead"><?php echo t('about_lead'); ?></p>

            <h2><?php echo t('about_what_title'); ?></h2>
            <p><?php echo t('about_what_text'); ?></p>

            <h2><?php echo t('about_how_title'); ?></h2>
            <p><?php echo t('about_how_text'); ?></p>

            <h2><?php echo t('about_people_title'); ?></h2>
            <p><?php echo t('about_people_text'); ?></p>

            <p class="text-end">
                <?php if (isLoggedIn()) { ?>
                    <a href="dashboard.php"><?php echo t('go_dashboard'); ?></a>
                <?php } else { ?>
                    <?php echo t('about_join'); ?> <a href="register.php"><?php echo t('register'); ?></a>
                <?php } ?>
            </p>
        </article>
    </main>

    <?php require $base . 'templates/footer.php'; ?>
    <?php require $base . 'templates/icons.php'; ?>
</body>
</html>
