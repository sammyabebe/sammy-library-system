<?php
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS Library";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

// Select the database
mysqli_select_db($conn, "Library");

// Create Books table
$sql = "CREATE TABLE IF NOT EXISTS Books (
    BookID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(255) NOT NULL,
    Author VARCHAR(255) NOT NULL,
    Category VARCHAR(100),
    Publisher VARCHAR(255),
    PublicationYear INT,
    ISBN VARCHAR(13) UNIQUE
)";
if (mysqli_query($conn, $sql)) {
    echo "Table Books created successfully<br>";
} else {
    echo "Error creating table Books: " . mysqli_error($conn) . "<br>";
}

// Create AudioVisualMaterials table
$sql = "CREATE TABLE IF NOT EXISTS AudioVisualMaterials (
    AVID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(255) NOT NULL,
    PublicationYear INT,
    LengthInMinutes INT,
    StorageMediaType VARCHAR(50),
    SerialNumber VARCHAR(50) UNIQUE
)";
if (mysqli_query($conn, $sql)) {
    echo "Table AudioVisualMaterials created successfully<br>";
} else {
    echo "Error creating table AudioVisualMaterials: " . mysqli_error($conn) . "<br>";
}

// Create Employees table
$sql = "CREATE TABLE IF NOT EXISTS Employees (
    EmployeeID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    Sex CHAR(1)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table Employees created successfully<br>";
} else {
    echo "Error creating table Employees: " . mysqli_error($conn) . "<br>";
}

// Create Transactions table
$sql = "CREATE TABLE IF NOT EXISTS Transactions (
    TransactionID INT PRIMARY KEY AUTO_INCREMENT,
    EmployeeID INT,
    MaterialID INT,
    MaterialType ENUM('Book', 'AudioVisual'),
    BorrowDate DATE,
    DueDate DATE,
    FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table Transactions created successfully<br>";
} else {
    echo "Error creating table Transactions: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);
?>
