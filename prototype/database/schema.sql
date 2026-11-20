-- Creates the lectern database. Import this first and then seed.sql.

DROP DATABASE IF EXISTS lectern;
CREATE DATABASE lectern CHARACTER SET utf8mb4;
USE lectern;

-- 1 is member and 2 is librarian.
CREATE TABLE roles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL
);

INSERT INTO roles (id, name) VALUES
    (1, 'member'),
    (2, 'librarian');

-- Accounts. The password is stored as a hash.
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role_id INT UNSIGNED NOT NULL,
    created_at DATETIME NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

-- Each row is one physical copy of a book.
CREATE TABLE books (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    author VARCHAR(100) NOT NULL,
    call_number VARCHAR(20) NOT NULL,
    category VARCHAR(50) NOT NULL,
    published_year INT,
    description TEXT,
    cover_path VARCHAR(255),
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

-- A member's reservation. Status is active or cancelled or fulfilled.
CREATE TABLE reservations (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    book_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    status VARCHAR(10) NOT NULL CHECK (status IN ('active', 'cancelled', 'fulfilled')),
    reserved_at DATETIME NOT NULL,
    ended_at DATETIME,
    -- Copy id while active and empty after. The unique key allows one active reservation per copy.
    active_book_id INT UNSIGNED GENERATED ALWAYS AS (IF(status = 'active', book_id, NULL)) STORED,
    UNIQUE KEY one_active_reservation (active_book_id),
    FOREIGN KEY (book_id) REFERENCES books(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- A loan stays open until returned_at is filled.
CREATE TABLE loans (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    book_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    reservation_id INT UNSIGNED,
    loaned_by INT UNSIGNED NOT NULL,
    loaned_at DATETIME NOT NULL,
    due_date DATE NOT NULL,
    returned_at DATETIME,
    returned_to INT UNSIGNED,
    -- Copy id while open and empty after. The unique key allows one open loan per copy.
    open_book_id INT UNSIGNED GENERATED ALWAYS AS (IF(returned_at IS NULL, book_id, NULL)) STORED,
    UNIQUE KEY one_open_loan (open_book_id),
    FOREIGN KEY (book_id) REFERENCES books(id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (reservation_id) REFERENCES reservations(id),
    FOREIGN KEY (loaned_by) REFERENCES users(id),
    FOREIGN KEY (returned_to) REFERENCES users(id)
);

-- A copy on loan cannot get a new active reservation. A plain constraint cannot compare two tables.
DELIMITER $$
CREATE TRIGGER no_reservation_on_loan
BEFORE INSERT ON reservations
FOR EACH ROW
BEGIN
    IF NEW.status = 'active' AND EXISTS (SELECT 1 FROM loans WHERE book_id = NEW.book_id AND returned_at IS NULL) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'This copy is on loan';
    END IF;
END$$
DELIMITER ;
