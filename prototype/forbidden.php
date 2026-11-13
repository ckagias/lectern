<?php
// Shown when a user opens a page that belongs to the other role.
$base = '';
require_once $base . 'includes/init.php';

$layout = 'public';
if (hasRole(ROLE_MEMBER)) {
    $layout = 'member';
}
if (hasRole(ROLE_LIBRARIAN)) {
    $layout = 'librarian';
}
$title = 'Forbidden Action';
$active = '';
require $base . 'includes/header.php';
?>
<h1>Forbidden Action</h1>
<p><?php echo t('forbidden_text'); ?></p>
<?php require $base . 'includes/footer.php'; ?>
