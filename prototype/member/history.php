<?php
// Member history: an empty page for now.
$base = '../';
require_once $base . 'includes/init.php';
requireRole(ROLE_MEMBER, $base);

$layout = 'member';
$title = t('nav_history');
$active = 'history';
$styles = ['css/app.css'];
$bodyClass = 'empty-page';
require $base . 'templates/header.php';
?>
<h1><?php echo t('nav_history'); ?></h1>
<div class="empty">
    <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-history"/></svg></span>
    <h2><?php echo t('empty_history_title'); ?></h2>
    <p><?php echo t('empty_history_text'); ?></p>
    <a class="btn action" href="<?php echo $base; ?>member/catalogue.php"><?php echo t('empty_browse'); ?></a>
</div>
<?php require $base . 'templates/footer.php'; ?>
