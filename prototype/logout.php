<?php
// The logout button posts here. The session and cookie are removed. The visitor then goes home.
$base = '';
require_once $base . 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION = [];
    setcookie(session_name(), '', time() - 3600, '/');
    session_destroy();
}
redirect('index.php');
