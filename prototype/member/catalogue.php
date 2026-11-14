<?php
// Member catalogue: an empty page for now. The search and the list of books come later.
$base = '../';
require_once $base . 'includes/init.php';
requireRole(ROLE_MEMBER, $base);

$layout = 'member';
$title = t('nav_catalogue');
$active = 'catalogue';
$styles = ['css/app.css'];
require $base . 'includes/header.php';
?>
<h1><?php echo t('nav_catalogue'); ?></h1>
<div class="empty">
    <svg class="icon" aria-hidden="true"><use href="#ic-library"/></svg>
    <h2><?php echo t('empty_title'); ?></h2>
    <p><?php echo t('empty_text'); ?></p>
</div>
<?php require $base . 'includes/footer.php'; ?>
