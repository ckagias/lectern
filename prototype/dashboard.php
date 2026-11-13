<?php
// Dashboard: the first page after login, the same for both roles. The menu above it differs by role.
$base = '';
require_once $base . 'includes/init.php';
requireLogin($base);

$layout = 'member';
if (hasRole(ROLE_LIBRARIAN)) {
    $layout = 'librarian';
}
$title = t('dashboard_title');
$active = '';
require $base . 'includes/header.php';
?>
<h1><?php echo t('dashboard_title'); ?></h1>
<p><?php echo t('dashboard_welcome'); ?> <?php echo e($_SESSION['username']); ?></p>
<?php require $base . 'includes/footer.php'; ?>
