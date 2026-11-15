# Lectern

Library management web application for the fictional AchaiaReads municipal library in Patras.

Coursework for CN5006 Web and Mobile Application Development, University of East London, 2026-27. This repository holds Part A.

## Features

- Public home page with the shelf, opening hours, contact details and a map
- Registration with a role code for members and librarians
- Login and logout with sessions
- Role-based dashboard. A page that belongs to the other role returns `Forbidden Action` (HTTP 403)
- Greek and English interface, designed mobile first

The catalogue, reservation, loan and return pages are placeholders until Part B.

## Stack

| | |
|---|---|
| Server | PHP 8.1 or newer |
| Database | MySQL or MariaDB |
| Client | HTML, CSS and JavaScript, no build step |
| Map | Leaflet with OpenStreetMap tiles |

## Setup

Requires XAMPP with Apache and MySQL running.

1. Copy the `prototype` folder into `htdocs`.
2. In phpMyAdmin, import `prototype/database/schema.sql` and then `prototype/database/seed.sql`. The schema replaces any existing database named `lectern`.
3. Open `http://localhost/prototype/`.

The database login is set in `prototype/config.php` and defaults to the XAMPP values (`root`, no password).

Demo accounts are listed in [`notes/database.md`](notes/database.md).

## Credits

Pictures, fonts, icons and libraries are credited in [`notes/credits.md`](notes/credits.md). The library itself is fictional.
