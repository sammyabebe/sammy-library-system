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

$sql = "SELECT * FROM AudioVisualMaterials";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='avItem'>";
        echo "<p><strong>Title:</strong> " . $row["Title"] . "</p>";
        echo "<p><strong>Publication Year:</strong> " . $row["PublicationYear"] . "</p>";
        echo "<p><strong>Length (minutes):</strong> " . $row["LengthInMinutes"] . "</p>";
        echo "<p><strong>Storage Media:</strong> " . $row["StorageMediaType"] . "</p>";
        echo "<p><strong>Serial Number:</strong> " . $row["SerialNumber"] . "</p>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
