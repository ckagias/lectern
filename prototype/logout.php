<?php
// A button or a plain link ends the session. Its cookie is removed too. The visitor then goes home.
$base = '';
require_once $base . 'includes/init.php';

$_SESSION = [];
setcookie(session_name(), '', time() - 3600, '/');
session_destroy();
redirect('index.php');
