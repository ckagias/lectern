<?php
require_once $base . 'includes/lang_el.php';
require_once $base . 'includes/lang_en.php';

// ?lang=en switches the language. It is saved in the session and a cookie.
if (isset($_GET['lang']) && ($_GET['lang'] === 'el' || $_GET['lang'] === 'en')) {
    $_SESSION['lang'] = $_GET['lang'];
    setcookie('lang', $_GET['lang'], time() + 31536000, '/');
}

// On the first visit the cookie decides. Greek is the default.
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'el';
    if (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'en') {
        $_SESSION['lang'] = 'en';
    }
}

// Pages print this code in the lang attribute.
$lang = $_SESSION['lang'];

// Returns the text for a key or the key itself if it is missing.
function t($key)
{
    global $lang, $lang_el, $lang_en;
    $texts = $lang_el;
    if ($lang === 'en') {
        $texts = $lang_en;
    }
    if (isset($texts[$key])) {
        return $texts[$key];
    }
    return $key;
}
