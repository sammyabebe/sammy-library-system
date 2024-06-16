-- Create the Library database
CREATE DATABASE IF NOT EXISTS Library;

-- Use the Library database
USE Library;

-- Create Books table
CREATE TABLE IF NOT EXISTS Books (
    BookID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(255) NOT NULL,
    Author VARCHAR(255) NOT NULL,
    Category VARCHAR(100),
    Publisher VARCHAR(255),
    PublicationYear INT,
    ISBN VARCHAR(13) UNIQUE
);

-- Create AudioVisualMaterials table
CREATE TABLE IF NOT EXISTS AudioVisualMaterials (
    AVID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(255) NOT NULL,
    PublicationYear INT,
    LengthInMinutes INT,
    StorageMediaType VARCHAR(50),
    SerialNumber VARCHAR(50) UNIQUE
);

-- Create Employees table
CREATE TABLE IF NOT EXISTS Employees (
    EmployeeID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    Sex CHAR(1)
);

-- Create Transactions table
CREATE TABLE IF NOT EXISTS Transactions (
    TransactionID INT PRIMARY KEY AUTO_INCREMENT,
    EmployeeID INT,
    MaterialID INT,
    MaterialType ENUM('Book', 'AudioVisual'),
    BorrowDate DATE,
    DueDate DATE,
    FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID)
);

-- Insert sample data into Books table
INSERT INTO Books (Title, Author, Category, Publisher, PublicationYear, ISBN) VALUES
('IT System', 'Sammy', 'Education', 'Sammy entertaingment', 2024, '1234567890123'),
('Adwa', 'Sammy', 'History', 'Sammy entertaingment', 2024, '1234567890124');

-- Insert sample data into AudioVisualMaterials table
INSERT INTO AudioVisualMaterials (Title, PublicationYear, LengthInMinutes, StorageMediaType, SerialNumber) VALUES
('Teddy Afro Podcast', 2024, 120, 'DVD', 'AV123456'),
('Rophnan Podcast', 2024, 90, 'CD', 'AV123457');

-- Insert sample data into Employees table
INSERT INTO Employees (Name, Sex) VALUES
('Samuel abebe', 'M'),
('Netanet', 'F');

-- Insert sample data into Transactions table
INSERT INTO Transactions (EmployeeID, MaterialID, MaterialType, BorrowDate, DueDate) VALUES
(1, 1, 'Book', '2024-06-01', '2024-09-15'),
(2, 2, 'AudioVisual', '2024-05-01', '2024-10-15');

-- Query to verify that the data has been inserted
SELECT * FROM Books;
SELECT * FROM AudioVisualMaterials;
SELECT * FROM Employees;
SELECT * FROM Transactions;
