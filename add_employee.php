<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
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
   

/* Container styling */
.container {
    width: 100%;
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
background: rgba( 255, 255, 255, 0.2 );
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 3.5px );
-webkit-backdrop-filter: blur( 3.5px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
}

/* Heading styling */
.container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Form styling */
form {
    display: flex;
    flex-direction: column;
}

/* Label styling */
label {
    margin-bottom: 8px;
    color: #555;
}

/* Input styling */
input[type="text"], input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1em;
}

/* Submit button styling */
input[type="submit"] {
    background-color: #0073e6;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #005bb5;
}

/* Responsive design */
@media (max-width: 600px) {
    .container {
        padding: 15px;
    }
    
    input[type="text"], input[type="submit"] {
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
            <a href="add_book.php">Add Book</a>
            <a href="add_av.php">Add Audio Visual</a>
            <a href="add_employee.php">Add Employee</a>
            <!-- <a href="display_books.php">View Books</a> -->
            <!-- <a href="view_av.php">View Audio Visuals</a> -->
            <!-- <a href="view_employees.php">View Employees</a> -->
            <!-- <a href="view_transaction.php">View Transactions</a> -->
            <a href="add_transaction.php">Add Transaction</a>
        </div>
    </div>
    <div class="container">
        <h2>Add a New Employee</h2>
        <form action="insert_employee.php" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br><br>
            <label for="sex">Sex:</label><br>
            <input type="text" id="sex" name="sex"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <?php
    include 'display_employees.php'; 
    ?>
</body>
</html>
