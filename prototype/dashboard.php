<?php
// Dashboard: the first page after login, the same for both roles. Only the two lists differ by role.
$base = '';
require_once $base . 'includes/init.php';
requireLogin($base);

$layout = roleName();
$title = t('dashboard_title');
$active = 'home';
$status = openingStatus(date('N'), date('H:i'));
$styles = ['css/app.css'];

// The two lists of each role: the page with the full list, the title, and the title and text shown while the list is empty.
$lists = [
    'member' => [
        ['page' => 'member/loans.php', 'title' => 'dash_member_loans_title', 'empty_title' => 'dash_member_loans_empty_title', 'empty_text' => 'dash_member_loans_empty'],
        ['page' => 'member/reservations.php', 'title' => 'dash_member_reservations_title', 'empty_title' => 'dash_member_reservations_empty_title', 'empty_text' => 'dash_member_reservations_empty'],
    ],
    'librarian' => [
        ['page' => 'librarian/reservations.php', 'title' => 'dash_librarian_reservations_title', 'empty_title' => 'dash_librarian_reservations_empty_title', 'empty_text' => 'dash_librarian_reservations_empty'],
        ['page' => 'librarian/loans.php', 'title' => 'dash_librarian_loans_title', 'empty_title' => 'dash_librarian_loans_empty_title', 'empty_text' => 'dash_librarian_loans_empty'],
    ],
];

require $base . 'templates/header.php';
?>
<div class="dash">
    <header class="dash-head">
        <h1><?php echo t('dashboard_welcome') . ' ' . e($_SESSION['username']); ?></h1>
        <p class="status"><?php echo t('role_' . $layout); ?> · <?php echo $status; ?></p>
    </header>

    <div class="dash-grid">
        <div class="dash-main">
            <?php foreach ($lists[$layout] as $list) { ?>
                <section class="dash-panel">
                    <div class="dash-panel-head">
                        <h2><?php echo t($list['title']); ?></h2>
                        <a href="<?php echo $base . $list['page']; ?>"><?php echo t('dash_view_all'); ?></a>
                    </div>
                    <div class="dash-empty">
                        <div class="empty-shelf" aria-hidden="true"><span></span><span></span><span></span></div>
                        <h3><?php echo t($list['empty_title']); ?></h3>
                        <p><?php echo t($list['empty_text']); ?></p>
                    </div>
                </section>
            <?php } ?>
        </div>

        <div class="dash-side">
            <section class="lib-card" aria-label="<?php echo t('dash_card_label'); ?>">
                <p class="lib-card-brand"><svg class="icon" aria-hidden="true"><use href="#ic-logo"/></svg>AchaiaReads</p>
                <div>
                    <p class="lib-card-name"><?php echo e($_SESSION['username']); ?></p>
                    <p class="lib-card-meta"><span><?php echo t('role_' . $layout); ?></span><span><?php echo t('dash_card_no') . ' ' . sprintf('%04d', $_SESSION['user_id']); ?></span></p>
                </div>
            </section>

            <section class="dash-panel">
                <div class="dash-panel-head">
                    <h2><?php echo t('dash_library_title'); ?></h2>
                </div>
                <dl class="dash-info">
                    <div><dt><?php echo t('hours_title'); ?></dt><dd><?php echo $status; ?></dd></div>
                    <div><dt><?php echo t('address_title'); ?></dt><dd><?php echo t('address_line'); ?></dd></div>
                    <div><dt><?php echo t('phone_title'); ?></dt><dd>2610 000 000</dd></div>
                </dl>
            </section>
        </div>
    </div>
</div>
<?php require $base . 'templates/footer.php'; ?>
