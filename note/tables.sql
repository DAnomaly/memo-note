USE memopage;

DROP TABLE category;
DROP TABLE notes;

CREATE TABLE category (
	category_no INT NOT NULL,
    category_name CHAR(50) NOT NULL,
    PRIMARY KEY (category_no)
);

CREATE TABLE notes (
	notes_no INT NOT NULL,
    title VARCHAR(100) DEFAULT NULL,
    content TEXT(2000) NOT NULL,
    category_no INT DEFAULT NULL,
    PRIMARY KEY (notes_no),
    CONSTRAINT fk_notes_category FOREIGN KEY (category_no) REFERENCES category (category_no)
);