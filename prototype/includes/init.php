<?php
// Every page includes this first, after it sets $base. It loads the settings, starts the session and loads the shared code.
require_once $base . 'config.php';
session_start();
require_once $base . 'includes/helpers.php';
require_once $base . 'classes/Database.php';
require_once $base . 'classes/User.php';
require_once $base . 'classes/Validator.php';
require_once $base . 'includes/lang.php';
require_once $base . 'includes/auth.php';
require_once $base . 'includes/menus.php';
