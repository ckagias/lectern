<?php
// Member loans: an empty page for now.
$base = '../';
require_once $base . 'includes/init.php';
requireRole(ROLE_MEMBER, $base);

$layout = 'member';
$title = t('nav_loans');
$active = 'loans';
$styles = ['css/app.css'];
$bodyClass = 'empty-page';
require $base . 'includes/header.php';
?>
<h1><?php echo t('nav_loans'); ?></h1>
<div class="empty">
    <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-loan"/></svg></span>
    <h2><?php echo t('empty_member_loans_title'); ?></h2>
    <p><?php echo t('empty_member_loans_text'); ?></p>
    <a class="btn action" href="<?php echo $base; ?>member/catalogue.php"><?php echo t('empty_browse'); ?></a>
</div>
<?php require $base . 'includes/footer.php'; ?>
