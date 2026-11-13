<?php
// Public library page: information about the library, with log in and register links.
require_once __DIR__ . '/includes/init.php';

$base = '';
$layout = 'public';
$title = t('home_title');
$styles = ['home'];
require __DIR__ . '/includes/header.php';
?>
<section class="hero">
    <div class="hero-in">
        <div>
            <h1><?= t('home_h1') ?></h1>
            <p class="lead"><?= t('home_lead') ?></p>
            <div class="cta">
                <a class="btn ochre" href="login.php"><?= t('login') ?></a>
                <a class="btn line" href="register.php"><?= t('register') ?></a>
            </div>
        </div>
        <div class="shelf" aria-hidden="true">
            <?php for ($i = 0; $i < 14; $i++) { ?>
                <i></i>
            <?php } ?>
        </div>
    </div>
</section>

<section class="section">
    <h2><?= t('how_title') ?></h2>
    <ol class="steps">
        <?php for ($n = 1; $n <= 3; $n++) { ?>
            <li>
                <span class="n" aria-hidden="true"><?= $n ?></span>
                <div>
                    <b><?= t('step' . $n . '_title') ?></b>
                    <span><?= t('step' . $n . '_text') ?></span>
                </div>
            </li>
        <?php } ?>
    </ol>
</section>

<section class="section two">
    <div>
        <h2><?= t('about_title') ?></h2>
        <p class="text"><?= t('about_p1') ?></p>
        <p class="text"><?= t('about_p2') ?></p>
        <h3 class="sub"><?= t('services_title') ?></h3>
        <ul class="services">
            <?php for ($n = 1; $n <= 4; $n++) { ?>
                <li><?= icon('check') ?><?= t('service_' . $n) ?></li>
            <?php } ?>
        </ul>
    </div>
    <figure class="photo">
        <img src="pictures/library-reading-1400.jpg" srcset="pictures/library-reading-800.jpg 800w, pictures/library-reading-1400.jpg 1400w" sizes="(min-width: 900px) 540px, 100vw" width="1400" height="934" loading="lazy" alt="<?= t('about_photo_alt') ?>">
    </figure>
</section>

<section class="section two">
    <div>
        <h2><?= t('hours_title') ?></h2>
        <dl class="hours">
            <div><dt><?= t('hours_weekdays') ?></dt><dd>09:00–20:00</dd></div>
            <div><dt><?= t('hours_saturday') ?></dt><dd>09:00–14:00</dd></div>
            <div><dt><?= t('hours_sunday') ?></dt><dd><?= t('hours_closed') ?></dd></div>
        </dl>
    </div>
    <div>
        <h2><?= t('find_title') ?></h2>
        <ul class="contact">
            <li><?= t('address_line') ?></li>
            <li><?= t('phone_label') ?> 2610 000 000</li>
            <li>info@achaiareads.test</li>
        </ul>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
