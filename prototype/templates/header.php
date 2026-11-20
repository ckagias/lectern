<?php
// The top of every page: the skip link, the header and, for a logged in member or librarian, the menu.
// The page sets $base, $layout (public, member or librarian) and $active (the menu item to highlight) first.
// On the login page $active is 'login', so the header offers Register there instead of Log in.
$other = 'en';
if ($lang === 'en') {
    $other = 'el';
}
$home = 'index.php';
if ($layout !== 'public') {
    $home = 'dashboard.php';
}
?>
    <a class="skip" href="#main"><?php echo t('skip_link'); ?></a>

    <header class="top">
        <a class="brand" href="<?php echo $base . $home; ?>"><svg class="icon brand-mark" aria-hidden="true"><use href="#ic-logo"/></svg>AchaiaReads</a>
        <div class="top-actions">
            <a class="lang" href="?lang=<?php echo $other; ?>" title="<?php echo t('lang_to_' . $other); ?>">
                <svg class="flag" aria-hidden="true"><use href="#flag-<?php echo $lang; ?>"/></svg><span aria-hidden="true"><?php echo strtoupper($lang); ?></span><span class="visually-hidden"><?php echo strtoupper($lang) . ', ' . t('lang_to_' . $other); ?></span>
            </a>
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
            <a href="<?php echo $base; ?>dashboard.php"<?php if ($active === 'home') { ?> aria-current="page"<?php } ?>>
                <svg class="icon icon-off" aria-hidden="true"><use href="#ic-home-o"/></svg><svg class="icon icon-on" aria-hidden="true"><use href="#ic-home"/></svg><span><?php echo t('nav_home'); ?></span>
            </a>
            <?php foreach ($menus[$layout] as $item) { ?>
                <a href="<?php echo $base . $item['page']; ?>"<?php if ($active === $item['key']) { ?> aria-current="page"<?php } ?>>
                    <svg class="icon icon-off" aria-hidden="true"><use href="#ic-<?php echo $item['icon']; ?>-o"/></svg><svg class="icon icon-on" aria-hidden="true"><use href="#ic-<?php echo $item['icon']; ?>"/></svg><span><?php echo t($item['label']); ?></span>
                </a>
            <?php } ?>
            <div class="nav-user">
                <span class="who"><?php echo e($_SESSION['username']); ?></span>
                <span class="role"><?php echo t('role_' . $layout); ?></span>
            </div>
        </nav>
    <?php } ?>
