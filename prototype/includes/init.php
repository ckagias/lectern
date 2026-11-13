<?php
// Every page includes this first. It loads the settings, starts the session and loads the shared code.
require_once __DIR__ . '/../config.php';
session_start();
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/User.php';
require_once __DIR__ . '/Validator.php';
require_once __DIR__ . '/lang.php';
require_once __DIR__ . '/theme.php';
require_once __DIR__ . '/auth.php';
