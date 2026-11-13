<?php
// The menu of each role: page file, text key and icon. The nav is built from this list.
$menus = [
    'member' => [
        ['member/catalogue.php', 'nav_catalogue', 'library'],
        ['member/reservations.php', 'nav_reservations', 'bookmark'],
        ['member/loans.php', 'nav_loans', 'clock'],
        ['member/history.php', 'nav_history', 'history'],
    ],
    'librarian' => [
        ['librarian/books.php', 'nav_books', 'book'],
        ['librarian/reservations.php', 'nav_reservations', 'bookmark'],
        ['librarian/loans.php', 'nav_loans', 'clock'],
        ['librarian/returns.php', 'nav_returns', 'undo'],
    ],
];
