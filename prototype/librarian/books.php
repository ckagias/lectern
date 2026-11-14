<?php
// Librarian books: an empty page for now. Adding and editing books come later.
$base = '../';
require_once $base . 'includes/init.php';
requireRole(ROLE_LIBRARIAN, $base);

$layout = 'librarian';
$title = t('nav_books');
$active = 'books';
$styles = ['css/app.css'];
require $base . 'includes/header.php';
?>
<h1><?php echo t('nav_books'); ?></h1>
<div class="empty">
    <svg class="icon" aria-hidden="true"><use href="#ic-book"/></svg>
    <h2><?php echo t('empty_title'); ?></h2>
    <p><?php echo t('empty_text'); ?></p>
</div>
<?php require $base . 'includes/footer.php'; ?>
