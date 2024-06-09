<!DOCTYPE html>
<html>
<head>
    <title>View Employees</title>
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
            /* background-color: #ddd; */
            color: rgba(0, 0, 0, 0.562);
        }
        .container {
            /* padding: 20px 545px; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 3px solid gray;
            width: 600px;
            margin: 25px 50px 75px 500px;
            border-radius: 20px;
            
        }
        #Submit{
            padding: 10px 15px;
            
        }
        input{
            padding: 10px 55px;
            border-radius:15px;
            outline: none;
            border: 2px solid gray;
            
        }
        input:focus{
            border: 1px solid rgb(9, 255, 9);
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

    <div class="container">
        <h2>List of Employees</h2>
        <?php
         include 'display_employees.php'; 
         ?>
    </div>
</body>
</html>
