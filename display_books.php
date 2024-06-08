<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <style>
         body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            overflow: hidden;
            background-color: transparent;
        }
        .navbar a {
            float: left;
            display: block;
            color:black;
            text-align: center;
            padding: 14px 25px;
            text-decoration: none;
        
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            padding: 20px 545px;
            border: 1px solid green;
            width: 300px;
            
        }
        #Submit{
            padding: 10px 15px;
            margin-left:20px;
        }
        input{
            padding: 10px 55px;
            border-radius:15px
        }
    </style>
</head>
<body>
<div class="navbar">
        <a href="index.html">Home</a>
        <a href="add_book.html">Add Book</a>
        <a href="add_av.php">Add Audio Visual</a>
        <a href="add_employee.html">Add Employee</a>
        <a href="display_books.php">View Books</a>
        <a href="view_av.php">View Audio Visuals</a>
        <a href="view_employees.php">View Employees</a>
        <a href="view_transaction.php">View Transactions</a>
        <a href="add_transaction.html">Add Transaction</a>
    </div>
      
</body>
</html>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Books";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='bookItem'>";
        echo "<p><strong>Title:</strong> " . $row["Title"] . "</p>";
        echo "<p><strong>Author:</strong> " . $row["Author"] . "</p>";
        echo "<p><strong>Category:</strong> " . $row["Category"] . "</p>";
        echo "<p><strong>Publisher:</strong> " . $row["Publisher"] . "</p>";
        echo "<p><strong>Publication Year:</strong> " . $row["PublicationYear"] . "</p>";
        echo "<p><strong>ISBN:</strong> " . $row["ISBN"] . "</p>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
