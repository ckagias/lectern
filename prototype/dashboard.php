<?php
// Dashboard: the first page after login, the same for both roles. The menu and the shortcuts differ by role.
$base = '';
require_once $base . 'includes/init.php';
requireLogin($base);

$layout = 'member';
if (hasRole(ROLE_LIBRARIAN)) {
    $layout = 'librarian';
}
$title = t('dashboard_title');
$active = '';
$styles = ['css/app.css'];
require $base . 'includes/header.php';
?>
<h1><?php echo t('dashboard_welcome'); ?> <?php echo e($_SESSION['username']); ?></h1>
<p class="lead"><?php echo t('dashboard_lead'); ?></p>

<?php if ($layout === 'member') { ?>
    <div class="tiles">
        <a class="tile" href="member/catalogue.php">
            <svg class="icon" aria-hidden="true"><use href="#ic-library"/></svg>
            <h2><?php echo t('nav_catalogue'); ?></h2>
            <p><?php echo t('tile_catalogue'); ?></p>
        </a>
        <a class="tile" href="member/reservations.php">
            <svg class="icon" aria-hidden="true"><use href="#ic-bookmark"/></svg>
            <h2><?php echo t('nav_reservations'); ?></h2>
            <p><?php echo t('tile_reservations_member'); ?></p>
        </a>
        <a class="tile" href="member/loans.php">
            <svg class="icon" aria-hidden="true"><use href="#ic-clock"/></svg>
            <h2><?php echo t('nav_loans'); ?></h2>
            <p><?php echo t('tile_loans_member'); ?></p>
        </a>
        <a class="tile" href="member/history.php">
            <svg class="icon" aria-hidden="true"><use href="#ic-history"/></svg>
            <h2><?php echo t('nav_history'); ?></h2>
            <p><?php echo t('tile_history'); ?></p>
        </a>
    </div>
<?php } ?>

<?php if ($layout === 'librarian') { ?>
    <div class="tiles">
        <a class="tile" href="librarian/books.php">
            <svg class="icon" aria-hidden="true"><use href="#ic-book"/></svg>
            <h2><?php echo t('nav_books'); ?></h2>
            <p><?php echo t('tile_books'); ?></p>
        </a>
        <a class="tile" href="librarian/reservations.php">
            <svg class="icon" aria-hidden="true"><use href="#ic-bookmark"/></svg>
            <h2><?php echo t('nav_reservations'); ?></h2>
            <p><?php echo t('tile_reservations_librarian'); ?></p>
        </a>
        <a class="tile" href="librarian/loans.php">
            <svg class="icon" aria-hidden="true"><use href="#ic-clock"/></svg>
            <h2><?php echo t('nav_loans'); ?></h2>
            <p><?php echo t('tile_loans_librarian'); ?></p>
        </a>
        <a class="tile" href="librarian/returns.php">
            <svg class="icon" aria-hidden="true"><use href="#ic-undo"/></svg>
            <h2><?php echo t('nav_returns'); ?></h2>
            <p><?php echo t('tile_returns'); ?></p>
        </a>
    </div>
<?php } ?>
<?php require $base . 'includes/footer.php'; ?>
