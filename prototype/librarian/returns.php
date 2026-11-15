<?php
// Librarian returns: an empty page for now.
$base = '../';
require_once $base . 'includes/init.php';
requireRole(ROLE_LIBRARIAN, $base);

$layout = 'librarian';
$title = t('nav_returns');
$active = 'returns';
$styles = ['css/app.css'];
$bodyClass = 'empty-page';
require $base . 'includes/header.php';
?>
<h1><?php echo t('nav_returns'); ?></h1>
<div class="empty">
    <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-undo"/></svg></span>
    <h2><?php echo t('empty_returns_title'); ?></h2>
    <p><?php echo t('empty_returns_text'); ?></p>
    <a class="btn action" href="<?php echo $base; ?>dashboard.php"><?php echo t('empty_home'); ?></a>
</div>
<?php require $base . 'includes/footer.php'; ?>
