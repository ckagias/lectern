<?php
// Librarian books: an empty page for now. Adding and editing books come later.
$base = '../';
require_once $base . 'includes/init.php';
requireRole(ROLE_LIBRARIAN, $base);

$layout = 'librarian';
$title = t('nav_books');
$active = 'books';
$styles = ['css/app.css'];
$bodyClass = 'empty-page';
require $base . 'templates/header.php';
?>
<h1><?php echo t('nav_books'); ?></h1>
<p class="page-lead"><?php echo t('dashboard_books'); ?></p>
<div class="empty">
    <div class="empty-shelf" aria-hidden="true"><span></span><span></span><span></span></div>
    <h2><?php echo t('empty_books_title'); ?></h2>
    <p><?php echo t('empty_books_text'); ?></p>
    <a class="btn line" href="<?php echo $base; ?>librarian/reservations.php"><?php echo t('empty_staff_reservations_link'); ?></a>
</div>
<?php require $base . 'templates/footer.php'; ?>
