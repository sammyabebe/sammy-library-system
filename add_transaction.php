<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeID = mysqli_real_escape_string($conn, $_POST['employeeID']);
    $materialID = mysqli_real_escape_string($conn, $_POST['materialID']);
    $materialType = mysqli_real_escape_string($conn, $_POST['materialType']);
    $borrowDate = mysqli_real_escape_string($conn, $_POST['borrowDate']);
    $dueDate = mysqli_real_escape_string($conn, $_POST['dueDate']);

    // Check if EmployeeID exists
    $employeeCheck = "SELECT EmployeeID FROM Employees WHERE EmployeeID = '$employeeID'";
    $result = mysqli_query($conn, $employeeCheck);

    if (mysqli_num_rows($result) > 0) {
        // EmployeeID exists, proceed to insert transaction
        $sql = "INSERT INTO Transactions (EmployeeID, MaterialID, MaterialType, BorrowDate, DueDate) 
                VALUES ('$employeeID', '$materialID', '$materialType', '$borrowDate', '$dueDate')";

        if (mysqli_query($conn, $sql)) {
            echo "New transaction created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        // EmployeeID does not exist
        echo "Error: EmployeeID $employeeID does not exist.";
    }

    mysqli_close($conn);

    // Redirect after a delay to see the success message
    header("refresh:3; url=add_transaction.php");
    exit();
} else {
    echo "";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Transaction</title>
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

        /* Form heading */
        .container h2 {
            margin-bottom: 20px;
            font-size: 1.5em;
            color: #333;
            text-align: center;
        }

        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
        }

        /* Label styling */
        label {
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        /* Input field styling */
        input[type="number"],
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }

        /* Submit button styling */
        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #0073e6;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Button hover effect */
        input[type="submit"]:hover {
            background-color: #005bb5;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            form {
                display: block;
            }

            input[type="number"],
            input[type="text"],
            input[type="date"],
            input[type="submit"] {
                width: 100%;
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
            <input type="submit" value="Submit" id="submit">
        </form>
    </div>
    <?php
    include 'view_transaction.php'; 
    ?>
</body>
</html>
