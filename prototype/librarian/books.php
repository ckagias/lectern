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
<div class="empty">
    <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-books"/></svg></span>
    <h2><?php echo t('empty_books_title'); ?></h2>
    <p><?php echo t('empty_books_text'); ?></p>
    <a class="btn action" href="<?php echo $base; ?>dashboard.php"><?php echo t('empty_home'); ?></a>
</div>
<?php require $base . 'templates/footer.php'; ?>
