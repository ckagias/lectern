<?php
// Checks PHP, the extensions we need and the database connection.
// Run it from the project folder: php scripts/check-env.php
require 'prototype/config.php';
$ok = true;

/** Prints one check result and remembers failures. */
function report($label, $passed, $detail = '')
{
    global $ok;
    if ($passed) {
        echo '[ok]   ';
    } else {
        echo '[FAIL] ';
        $ok = false;
    }
    echo $label;
    if ($detail !== '') {
        echo ': ' . $detail;
    }
    echo PHP_EOL;
}

report('PHP 8.1 or newer', PHP_VERSION_ID >= 80100, PHP_VERSION);
foreach (['mysqli', 'mbstring', 'session', 'json', 'fileinfo'] as $ext) {
    report('extension ' . $ext, extension_loaded($ext));
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $db = new mysqli(DB_HOST, DB_USER, DB_PASS);
    report('connect', true, $db->server_info);
    $db->set_charset('utf8mb4');

    // A scratch database that is removed at the end.
    $db->query('CREATE DATABASE IF NOT EXISTS lectern_check CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
    $db->select_db('lectern_check');
    $db->query('CREATE TABLE t (id INT AUTO_INCREMENT PRIMARY KEY, v VARCHAR(20)) ENGINE=InnoDB');
    $stmt = $db->prepare('INSERT INTO t (v) VALUES (?)');
    $value = 'Βιβλιοθήκη';
    $stmt->bind_param('s', $value);
    $stmt->execute();
    $row = $db->query('SELECT v FROM t')->fetch_assoc();
    report('prepared insert and Greek text', $row['v'] === $value, $row['v']);
    $db->query('DROP DATABASE lectern_check');
    $db->close();
} catch (mysqli_sql_exception $e) {
    report('database', false, $e->getMessage());
}

if ($ok) {
    exit(0);
}
exit(1);
