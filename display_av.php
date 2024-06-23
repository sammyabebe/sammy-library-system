<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Visual Materials</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/images.jfif.jpg">
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Container styling */
        .container {
    width: 100%;
    max-width: 900px;
    margin: 50px auto;
    padding: 20px;
background: rgba( 255, 255, 255, 0.2 );
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 3.5px );
-webkit-backdrop-filter: blur( 3.5px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
}

        /* Individual item styling */
        .avItem {
            
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
        

        /* Hover effect for AV items */
        .avItem:hover {
            transform: scale(1.02);
        }

        /* Paragraph styling */
        .avItem p {
            margin-bottom: 12px;
            line-height: 1.6;
        }

        /* Strong text styling */
        .avItem p strong {
            color: #555;
        }

        /* Title styling */
        .avItem p:first-of-type {
            font-size: 1.2em;
            font-weight: bold;
            color: #0073e6;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            .avItem {
                padding: 15px;
            }

            .avItem p {
                font-size: 0.9em;
            }

            .avItem p:first-of-type {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
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
                echo "<p><strong>Title:</strong> " . htmlspecialchars($row["Title"]) . "</p>";
                echo "<p><strong>Publication Year:</strong> " . htmlspecialchars($row["PublicationYear"]) . "</p>";
                echo "<p><strong>Length (minutes):</strong> " . htmlspecialchars($row["LengthInMinutes"]) . "</p>";
                echo "<p><strong>Storage Media:</strong> " . htmlspecialchars($row["StorageMediaType"]) . "</p>";
                echo "<p><strong>Serial Number:</strong> " . htmlspecialchars($row["SerialNumber"]) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No audio visual materials found.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
