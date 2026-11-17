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

    <figure>
        <img src="pictures/hero-reading-room-1920.jpg" srcset="pictures/hero-reading-room-960.jpg 960w, pictures/hero-reading-room-1920.jpg 1920w" sizes="(min-width: 760px) 704px, 100vw" width="1920" height="820" alt="<?php echo t('about_photo_alt'); ?>">
    </figure>

    <h2><?php echo t('about_what_title'); ?></h2>
    <p><?php echo t('about_what_text'); ?></p>

    <h2><?php echo t('about_how_title'); ?></h2>
    <ol class="steps">
        <li><?php echo t('about_step_1'); ?></li>
        <li><?php echo t('about_step_2'); ?></li>
        <li><?php echo t('about_step_3'); ?></li>
    </ol>

    <h2><?php echo t('about_people_title'); ?></h2>
    <p><?php echo t('about_people_text'); ?></p>

    <div class="text-cta">
        <?php if (isLoggedIn()) { ?>
            <a class="btn action" href="dashboard.php"><?php echo t('go_dashboard'); ?></a>
        <?php } else { ?>
            <a class="btn action" href="register.php"><?php echo t('register'); ?></a>
            <a class="btn line" href="login.php"><?php echo t('login'); ?></a>
        <?php } ?>
    </div>
</article>
<?php require $base . 'templates/footer.php'; ?>
