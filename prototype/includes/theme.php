<?php
// A link like ?theme=dark switches the theme. The choice is kept in a cookie, so the server prints the right theme from the first paint.
if (isset($_GET['theme']) && ($_GET['theme'] === 'light' || $_GET['theme'] === 'dark')) {
    setcookie('theme', $_GET['theme'], time() + 31536000, '/');
    $_COOKIE['theme'] = $_GET['theme'];
}

$theme = 'light';
if (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark') {
    $theme = 'dark';
}
