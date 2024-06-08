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
    header("refresh:3; url=add_transaction.html");
    exit();
} else {
    echo "Invalid request method.";
}
?>
