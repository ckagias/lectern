<?php
// Member reservations: an empty page for now.
$base = '../';
require_once $base . 'includes/init.php';
requireRole(ROLE_MEMBER, $base);

$layout = 'member';
$title = t('nav_reservations');
$active = 'reservations';
$styles = ['css/app.css'];
require $base . 'includes/header.php';
?>
<h1><?php echo t('nav_reservations'); ?></h1>
<div class="empty">
    <svg class="icon" aria-hidden="true"><use href="#ic-bookmark"/></svg>
    <h2><?php echo t('empty_title'); ?></h2>
    <p><?php echo t('empty_text'); ?></p>
</div>
<?php require $base . 'includes/footer.php'; ?>
