<?php
// Opens every page: head, header, menu and the start of <main>.
// The page sets $base, $title and $layout (public, member or librarian) before including this file.
// A page can also set $styles, a list of extra stylesheet names from css/.
require __DIR__ . '/menu.php';

$theme = 'light';
if (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark') {
    $theme = 'dark';
}
$lang = $_SESSION['lang'];
$current = basename($_SERVER['SCRIPT_NAME']);
if (isset($active)) {
    $current = $active;
}
$isApp = ($layout !== 'public');
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" data-theme="<?= $theme ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> · AchaiaReads</title>
    <link rel="stylesheet" href="<?= $base ?>css/fonts.css">
    <link rel="stylesheet" href="<?= $base ?>css/tokens.css">
    <link rel="stylesheet" href="<?= $base ?>css/base.css">
    <link rel="stylesheet" href="<?= $base ?>css/layout.css">
    <link rel="stylesheet" href="<?= $base ?>css/components.css">
    <?php if (isset($styles)) { ?>
        <?php foreach ($styles as $style) { ?>
            <link rel="stylesheet" href="<?= $base ?>css/<?= $style ?>.css">
        <?php } ?>
    <?php } ?>
</head>
<body class="layout-<?= $layout ?>">
    <a class="skip" href="#main"><?= t('skip_link') ?></a>

    <header class="top">
        <a class="brand" href="<?= $base ?>index.php">AchaiaReads</a>
        <div class="top-actions">
            <?php if ($layout === 'librarian') { ?>
                <span class="staff-tag"><?= t('staff_tag') ?></span>
            <?php } ?>
            <?php if ($isApp && isset($_SESSION['username'])) { ?>
                <span class="who"><?= e($_SESSION['username']) ?> · <?= t('role_' . $layout) ?></span>
            <?php } ?>
            <div class="lang" role="group" aria-label="<?= t('lang_label') ?>">
                <a href="?lang=el" lang="el"<?= $lang === 'el' ? ' aria-current="true"' : '' ?>>EL</a>
                <a href="?lang=en" lang="en"<?= $lang === 'en' ? ' aria-current="true"' : '' ?>>EN</a>
            </div>
            <?php if (!$isApp) { ?>
                <a class="btn line" href="<?= $base ?>login.php"><?= t('login') ?></a>
            <?php } ?>
        </div>
    </header>

    <?php if ($isApp) { ?>
        <nav class="nav" aria-label="<?= t('nav_label') ?>">
            <?php foreach ($menus[$layout] as $item) { ?>
                <a href="<?= $base . $item[0] ?>"<?= basename($item[0]) === $current ? ' aria-current="page"' : '' ?>>
                    <?= icon($item[2]) ?><span><?= t($item[1]) ?></span>
                </a>
            <?php } ?>
        </nav>
    <?php } ?>

    <main id="main">
