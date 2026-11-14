<?php
// Shown when a user opens a page that belongs to the other role. Visitors who are not logged in go to the login page instead.
$base = '';
require_once $base . 'includes/init.php';
requireLogin($base);
http_response_code(403);

$layout = 'member';
if (hasRole(ROLE_LIBRARIAN)) {
    $layout = 'librarian';
}
$title = 'Forbidden Action';
$active = '';
$styles = ['css/app.css'];
require $base . 'includes/header.php';
?>
<div class="empty forbidden" role="alert">
    <svg class="icon" aria-hidden="true"><use href="#ic-alert"/></svg>
    <h1>Forbidden Action</h1>
    <p><?php echo t('forbidden_text'); ?></p>
    <a class="btn action" href="dashboard.php"><?php echo t('forbidden_back'); ?></a>
</div>
<?php require $base . 'includes/footer.php'; ?>
