<!DOCTYPE html>
<html>
<head>
    <title>Add Transaction</title>
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
            background-color: rgb(85, 160, 11);
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
            <a href="add_book.php">Add Book</a>
            <a href="add_av.php">Add Audio Visual</a>
            <a href="add_employee.php">Add Employee</a>
            <!-- <a href="display_books.php">View Books</a> -->
            <!-- <a href="view_av.php">View Audio Visuals</a> -->
            <!-- <a href="view_employees.php">View Employees</a> -->
            <!-- <a href="view_transaction.php">View Transactions</a> -->
            <a href="add_transaction.php">Add Transaction</a>

    </div>

    <div class="container">
        <h2>Add a New Transaction</h2>
        <form action="add_transaction.php" method="post">
            <label for="employeeID">Employee ID:</label><br>
            <input type="number" id="employeeID" name="employeeID" required><br><br>
            <label for="materialID">Material ID:</label><br>
            <input type="number" id="materialID" name="materialID" required><br><br>
            <label for="materialType">Material Type (Book/AudioVisual):</label><br>
            <input type="text" id="materialType" name="materialType" required><br><br>
            <label for="borrowDate">Borrow Date:</label><br>
            <input type="date" id="borrowDate" name="borrowDate" required><br><br>
            <label for="dueDate">Due Date:</label><br>
            <input type="date" id="dueDate" name="dueDate" required><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="container">
        <?php include 'add_transaction.php'; ?>
    </div>
</body>
</html>
