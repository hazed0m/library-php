/* 
    Users 
*/
CREATE TABLE users (
    Username VARCHAR(50) PRIMARY KEY,
    Password VARCHAR(50) NOT NULL,
    FirstName VARCHAR(50),
    Surname VARCHAR(50),
    AddressLine VARCHAR(100),
    AddressLine2 VARCHAR(100),
    City VARCHAR(50),
    Telephone VARCHAR(20),
    Mobile VARCHAR(20)
);

INSERT INTO users (Username, Password, FirstName, Surname, AddressLine, AddressLine2, City, Telephone, Mobile)
VALUES
('alanjmckenna', 't1234s', 'Alan', 'McKenna', '38 Cranley Road', 'Fairview', 'Dublin', '9988377', '856625567'),
('joecrotty', 'kj7899', 'Joseph', 'Crotty', 'Apt 5 Clyde Road', 'Donnybrook', 'Dublin', '8887889', '876654456'),
('tommy100', '123456', 'Tom', 'Behan', '14 Hyde Road', 'Dalkey', 'Dublin', '9983747', '876738782');

/* 
    Categories 
*/

CREATE TABLE categories (
    CategoryID VARCHAR(3) PRIMARY KEY,
    CategoryDesc VARCHAR(50)
);

INSERT INTO categories (CategoryID, CategoryDesc)
VALUES
('001', 'Health'),
('002', 'Business'),
('003', 'Biography'),
('004', 'Technology'),
('005', 'Travel'),
('006', 'Self-Help'),
('007', 'Cookery'),
('008', 'Fiction');

/* 
    Books 
*/

CREATE TABLE books (
    ISBN VARCHAR(20) PRIMARY KEY,
    BookTitle VARCHAR(100),
    Author VARCHAR(100),
    Edition INT,
    Year INT,
    CategoryID VARCHAR(3),
    Reserved CHAR(1) DEFAULT 'N',
    FOREIGN KEY (CategoryID) REFERENCES categories(CategoryID)
);

INSERT INTO books (ISBN, BookTitle, Author, Edition, Year, CategoryID, Reserved)
VALUES
('093-403992', 'Computers in Business', 'Alicia Oneill', 3, 1997, '003', 'N'),
('23472-8729', 'Exploring Peru', 'Stephanie Birchi', 4, 2005, '005', 'N'),
('237-34823', 'Business Strategy', 'Joe Peppard', 2, 2002, '002', 'N'),
('23u8-923849', 'A guide to nutrition', 'John Thorpe', 2, 1997, '001', 'N'),
('2983-3494', 'Cooking for children', 'Anabelle Sharpe', 1, 2003, '007', 'N'),
('82n8-308', 'computers for idiots', 'Susan O''Neill', 5, 1998, '004', 'N'),
('9283-23984', 'My life in picture', 'Kevin Graham', 8, 2004, '001', 'N'),
('9823-2403-0', 'DaVinci Code', 'Dan Brown', 3, 2003, '008', 'N'),
('98234-029384', 'My ranch in Texas', 'George Bush', 1, 2005, '001', 'Y'),
('9823-98345', 'How to cook Italian food', 'Jamie Oliver', 2, 2005, '007', 'Y'),
('9823-98487', 'Optimising your business', 'Cleo Blair', 1, 2001, '002', 'N'),
('988745-234', 'Tara Road', 'Maeve Binchy', 4, 2002, '008', 'N'),
('93-004-00', 'My life in bits', 'John Smith', 2, 2001, '003', 'N'),
('9987-003982', 'Shooting History', 'Jon Snow', 1, 2003, '001', 'N');

/* 
    Reservations 
*/

CREATE TABLE reservations (
    ISBN VARCHAR(20),
    Username VARCHAR(50),
    ReservedDate DATE,
    PRIMARY KEY (ISBN, Username),
    FOREIGN KEY (ISBN) REFERENCES books(ISBN),
    FOREIGN KEY (Username) REFERENCES users(Username)
);

INSERT INTO reservations (ISBN, Username, ReservedDate)
VALUES
('98234-029384', 'joecrotty', '2008-10-11'),
('9823-98345', 'tommy100', '2008-10-11');


/*
    Reservation test
*/
INSERT INTO reservations (ISBN, Username, ReservedDate)
VALUES
('9823-98345', 'tommy100', '2008-10-11');