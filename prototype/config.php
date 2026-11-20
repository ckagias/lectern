<?php
// Default XAMPP login so the project runs without changes.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'lectern');

// Greek time for dates and opening hours.
date_default_timezone_set('Europe/Athens');

// The ids of the roles table.
define('ROLE_MEMBER', 1);
define('ROLE_LIBRARIAN', 2);

// Registration codes. One for members and one for librarians.
define('CODE_MEMBER', 'MEMB2026');
define('CODE_LIBRARIAN', 'LIBR2026');
