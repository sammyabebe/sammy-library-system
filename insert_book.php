<?php
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "Library";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$title = mysqli_real_escape_string($conn, $_POST['title']);
$author = mysqli_real_escape_string($conn, $_POST['author']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$publisher = mysqli_real_escape_string($conn, $_POST['publisher']);
$publicationYear = mysqli_real_escape_string($conn, $_POST['publicationYear']);
$isbn = mysqli_real_escape_string($conn, $_POST['isbn']);

$sql = "INSERT INTO Books (Title, Author, Category, Publisher, PublicationYear, ISBN) 
        VALUES ('$title', '$author', '$category', '$publisher', '$publicationYear', '$isbn')";

if (mysqli_query($conn, $sql)) {
    echo "New book added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header("Location: add_book.html");
exit();
?>
