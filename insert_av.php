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

$title = mysqli_real_escape_string($conn, $_POST['title']);
$publicationYear = mysqli_real_escape_string($conn, $_POST['publicationYear']);
$lengthInMinutes = mysqli_real_escape_string($conn, $_POST['lengthInMinutes']);
$storageMediaType = mysqli_real_escape_string($conn, $_POST['storageMediaType']);
$serialNumber = mysqli_real_escape_string($conn, $_POST['serialNumber']);

$sql = "INSERT INTO AudioVisualMaterials (Title, PublicationYear, LengthInMinutes, StorageMediaType, SerialNumber) 
        VALUES ('$title', '$publicationYear', '$lengthInMinutes', '$storageMediaType', '$serialNumber')";

if (mysqli_query($conn, $sql)) {
    echo "New AV material record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header("Location: add_av.php");
exit();
?>
