<?php
// Dashboard: the first page after login, the same for both roles. Only the menu differs by role.
$base = '';
require_once $base . 'includes/init.php';
requireLogin($base);

$layout = roleName();
$title = t('dashboard_title');
$active = 'home';
$styles = ['css/app.css'];
$status = openingStatus(date('N'), date('H:i'));
require $base . 'templates/header.php';
?>
<section class="welcome">
    <h1><?php echo t('dashboard_welcome') . ' ' . e($_SESSION['username']); ?></h1>
    <p class="status"><?php echo t('role_' . $layout); ?> · <?php echo $status; ?></p>
</section>

<ul class="rows">
    <?php foreach ($menus[$layout] as $item) { ?>
        <li>
            <a class="row" href="<?php echo $base . $item['page']; ?>">
                <span class="tile"><svg class="icon" aria-hidden="true"><use href="#ic-<?php echo $item['icon']; ?>"/></svg></span>
                <div class="row-text">
                    <h2><?php echo t($item['label']); ?></h2>
                    <p><?php echo t($item['text']); ?></p>
                </div>
                <svg class="icon row-arrow" aria-hidden="true"><use href="#ic-arrow-right"/></svg>
            </a>
        </li>
    <?php } ?>
</ul>
<?php require $base . 'templates/footer.php'; ?>
