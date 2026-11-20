<?php
// Public library page: information about the library, with log in and register links.
$base = '';
require_once $base . 'includes/init.php';
require_once $base . 'includes/shelf_books.php';

$layout = 'public';
$title = t('home_title');
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="only light">
    <title><?php echo $title; ?> · AchaiaReads</title>
    <link rel="icon" href="<?php echo $base; ?>pictures/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?php echo $base; ?>css/fonts.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/tokens.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/base.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/layout.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/components.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/forms.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/home.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/shelf.css">
    <link rel="stylesheet" href="<?php echo $base; ?>js/leaflet/leaflet.css">
</head>
<body class="layout-public has-hero">
    <?php require $base . 'templates/header.php'; ?>

    <main id="main">
        <section class="hero">
            <img class="hero-img" src="pictures/about-library-interior-1400.jpg" srcset="pictures/about-library-interior-800.jpg 800w, pictures/about-library-interior-1400.jpg 1400w" sizes="100vw" width="1400" height="934" alt="<?php echo t('hero_photo_alt'); ?>">
            <div class="hero-in">
                <h1><?php echo t('home_h1'); ?></h1>
                <p class="lead"><?php echo t('home_lead'); ?></p>
                <div class="cta">
                    <?php if (isLoggedIn()) { ?>
                        <a class="btn white" href="dashboard.php"><?php echo t('go_dashboard'); ?></a>
                    <?php } else { ?>
                        <a class="btn white" href="login.php"><?php echo t('login'); ?></a>
                        <a class="btn line" href="register.php"><?php echo t('register'); ?></a>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="section" id="shelves">
            <h2><?php echo t('shelves_title'); ?></h2>
            <?php // The shelf: a row of book spines on a board. Books marked extra stay hidden until their category is chosen. ?>
            <div class="shelf">
                <div class="books" id="books">
                    <?php foreach ($shelfBooks as $book) {
                        $summary = $book['summary'];
                        if ($_SESSION['lang'] === 'el') {
                            $summary = $book['summary_el'];
                        }
                    ?>
                        <button type="button" class="book <?php echo $book['class']; ?>" style="--cloth: <?php echo $book['color']; ?>; --h: <?php echo $book['h']; ?>px; --w: <?php echo $book['w']; ?>px;<?php if (isset($book['fs'])) { ?> --fs: <?php echo $book['fs']; ?>;<?php } ?>" data-group="<?php echo $book['category']; ?>"<?php if (isset($book['extra'])) { ?> data-extra="yes" hidden<?php } ?> aria-haspopup="dialog" aria-label="<?php echo t('book_open'); ?>: <?php echo e($book['title']); ?>" data-title="<?php echo e($book['title']); ?>" data-author="<?php echo e($book['author']); ?>" data-year="<?php echo $book['year']; ?>" data-category="<?php echo t('cat_' . $book['category']); ?>" data-call="<?php echo e($book['call']); ?>" data-summary="<?php echo e($summary); ?>">
                            <span class="spine"><span class="spine-title"><?php echo e($book['spine']); ?></span></span>
                        </button>
                    <?php } ?>
                </div>
                <div class="board"></div>
            </div>
            <ul class="categories">
                <li><button type="button" class="category" data-group="fiction" aria-pressed="false"><?php echo t('cat_fiction'); ?></button></li>
                <li><button type="button" class="category" data-group="adventure" aria-pressed="false"><?php echo t('cat_adventure'); ?></button></li>
                <li><button type="button" class="category" data-group="poetry" aria-pressed="false"><?php echo t('cat_poetry'); ?></button></li>
                <li><button type="button" class="category" data-group="philosophy" aria-pressed="false"><?php echo t('cat_philosophy'); ?></button></li>
                <li><button type="button" class="category" data-group="science" aria-pressed="false"><?php echo t('cat_science'); ?></button></li>
            </ul>
        </section>

        <section class="section split" id="about">
            <div>
                <h2><?php echo t('about_title'); ?></h2>
                <p class="about-text"><?php echo t('about_p1'); ?></p>
                <h3 class="about-sub"><?php echo t('services_title'); ?></h3>
                <ul class="services">
                    <li><svg class="icon" aria-hidden="true"><use href="#ic-check-line"/></svg><?php echo t('service_1'); ?></li>
                    <li><svg class="icon" aria-hidden="true"><use href="#ic-check-line"/></svg><?php echo t('service_2'); ?></li>
                    <li><svg class="icon" aria-hidden="true"><use href="#ic-check-line"/></svg><?php echo t('service_3'); ?></li>
                    <li><svg class="icon" aria-hidden="true"><use href="#ic-check-line"/></svg><?php echo t('service_4'); ?></li>
                </ul>
            </div>
            <div id="find">
                <h2><?php echo t('find_title'); ?></h2>
                <div id="map" class="map" role="region" aria-label="<?php echo t('map_label'); ?>"></div>
                <p class="map-note" id="map-note" hidden><?php echo t('map_error'); ?></p>
            </div>
        </section>
        <dialog class="open-book" id="book-dialog" aria-labelledby="book-title">
            <div class="spread">
                <button type="button" class="book-close" id="book-close" aria-label="<?php echo t('book_close'); ?>"><svg class="icon" aria-hidden="true"><use href="#ic-x"/></svg></button>
                <section class="page page-left">
                    <p class="page-top">AchaiaReads</p>
                    <h2 id="book-title"></h2>
                    <p class="book-author" id="book-author"></p>
                    <dl class="book-facts">
                        <div id="book-year-row"><dt><?php echo t('book_year'); ?></dt><dd id="book-year"></dd></div>
                        <div><dt><?php echo t('book_category'); ?></dt><dd id="book-category"></dd></div>
                        <div><dt><?php echo t('book_call'); ?></dt><dd id="book-call"></dd></div>
                    </dl>
                </section>
                <section class="page page-right">
                    <h3><?php echo t('book_summary'); ?></h3>
                    <p class="book-summary" id="book-summary"></p>
                    <button type="button" class="btn" id="book-print"><?php echo t('book_save'); ?></button>
                </section>
            </div>
        </dialog>
    </main>

    <?php require $base . 'templates/footer.php'; ?>
    <?php require $base . 'templates/icons.php'; ?>
    <script src="<?php echo $base; ?>js/leaflet/leaflet.js"></script>
    <script src="<?php echo $base; ?>js/map.js"></script>
    <script src="<?php echo $base; ?>js/book.js"></script>
    <script src="<?php echo $base; ?>js/shelf.js"></script>
</body>
</html>
