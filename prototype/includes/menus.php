<?php
// The menu of each role. The side menu and the dashboard both loop over these lists.
// An item has the page it opens, its icon, the text key of its name and the text key of its description.
$menus = [
    'member' => [
        ['key' => 'catalogue', 'page' => 'member/catalogue.php', 'icon' => 'search', 'label' => 'nav_catalogue', 'text' => 'dashboard_catalogue'],
        ['key' => 'reservations', 'page' => 'member/reservations.php', 'icon' => 'bookmarks', 'label' => 'nav_reservations', 'text' => 'dashboard_member_reservations'],
        ['key' => 'loans', 'page' => 'member/loans.php', 'icon' => 'loan', 'label' => 'nav_loans', 'text' => 'dashboard_member_loans'],
        ['key' => 'history', 'page' => 'member/history.php', 'icon' => 'history', 'label' => 'nav_history', 'text' => 'dashboard_history'],
    ],
    'librarian' => [
        ['key' => 'books', 'page' => 'librarian/books.php', 'icon' => 'books', 'label' => 'nav_books', 'text' => 'dashboard_books'],
        ['key' => 'reservations', 'page' => 'librarian/reservations.php', 'icon' => 'bookmarks', 'label' => 'nav_reservations', 'text' => 'dashboard_staff_reservations'],
        ['key' => 'loans', 'page' => 'librarian/loans.php', 'icon' => 'loan', 'label' => 'nav_loans', 'text' => 'dashboard_staff_loans'],
        ['key' => 'returns', 'page' => 'librarian/returns.php', 'icon' => 'undo', 'label' => 'nav_returns', 'text' => 'dashboard_returns'],
    ],
];
