<?php
// About page: what the library does and how reserving and borrowing works.
$base = '';
require_once $base . 'includes/init.php';

$layout = 'public';
$title = t('about_link');
$active = 'about';
$styles = ['css/text.css'];
require $base . 'templates/header.php';
?>
<article class="text-page">
    <h1><?php echo t('about_link'); ?></h1>
    <p class="lead"><?php echo t('about_lead'); ?></p>

    <h2><?php echo t('about_what_title'); ?></h2>
    <p><?php echo t('about_what_text'); ?></p>

    <h2><?php echo t('about_how_title'); ?></h2>
    <p><?php echo t('about_how_text'); ?></p>

    <h2><?php echo t('about_people_title'); ?></h2>
    <p><?php echo t('about_people_text'); ?></p>

    <p class="text-end">
        <?php if (isLoggedIn()) { ?>
            <a href="dashboard.php"><?php echo t('go_dashboard'); ?></a>
        <?php } else { ?>
            <?php echo t('about_join'); ?> <a href="register.php"><?php echo t('register'); ?></a>
        <?php } ?>
    </p>
</article>
<?php require $base . 'templates/footer.php'; ?>
