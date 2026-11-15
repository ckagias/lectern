<?php
// Opens every page: head, header, menu and the start of <main>.
// The page sets $base, $title, $layout (public, member or librarian) and $active (the menu item to highlight) first.
// On the login page $active is 'login', so the header offers Register there instead of Log in.
// A page can also set $styles, a list of extra stylesheet paths like 'css/home.css', and $bodyClass for an extra class on <body>.
$lang = $_SESSION['lang'];
$current = 'aria-current="page"';
$home = 'index.php';
if ($layout !== 'public') {
    $home = 'dashboard.php';
}
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
    <?php if (isset($styles)) { ?>
        <?php foreach ($styles as $style) { ?>
            <link rel="stylesheet" href="<?php echo $base . $style; ?>">
        <?php } ?>
    <?php } ?>
</head>
<body class="layout-<?php echo $layout; ?><?php if (isset($bodyClass)) { echo ' ' . $bodyClass; } ?>">
    <a class="skip" href="#main"><?php echo t('skip_link'); ?></a>

    <header class="top">
        <a class="brand" href="<?php echo $base . $home; ?>"><svg class="icon brand-mark" aria-hidden="true"><use href="#ic-books"/></svg>AchaiaReads</a>
        <div class="top-actions">
            <div class="lang" role="group" aria-label="<?php echo t('lang_label'); ?>">
                <?php if ($lang === 'el') { ?>
                    <a href="?lang=el" lang="el" aria-current="true">EL</a>
                    <a href="?lang=en" lang="en">EN</a>
                <?php } else { ?>
                    <a href="?lang=el" lang="el">EL</a>
                    <a href="?lang=en" lang="en" aria-current="true">EN</a>
                <?php } ?>
            </div>
            <?php if ($layout !== 'public' || isLoggedIn()) { ?>
                <form action="<?php echo $base; ?>logout.php" method="post">
                    <button class="btn line" type="submit"><?php echo t('logout'); ?></button>
                </form>
            <?php } else { ?>
                <?php if (isset($active) && $active === 'login') { ?>
                    <a class="btn line" href="<?php echo $base; ?>register.php"><?php echo t('register'); ?></a>
                <?php } else { ?>
                    <a class="btn line" href="<?php echo $base; ?>login.php"><?php echo t('login'); ?></a>
                <?php } ?>
            <?php } ?>
        </div>
    </header>

    <?php if ($layout !== 'public') { ?>
        <nav class="nav" aria-label="<?php echo t('nav_label'); ?>">
            <a href="<?php echo $base; ?>dashboard.php" <?php if ($active === 'home') { echo $current; } ?>>
                <svg class="icon icon-off" aria-hidden="true"><use href="#ic-home-o"/></svg><svg class="icon icon-on" aria-hidden="true"><use href="#ic-home"/></svg><span><?php echo t('nav_home'); ?></span>
            </a>
            <?php foreach ($menus[$layout] as $item) { ?>
                <a href="<?php echo $base . $item['page']; ?>" <?php if ($active === $item['key']) { echo $current; } ?>>
                    <svg class="icon icon-off" aria-hidden="true"><use href="#ic-<?php echo $item['icon']; ?>-o"/></svg><svg class="icon icon-on" aria-hidden="true"><use href="#ic-<?php echo $item['icon']; ?>"/></svg><span><?php echo t($item['label']); ?></span>
                </a>
            <?php } ?>
            <div class="nav-user">
                <span class="who"><?php echo e($_SESSION['username']); ?></span>
                <span class="role"><?php echo t('role_' . $layout); ?></span>
            </div>
        </nav>
    <?php } ?>

    <main id="main">
