-- Sample data. Import schema.sql first.

SET NAMES utf8mb4;
USE lectern;

INSERT INTO roles (id, name) VALUES
    (1, 'member'),
    (2, 'librarian');

-- Demo accounts, the passwords are in notes/database.md
INSERT INTO users (id, username, email, password_hash, role_id, created_at) VALUES
    (1, 'member_demo', 'member@lectern.test', '$2y$12$ZXuwqQZUiL.nQo5pcQUNUuBqvCXTH6d7NHBwstBx9V/S/R3mHm0py', 1, '2026-11-01 09:00:00'),
    (2, 'librarian_demo', 'librarian@lectern.test', '$2y$12$zcQ93k0wzAnnocSncgU3peihDRTKJPEapy9gr0WbScRtF4aKNtney', 2, '2026-11-01 09:00:00');

-- Two rows with the same title are two copies
INSERT INTO books (id, title, author, call_number, category, published_year, description, created_at, updated_at) VALUES
    (1, 'Pride and Prejudice', 'Jane Austen', 'FIC-001-A', 'Fiction', 1813, 'Elizabeth Bennet and Mr Darcy misjudge each other in a country town obsessed with marriage and money.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (2, 'Pride and Prejudice', 'Jane Austen', 'FIC-001-B', 'Fiction', 1813, 'Elizabeth Bennet and Mr Darcy misjudge each other in a country town obsessed with marriage and money.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (3, 'Jane Eyre', 'Charlotte Brontë', 'FIC-002-A', 'Fiction', 1847, 'An orphaned governess falls in love with her employer and uncovers the secret kept in his house.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (4, 'Wuthering Heights', 'Emily Brontë', 'FIC-003-A', 'Fiction', 1847, 'A wild love story on the Yorkshire moors, told through two households across two generations.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (5, 'Crime and Punishment', 'Fyodor Dostoevsky', 'FIC-004-A', 'Fiction', 1866, 'A student in Saint Petersburg commits a murder and cannot escape his own conscience.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (6, 'Crime and Punishment', 'Fyodor Dostoevsky', 'FIC-004-B', 'Fiction', 1866, 'A student in Saint Petersburg commits a murder and cannot escape his own conscience.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (7, 'Don Quixote', 'Miguel de Cervantes', 'FIC-005-A', 'Fiction', 1605, 'A gentleman reads too many chivalry tales and sets out as a knight with his squire Sancho Panza.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (8, 'The Picture of Dorian Gray', 'Oscar Wilde', 'FIC-006-A', 'Fiction', 1890, 'A young man stays beautiful while a portrait of him records every one of his sins.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (9, 'The Metamorphosis', 'Franz Kafka', 'FIC-007-A', 'Fiction', 1915, 'Gregor Samsa wakes up as a giant insect and his family has to decide what to do with him.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (10, 'The Murderess', 'Alexandros Papadiamantis', 'FIC-008-A', 'Fiction', 1903, 'An old woman on the island of Skiathos decides to end the suffering of girls born into poverty.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (11, 'Treasure Island', 'Robert Louis Stevenson', 'ADV-001-A', 'Adventure', 1883, 'Young Jim Hawkins sails after buried pirate treasure with the dangerous Long John Silver on board.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (12, 'Treasure Island', 'Robert Louis Stevenson', 'ADV-001-B', 'Adventure', 1883, 'Young Jim Hawkins sails after buried pirate treasure with the dangerous Long John Silver on board.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (13, 'Moby-Dick', 'Herman Melville', 'ADV-002-A', 'Adventure', 1851, 'Captain Ahab chases the white whale that took his leg and drags his crew along.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (14, 'The Adventures of Sherlock Holmes', 'Arthur Conan Doyle', 'ADV-003-A', 'Adventure', 1892, 'Twelve short cases solved by the detective of Baker Street and told by Dr Watson.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (15, 'Dracula', 'Bram Stoker', 'ADV-004-A', 'Adventure', 1897, 'A group of friends follows letters and diaries to stop a count who feeds on the living.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (16, 'Frankenstein', 'Mary Shelley', 'ADV-005-A', 'Adventure', 1818, 'A scientist brings a creature to life and then refuses to take responsibility for it.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (17, 'Alice''s Adventures in Wonderland', 'Lewis Carroll', 'ADV-006-A', 'Adventure', 1865, 'Alice follows a white rabbit down a hole and meets characters who ignore every rule of logic.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (18, 'The Odyssey', 'Homer', 'POE-001-A', 'Poetry', NULL, 'Odysseus spends ten years trying to get home from Troy to Ithaca.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (19, 'The Odyssey', 'Homer', 'POE-001-B', 'Poetry', NULL, 'Odysseus spends ten years trying to get home from Troy to Ithaca.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (20, 'The Republic', 'Plato', 'PHI-001-A', 'Philosophy', NULL, 'Socrates and his friends ask what justice is and what an ideal city would look like.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (21, 'The Prince', 'Niccolò Machiavelli', 'PHI-002-A', 'Philosophy', 1532, 'A short and blunt guide to gaining and keeping political power.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (22, 'On the Origin of Species', 'Charles Darwin', 'SCI-001-A', 'Science', 1859, 'The argument that species change over time through natural selection.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (23, 'The Iliad', 'Homer', 'POE-002-A', 'Poetry', NULL, 'The last weeks of the Trojan War and the anger of Achilles that changes its course.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (24, 'The Divine Comedy', 'Dante Alighieri', 'POE-003-A', 'Poetry', 1320, 'Dante travels through Hell, Purgatory and Paradise, guided first by Virgil and then by Beatrice.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (25, 'Leaves of Grass', 'Walt Whitman', 'POE-004-A', 'Poetry', 1855, 'A collection of free-verse poems that celebrates ordinary people, work and the body.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (26, 'Meditations', 'Marcus Aurelius', 'PHI-003-A', 'Philosophy', NULL, 'Private notes the Roman emperor wrote to himself about duty, self-control and accepting what we cannot change.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (27, 'Nicomachean Ethics', 'Aristotle', 'PHI-004-A', 'Philosophy', NULL, 'Aristotle asks what a good life is and argues that it comes from habits and practical wisdom.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (28, 'Beyond Good and Evil', 'Friedrich Nietzsche', 'PHI-005-A', 'Philosophy', 1886, 'Nietzsche questions the beliefs of earlier philosophers and the idea that moral values are fixed.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (29, 'Relativity: The Special and General Theory', 'Albert Einstein', 'SCI-002-A', 'Science', 1916, 'Einstein explains his two theories of relativity for readers who are not physicists.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (30, 'Euclid''s Elements', 'Euclid', 'SCI-003-A', 'Science', NULL, 'The geometry textbook that builds every proof from a few simple definitions, used for over two thousand years.', '2026-11-01 09:00:00', '2026-11-01 09:00:00'),
    (31, 'Opticks', 'Isaac Newton', 'SCI-004-A', 'Science', 1704, 'Newton''s experiments on light and colour, including how a prism splits white light.', '2026-11-01 09:00:00', '2026-11-01 09:00:00');

-- Jane Eyre on loan, Dracula returned, Pride and Prejudice (copy A) reserved, Moby-Dick cancelled
INSERT INTO reservations (id, book_id, user_id, status, reserved_at, ended_at) VALUES
    (1, 3, 1, 'fulfilled', '2026-11-04 10:00:00', '2026-11-05 11:00:00'),
    (2, 15, 1, 'fulfilled', '2026-10-04 10:00:00', '2026-10-05 11:00:00'),
    (3, 1, 1, 'active', '2026-11-12 18:30:00', NULL),
    (4, 13, 1, 'cancelled', '2026-11-08 12:00:00', '2026-11-09 08:15:00');

INSERT INTO loans (id, book_id, user_id, reservation_id, loaned_by, loaned_at, due_date, returned_at, returned_to) VALUES
    (1, 3, 1, 1, 2, '2026-11-05 11:00:00', '2026-11-19', NULL, NULL),
    (2, 15, 1, 2, 2, '2026-10-05 11:00:00', '2026-10-19', '2026-10-17 15:40:00', 2);
