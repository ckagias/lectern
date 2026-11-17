<?php
// Member loans: an empty page for now.
$base = '../';
require_once $base . 'includes/init.php';
requireRole(ROLE_MEMBER, $base);

$layout = 'member';
$title = t('nav_loans');
$active = 'loans';
$styles = ['css/app.css'];
$bodyClass = 'empty-page';
require $base . 'templates/header.php';
?>
<h1><?php echo t('nav_loans'); ?></h1>
<p class="page-lead"><?php echo t('dashboard_member_loans'); ?></p>
<div class="empty">
    <div class="empty-shelf" aria-hidden="true"><span></span><span></span><span></span></div>
    <h2><?php echo t('empty_member_loans_title'); ?></h2>
    <p><?php echo t('empty_member_loans_text'); ?></p>
    <a class="btn line" href="<?php echo $base; ?>member/reservations.php"><?php echo t('empty_see_reservations'); ?></a>
</div>
<?php require $base . 'templates/footer.php'; ?>
