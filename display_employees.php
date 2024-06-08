<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Employees";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='employeeItem'>";
        echo "<p><strong>Name:</strong> " . $row["Name"] . "</p>";
        echo "<p><strong>Sex:</strong> " . $row["Sex"] . "</p>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

