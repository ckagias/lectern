<?php
// Member catalogue: an empty page for now. The search and the list of books come later.
$base = '../';
require_once $base . 'includes/init.php';
requireRole(ROLE_MEMBER, $base);

$layout = 'member';
$title = t('nav_catalogue');
$active = 'catalogue';
$styles = ['css/app.css'];
$bodyClass = 'empty-page';
require $base . 'includes/header.php';
?>
<h1><?php echo t('nav_catalogue'); ?></h1>
<div class="empty">
    <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-search"/></svg></span>
    <h2><?php echo t('empty_catalogue_title'); ?></h2>
    <p><?php echo t('empty_catalogue_text'); ?></p>
    <a class="btn action" href="<?php echo $base; ?>dashboard.php"><?php echo t('empty_home'); ?></a>
</div>
<?php require $base . 'includes/footer.php'; ?>
