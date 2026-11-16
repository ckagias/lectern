<?php
// Shown when a user opens a page that belongs to the other role. Visitors who are not logged in go to the login page instead.
$base = '';
require_once $base . 'includes/init.php';
requireLogin($base);
http_response_code(403);

$layout = roleName();
$title = 'Forbidden Action';
$active = '';
$styles = ['css/app.css'];
$bodyClass = 'empty-page';
require $base . 'templates/header.php';
?>
<h1>Forbidden Action</h1>
<div class="empty forbidden" role="alert">
    <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-alert"/></svg></span>
    <h2><?php echo t('forbidden_text'); ?></h2>
    <a class="btn action" href="dashboard.php"><?php echo t('forbidden_back'); ?></a>
</div>
<?php require $base . 'templates/footer.php'; ?>
