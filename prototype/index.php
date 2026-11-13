<?php
// Public library page: information about the library, with log in and register links.
$base = '';
require_once $base . 'includes/init.php';
require_once $base . 'includes/books.php';

$layout = 'public';
$bodyClass = 'has-hero';
$title = t('home_title');
$styles = ['css/home.css', 'css/book.css', 'js/leaflet/leaflet.css'];
$scripts = ['js/leaflet/leaflet.js', 'js/map.js', 'js/book.js'];
require $base . 'includes/header.php';
?>
<section class="hero">
    <div class="hero-in">
        <h1><?php echo t('home_h1'); ?></h1>
        <p class="lead"><?php echo t('home_lead'); ?></p>
        <div class="cta">
            <a class="btn ochre" href="login.php"><?php echo t('login'); ?></a>
            <a class="btn line" href="register.php"><?php echo t('register'); ?></a>
        </div>
    </div>
</section>

<section class="section">
    <h2><?php echo t('shelves_title'); ?></h2>
    <?php require $base . 'includes/shelf.php'; ?>
    <ul class="catalogue">
        <li>
            <span class="tab cobalt">FIC</span>
            <b><?php echo t('cat_fiction'); ?></b>
            <span class="titles">Pride and Prejudice, Jane Eyre, Wuthering Heights, Crime and Punishment, Don Quixote, The Picture of Dorian Gray, The Metamorphosis, The Murderess</span>
        </li>
        <li>
            <span class="tab terra">ADV</span>
            <b><?php echo t('cat_adventure'); ?></b>
            <span class="titles">Treasure Island, Moby-Dick, The Adventures of Sherlock Holmes, Dracula, Frankenstein, Alice's Adventures in Wonderland</span>
        </li>
        <li>
            <span class="tab plum">POE</span>
            <b><?php echo t('cat_poetry'); ?></b>
            <span class="titles">The Odyssey, The Iliad, The Divine Comedy, Leaves of Grass</span>
        </li>
        <li>
            <span class="tab ochre">PHI</span>
            <b><?php echo t('cat_philosophy'); ?></b>
            <span class="titles">The Republic, The Prince, Meditations, Nicomachean Ethics, Beyond Good and Evil</span>
        </li>
        <li>
            <span class="tab teal">SCI</span>
            <b><?php echo t('cat_science'); ?></b>
            <span class="titles">On the Origin of Species, Relativity: The Special and General Theory, Euclid's Elements, Opticks</span>
        </li>
    </ul>
</section>

<section class="section two">
    <div>
        <h2><?php echo t('about_title'); ?></h2>
        <p class="text"><?php echo t('about_p1'); ?></p>
        <h3 class="sub"><?php echo t('services_title'); ?></h3>
        <ul class="services">
            <li><svg class="icon" aria-hidden="true"><use href="#ic-check"/></svg><?php echo t('service_1'); ?></li>
            <li><svg class="icon" aria-hidden="true"><use href="#ic-check"/></svg><?php echo t('service_2'); ?></li>
            <li><svg class="icon" aria-hidden="true"><use href="#ic-check"/></svg><?php echo t('service_3'); ?></li>
            <li><svg class="icon" aria-hidden="true"><use href="#ic-check"/></svg><?php echo t('service_4'); ?></li>
        </ul>
    </div>
    <figure class="photo">
        <img src="pictures/library-reading-1400.jpg" srcset="pictures/library-reading-800.jpg 800w, pictures/library-reading-1400.jpg 1400w" sizes="(min-width: 900px) 540px, 100vw" width="1400" height="934" loading="lazy" alt="<?php echo t('about_photo_alt'); ?>">
    </figure>
</section>

<section class="section two">
    <div>
        <h2><?php echo t('hours_title'); ?></h2>
        <dl class="hours">
            <div><dt><?php echo t('hours_weekdays'); ?></dt><dd>09:00–21:00</dd></div>
            <div><dt><?php echo t('hours_saturday'); ?></dt><dd>09:00–14:00</dd></div>
            <div><dt><?php echo t('hours_sunday'); ?></dt><dd><?php echo t('hours_closed'); ?></dd></div>
        </dl>
        <h3 class="sub"><?php echo t('contact_title'); ?></h3>
        <ul class="contact">
            <li><svg class="icon" aria-hidden="true"><use href="#ic-pin"/></svg><span class="visually-hidden"><?php echo t('address_label'); ?>: </span><?php echo t('address_line'); ?></li>
            <li><svg class="icon" aria-hidden="true"><use href="#ic-phone"/></svg><span class="visually-hidden"><?php echo t('phone_label'); ?>: </span>2610 000 000</li>
            <li><svg class="icon" aria-hidden="true"><use href="#ic-mail"/></svg><span class="visually-hidden"><?php echo t('email_label'); ?>: </span>info@achaiareads.test</li>
        </ul>
    </div>
    <div>
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
<?php require $base . 'includes/footer.php'; ?>
