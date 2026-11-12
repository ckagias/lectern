# Lectern

Web application for a fictional municipal library, built for the CN5006 Web & Mobile Applications Development coursework (University of East London, 2026-27).

Members browse the catalogue, reserve books and follow their loans. Librarians manage books, see reservations and register loans and returns. Both roles use one dashboard with role-based access control. The interface is mobile-first and available in Greek and English.

The library in this project is fictional.

## Stack

PHP (no framework) with `mysqli`, MySQL or MariaDB, plain HTML, CSS and JavaScript. Leaflet for the map.

## Run it locally (XAMPP)

1. Start Apache and MySQL in the XAMPP control panel.
2. Copy or link the `prototype/` folder under `htdocs`.
3. Import the SQL file from `prototype/database/` through phpMyAdmin.
4. Open `http://localhost/<folder>/`.

Without Apache, `scripts/serve.sh` serves `prototype/` on port 8080 with the PHP built-in server.
`php scripts/check-env.php` checks PHP and database access.
