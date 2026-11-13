<?php
// Default XAMPP database login, so the project runs as is on the examiner's machine.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'lectern');

// The role ids stored in the roles table.
define('ROLE_MEMBER', 1);
define('ROLE_LIBRARIAN', 2);

// The registration codes. The library gives one to every new member and one to every new librarian.
define('CODE_MEMBER', 'MEMB2026');
define('CODE_LIBRARIAN', 'LIBR2026');
