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
require $base . 'templates/header.php';
?>
<h1><?php echo t('nav_returns'); ?></h1>
<p class="page-lead"><?php echo t('dashboard_returns'); ?></p>
<div class="empty">
    <div class="empty-shelf" aria-hidden="true"><span></span><span></span><span></span></div>
    <h2><?php echo t('empty_returns_title'); ?></h2>
    <p><?php echo t('empty_returns_text'); ?></p>
    <a class="btn line" href="<?php echo $base; ?>librarian/loans.php"><?php echo t('empty_see_loans'); ?></a>
</div>
<?php require $base . 'templates/footer.php'; ?>
