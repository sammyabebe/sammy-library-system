<!DOCTYPE html>
<html>
<head>
    <title>Add Audio Visual Material</title>
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
    background-color: #333;
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
    color: #fff;
    text-decoration: none;
    padding: 14px 20px;
    text-align: center;
    transition: background-color 0.3s, color 0.3s;
    font-size: 16px;
}

.navbar-links a:hover {
    background-color: #575757;
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
    width: 100%;
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
input[type="text"], input[type="number"], input[type="submit"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1em;
}

input[type="number"] {
    -moz-appearance: textfield;
}

/* Remove number spinner */
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
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

    input[type="text"], input[type="number"], input[type="submit"] {
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

    <div class="container">
        <h2>Add a New Audio Visual Material</h2>
        <form action="insert_av.php" method="post">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title"><br><br>
            <label for="publicationYear">Publication Year:</label><br>
            <input type="number" id="publicationYear" name="publicationYear"><br><br>
            <label for="lengthInMinutes">Length in Minutes:</label><br>
            <input type="number" id="lengthInMinutes" name="lengthInMinutes"><br><br>
            <label for="storageMediaType">Storage Media Type:</label><br>
            <input type="text" id="storageMediaType" name="storageMediaType"><br><br>
            <label for="serialNumber">Serial Number:</label><br>
            <input type="text" id="serialNumber" name="serialNumber"><br><br>
            <input type="submit" value="Submit" id="Submit">
        </form>
    </div>

</body>
</html>
