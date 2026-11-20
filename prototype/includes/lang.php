<?php
require_once $base . 'includes/lang_el.php';
require_once $base . 'includes/lang_en.php';

// A link like ?lang=en switches the language. The choice is kept in the session and a cookie.
if (isset($_GET['lang']) && ($_GET['lang'] === 'el' || $_GET['lang'] === 'en')) {
    $_SESSION['lang'] = $_GET['lang'];
    setcookie('lang', $_GET['lang'], time() + 31536000, '/');
}

// First visit: use the cookie, or Greek when there is none.
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'el';
    if (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'en') {
        $_SESSION['lang'] = 'en';
    }
}

// The language code, el or en, that every page prints as the lang attribute of its html element.
$lang = $_SESSION['lang'];

/**
 * Returns the text for this key in the current language.
 *
 * @param string $key The key of the text in the language files.
 * @return string The text, or the key itself when the text does not exist.
 */
function t($key)
{
    global $lang_el, $lang_en;
    $texts = $lang_el;
    if ($_SESSION['lang'] === 'en') {
        $texts = $lang_en;
    }
    if (isset($texts[$key])) {
        return $texts[$key];
    }
    return $key;
}
