CREATE DATABASE TLU_Library;
USE TLU_Library;
CREATE TABLE Books
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	title  VARCHAR(255),
	author VARCHAR(255),
	DESCRIPTION TEXT,
	genre VARCHAR(50)
);

CREATE TABLE Authors(
	id INT AUTO_INCREMENT PRIMARY KEY,
	NAME VARCHAR(255) NOT NULL,
	biography TEXT
);

CREATE TABLE Books_Authors(
	book_id int NOT NULL,
	author_id INT NOT NULL,
	PRIMARY KEY (book_id , author_id),
	FOREIGN KEY ( book_id) REFERENCES Books(id),
	FOREIGN KEY (author_id) REFERENCES Authors(id)
);

INSERT INTO books(title , author , DESCRIPTION , genre) VALUES
("The Lord of the rings", "J.R.R. Tolkien",  "An epic fantasy adventure...", "Fantasy"),
("Pride and Prejudice", "Jane Austen", "A classic novel of love and society...",
"Romance"),
("The Hitchhiker's Guide to the Galaxy", "Douglas Adams", "A humorous science
fiction comedy...", "Science Fiction");

INSERT INTO Authors (name, biography) VALUES
("J.R.R. Tolkien", "English writer and philologist..."),
("Jane Austen", "English novelist known for social commentary..."),
("Douglas Adams", "English writer, humorist, and dramatist...");

INSERT INTO Books_Authors (book_id, author_id) VALUES
(1, 1),
(2, 2),
(3, 3);


SELECT books.title , authors.NAME
FROM books JOIN books_authors ON books.id = books_authors.book_id
JOIN authors ON authors.id = books_authors.author_id;

SELECT * FROM books WHERE author = "J.R.R. Tolkien";

SELECT * FROM Books WHERE genre = "Science Fiction";

SELECT Authors.name, COUNT(*) AS book_count
FROM Books_Authors JOIN Authors ON Books_Authors.author_id = Authors.id
GROUP BY Authors.id;

SELECT * FROM Books WHERE title LIKE "%Lord of the Rings%";

SELECT * FROM Books
WHERE title LIKE '%PriceanJuice%';

SELECT * FROM Books
WHERE page_count > (SELECT AVG(page_count) FROM Books);
S
SELECT * FROM Books
ORDER BY publication_date DESC;

SELECT * FROM Books
LIMIT 10 OFFSET 20; 

SELECT * FROM Books
WHERE genre = "Science Fiction" AND publication_date >= '2020-01-01';

SELECT title, author,
CASE WHEN page_count > 500 THEN 'Long'
 WHEN page_count <= 200 THEN 'Short'
 ELSE 'Medium' END AS length_category
FROM Books;










