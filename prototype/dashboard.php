<?php
// Dashboard: the first page after login, the same for both roles. Only the menu differs by role.
$base = '';
require_once $base . 'includes/init.php';
requireLogin($base);

$layout = 'member';
if (hasRole(ROLE_LIBRARIAN)) {
    $layout = 'librarian';
}
$title = t('dashboard_title');
$active = 'home';
$styles = ['css/app.css'];
$bodyClass = 'dashboard';
$status = openingStatus(date('N'), date('H:i'));
require $base . 'includes/header.php';
?>
<h1><?php echo t('dashboard_welcome') . ' ' . e($_SESSION['username']); ?></h1>
<p class="status"><?php echo t('role_' . $layout); ?> · <?php echo $status; ?></p>

<?php if ($layout === 'member') { ?>
<div class="shortcuts">
    <a class="shortcut" href="<?php echo $base; ?>member/catalogue.php">
        <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-search"/></svg></span>
        <h2><?php echo t('nav_catalogue'); ?></h2>
        <p><?php echo t('dashboard_catalogue'); ?></p>
        <span class="go"><?php echo t('dashboard_go_catalogue'); ?><svg class="icon" aria-hidden="true"><use href="#ic-arrow-right"/></svg></span>
    </a>
    <a class="shortcut" href="<?php echo $base; ?>member/reservations.php">
        <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-bookmarks"/></svg></span>
        <h2><?php echo t('nav_reservations'); ?></h2>
        <p><?php echo t('dashboard_member_reservations'); ?></p>
        <span class="go"><?php echo t('dashboard_go_reservations'); ?><svg class="icon" aria-hidden="true"><use href="#ic-arrow-right"/></svg></span>
    </a>
    <a class="shortcut" href="<?php echo $base; ?>member/loans.php">
        <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-loan"/></svg></span>
        <h2><?php echo t('nav_loans'); ?></h2>
        <p><?php echo t('dashboard_member_loans'); ?></p>
        <span class="go"><?php echo t('dashboard_go_loans'); ?><svg class="icon" aria-hidden="true"><use href="#ic-arrow-right"/></svg></span>
    </a>
    <a class="shortcut" href="<?php echo $base; ?>member/history.php">
        <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-history"/></svg></span>
        <h2><?php echo t('nav_history'); ?></h2>
        <p><?php echo t('dashboard_history'); ?></p>
        <span class="go"><?php echo t('dashboard_go_history'); ?><svg class="icon" aria-hidden="true"><use href="#ic-arrow-right"/></svg></span>
    </a>
</div>
<?php } ?>
<?php if ($layout === 'librarian') { ?>
<div class="shortcuts">
    <a class="shortcut" href="<?php echo $base; ?>librarian/books.php">
        <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-books"/></svg></span>
        <h2><?php echo t('nav_books'); ?></h2>
        <p><?php echo t('dashboard_books'); ?></p>
        <span class="go"><?php echo t('dashboard_go_books'); ?><svg class="icon" aria-hidden="true"><use href="#ic-arrow-right"/></svg></span>
    </a>
    <a class="shortcut" href="<?php echo $base; ?>librarian/reservations.php">
        <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-bookmarks"/></svg></span>
        <h2><?php echo t('nav_reservations'); ?></h2>
        <p><?php echo t('dashboard_staff_reservations'); ?></p>
        <span class="go"><?php echo t('dashboard_go_reservations'); ?><svg class="icon" aria-hidden="true"><use href="#ic-arrow-right"/></svg></span>
    </a>
    <a class="shortcut" href="<?php echo $base; ?>librarian/loans.php">
        <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-loan"/></svg></span>
        <h2><?php echo t('nav_loans'); ?></h2>
        <p><?php echo t('dashboard_staff_loans'); ?></p>
        <span class="go"><?php echo t('dashboard_go_loans'); ?><svg class="icon" aria-hidden="true"><use href="#ic-arrow-right"/></svg></span>
    </a>
    <a class="shortcut" href="<?php echo $base; ?>librarian/returns.php">
        <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-undo"/></svg></span>
        <h2><?php echo t('nav_returns'); ?></h2>
        <p><?php echo t('dashboard_returns'); ?></p>
        <span class="go"><?php echo t('dashboard_go_returns'); ?><svg class="icon" aria-hidden="true"><use href="#ic-arrow-right"/></svg></span>
    </a>
</div>
<?php } ?>
<?php require $base . 'includes/footer.php'; ?>
