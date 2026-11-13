-- Lectern database. Import this file first, then seed.sql.

DROP DATABASE IF EXISTS lectern;
CREATE DATABASE lectern CHARACTER SET utf8mb4;
USE lectern;

-- The two roles: 1 = member, 2 = librarian
CREATE TABLE roles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL
);

-- Registered accounts, the password is stored as a hash
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role_id INT UNSIGNED NOT NULL,
    created_at DATETIME NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

-- One row is one physical copy of a book
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

-- A member's reservation, status is active, cancelled or fulfilled
CREATE TABLE reservations (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    book_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    status VARCHAR(10) NOT NULL,
    reserved_at DATETIME NOT NULL,
    ended_at DATETIME,
    FOREIGN KEY (book_id) REFERENCES books(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- A loan is open until returned_at is filled in
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
    FOREIGN KEY (book_id) REFERENCES books(id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (reservation_id) REFERENCES reservations(id),
    FOREIGN KEY (loaned_by) REFERENCES users(id),
    FOREIGN KEY (returned_to) REFERENCES users(id)
);
