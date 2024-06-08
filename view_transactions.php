<?php
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

$sql = "SELECT * FROM Transactions";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='transactionItem'>";
        echo "<p><strong>Transaction ID:</strong> " . $row["TransactionID"] . "</p>";
        echo "<p><strong>Employee ID:</strong> " . $row["EmployeeID"] . "</p>";
        echo "<p><strong>Material ID:</strong> " . $row["MaterialID"] . "</p>";
        echo "<p><strong>Material Type:</strong> " . $row["MaterialType"] . "</p>";
        echo "<p><strong>Borrow Date:</strong> " . $row["BorrowDate"] . "</p>";
        echo "<p><strong>Due Date:</strong> " . $row["DueDate"] . "</p>";
        echo "</div>";
    }
} else {
    echo "No transactions found.";
}

mysqli_close($conn);
?>
