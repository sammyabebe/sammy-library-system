<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view Av </title>
    <link rel="shortcut icon" type="image/x-icon" href="img/images.jfif.jpg">
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
    include 'display_av.php'; 
    ?>