<!DOCTYPE html>
<html>
<head>
    <title>View Transactions</title>
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
        .transactionItem {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
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
        <h2>Transactions</h2>
        <?php include 'view_transactions.php'; ?>
    </div>
</body>
</html>
