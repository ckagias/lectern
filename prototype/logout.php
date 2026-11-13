<?php
// Logout: the logout button posts here. The session and its cookie are removed, then the visitor goes to the public page.
$base = '';
require_once $base . 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION = [];
    setcookie(session_name(), '', time() - 3600, '/');
    session_destroy();
}
redirect('index.php');
