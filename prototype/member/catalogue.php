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
require $base . 'templates/header.php';
?>
<h1><?php echo t('nav_catalogue'); ?></h1>
<p class="page-lead"><?php echo t('dashboard_catalogue'); ?></p>
<div class="empty">
    <div class="empty-shelf" aria-hidden="true"><span></span><span></span><span></span></div>
    <h2><?php echo t('empty_catalogue_title'); ?></h2>
    <p><?php echo t('empty_catalogue_text'); ?></p>
    <a class="btn line" href="<?php echo $base; ?>member/reservations.php"><?php echo t('empty_see_reservations'); ?></a>
</div>
<?php require $base . 'templates/footer.php'; ?>
