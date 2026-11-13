<?php
// Every page includes this first, after it sets $base. It loads the settings, starts the session and loads the shared code.
require_once $base . 'config.php';
session_start();
require_once $base . 'includes/helpers.php';
require_once $base . 'includes/Database.php';
require_once $base . 'includes/User.php';
require_once $base . 'includes/Validator.php';
require_once $base . 'includes/lang.php';
require_once $base . 'includes/auth.php';
