<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/images.jfif.jpg">
    <link rel="stylesheet" href="styles.css">
    <style>
         * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Navbar styling */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    /* background-color: #333; */
    padding: 10px 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.navbar .menu-toggle {
    display: none;
    flex-direction: column;
    cursor: pointer;
}

.navbar .menu-toggle .bar {
    height: 3px;
    width: 25px;
    background-color: #fff;
    margin: 4px 0;
    transition: 0.4s;
}

.navbar-links {
    display: flex;
}

.navbar-links a {
    color: black;
    text-decoration: none;
    padding: 14px 20px;
    text-align: center;
    transition: background-color 0.3s, color 0.3s;
    font-size: 16px;
}

.navbar-links a:hover {
    background-color: #0056b3;
    color: #f0f0f0;
    border-radius: 4px;
}

/* Responsive design */
@media (max-width: 768px) {
    .navbar .menu-toggle {
        display: flex;
    }

    .navbar-links {
        display: none;
        flex-direction: column;
        width: 100%;
        text-align: center;
    }

    .navbar-links a {
        padding: 10px;
        font-size: 14px;
    }

    .navbar-links.active {
        display: flex;
    }
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
        .bookItem {
            
    width: 100%;
    max-width: 900px;
    margin: 50px auto;
    padding: 20px;
background: rgba( 255, 255, 255, 0.2 );
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 3.5px );
-webkit-backdrop-filter: blur( 3.5px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
}

/* Hover effect for book items */
.bookItem:hover {
    transform: scale(1.01);
    cursor: pointer;
}

/* Styling for paragraphs */
.bookItem p {
    margin-bottom: 8px;
    line-height: 1.6;
}

/* Strong text styling */
.bookItem p strong {
    color: #333;
}

/* Title styling */
.bookItem p:first-of-type {
    font-size: 1.2em;
    font-weight: bold;
    color: #0073e6;
}

/* Responsive design */
@media (max-width: 600px) {
    .bookItem {
        padding: 12px;
    }
    
    .bookItem p:first-of-type {
        font-size: 1em;
    }
    
    .bookItem p {
        font-size: 0.9em;
    }
}
    </style>
</head>
<body>
<div class="navbar">
        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <div class="navbar-links" id="navbar-links">
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
