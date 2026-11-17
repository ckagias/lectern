<?php
// Member reservations: an empty page for now.
$base = '../';
require_once $base . 'includes/init.php';
requireRole(ROLE_MEMBER, $base);

$layout = 'member';
$title = t('nav_reservations');
$active = 'reservations';
$styles = ['css/app.css'];
$bodyClass = 'empty-page';
require $base . 'templates/header.php';
?>
<h1><?php echo t('nav_reservations'); ?></h1>
<p class="page-lead"><?php echo t('dashboard_member_reservations'); ?></p>
<div class="empty">
    <div class="empty-shelf" aria-hidden="true"><span></span><span></span><span></span></div>
    <h2><?php echo t('empty_member_reservations_title'); ?></h2>
    <p><?php echo t('empty_member_reservations_text'); ?></p>
    <a class="btn line" href="<?php echo $base; ?>member/catalogue.php"><?php echo t('empty_browse'); ?></a>
</div>
<?php require $base . 'templates/footer.php'; ?>
