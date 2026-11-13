<?php
// Opens every page: head, header, menu and the start of <main>.
// The page sets $base, $title, $layout (public, member or librarian) and $active (the menu item to highlight) first.
// A page can also set $styles, a list of extra stylesheet paths like 'css/home.css', and $bodyClass for an extra class on <body>.
$lang = $_SESSION['lang'];
$current = 'aria-current="page"';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="only light">
    <title><?php echo $title; ?> · AchaiaReads</title>
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
        <a class="brand" href="<?php echo $base; ?>index.php"><svg class="icon brand-mark" aria-hidden="true"><use href="#ic-library"/></svg>AchaiaReads</a>
        <div class="top-actions">
            <?php if ($layout === 'librarian') { ?>
                <span class="staff-tag"><?php echo t('staff_tag'); ?></span>
            <?php } ?>
            <?php if ($layout !== 'public' && isset($_SESSION['username'])) { ?>
                <span class="who"><?php echo e($_SESSION['username']); ?> · <?php echo t('role_' . $layout); ?></span>
            <?php } ?>
            <div class="lang" role="group" aria-label="<?php echo t('lang_label'); ?>">
                <?php if ($lang === 'el') { ?>
                    <a href="?lang=el" lang="el" aria-current="true">EL</a>
                    <a href="?lang=en" lang="en">EN</a>
                <?php } else { ?>
                    <a href="?lang=el" lang="el">EL</a>
                    <a href="?lang=en" lang="en" aria-current="true">EN</a>
                <?php } ?>
            </div>
            <?php if ($layout !== 'public') { ?>
                <form action="<?php echo $base; ?>logout.php" method="post">
                    <button class="btn line" type="submit"><?php echo t('logout'); ?></button>
                </form>
            <?php } ?>
            <?php if ($layout === 'public') { ?>
                <a class="btn line" href="<?php echo $base; ?>login.php"><?php echo t('login'); ?></a>
            <?php } ?>
        </div>
    </header>

    <?php if ($layout === 'member') { ?>
        <nav class="nav" aria-label="<?php echo t('nav_label'); ?>">
            <a href="<?php echo $base; ?>member/catalogue.php" <?php if ($active === 'catalogue') { echo $current; } ?>>
                <svg class="icon" aria-hidden="true"><use href="#ic-library"/></svg><span><?php echo t('nav_catalogue'); ?></span>
            </a>
            <a href="<?php echo $base; ?>member/reservations.php" <?php if ($active === 'reservations') { echo $current; } ?>>
                <svg class="icon" aria-hidden="true"><use href="#ic-bookmark"/></svg><span><?php echo t('nav_reservations'); ?></span>
            </a>
            <a href="<?php echo $base; ?>member/loans.php" <?php if ($active === 'loans') { echo $current; } ?>>
                <svg class="icon" aria-hidden="true"><use href="#ic-clock"/></svg><span><?php echo t('nav_loans'); ?></span>
            </a>
            <a href="<?php echo $base; ?>member/history.php" <?php if ($active === 'history') { echo $current; } ?>>
                <svg class="icon" aria-hidden="true"><use href="#ic-history"/></svg><span><?php echo t('nav_history'); ?></span>
            </a>
        </nav>
    <?php } ?>

    <?php if ($layout === 'librarian') { ?>
        <nav class="nav" aria-label="<?php echo t('nav_label'); ?>">
            <a href="<?php echo $base; ?>librarian/books.php" <?php if ($active === 'books') { echo $current; } ?>>
                <svg class="icon" aria-hidden="true"><use href="#ic-book"/></svg><span><?php echo t('nav_books'); ?></span>
            </a>
            <a href="<?php echo $base; ?>librarian/reservations.php" <?php if ($active === 'reservations') { echo $current; } ?>>
                <svg class="icon" aria-hidden="true"><use href="#ic-bookmark"/></svg><span><?php echo t('nav_reservations'); ?></span>
            </a>
            <a href="<?php echo $base; ?>librarian/loans.php" <?php if ($active === 'loans') { echo $current; } ?>>
                <svg class="icon" aria-hidden="true"><use href="#ic-clock"/></svg><span><?php echo t('nav_loans'); ?></span>
            </a>
            <a href="<?php echo $base; ?>librarian/returns.php" <?php if ($active === 'returns') { echo $current; } ?>>
                <svg class="icon" aria-hidden="true"><use href="#ic-undo"/></svg><span><?php echo t('nav_returns'); ?></span>
            </a>
        </nav>
    <?php } ?>

    <main id="main">
