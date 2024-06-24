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

$name = mysqli_real_escape_string($conn, $_POST['name']);
$sex = mysqli_real_escape_string($conn, $_POST['sex']);

$sql = "INSERT INTO Employees (Name, Sex) 
        VALUES ('$name', '$sex')";

if (mysqli_query($conn, $sql)) {
    echo "New employee record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header("Location: add_employee.php");
exit();
?>
