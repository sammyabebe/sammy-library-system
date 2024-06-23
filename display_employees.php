<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
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
    max-width: 1000px;
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
        .employeeItem {
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

        /* Hover effect for employee items */
        .employeeItem:hover {
            transform: scale(1.02);
        }

        /* Paragraph styling */
        .employeeItem p {
            margin-bottom: 12px;
            line-height: 1.6;
        }

        /* Strong text styling */
        .employeeItem p strong {
            color: #555;
        }

        /* Title styling */
        .employeeItem p:first-of-type {
            font-size: 1.2em;
            font-weight: bold;
            color: #0073e6;
        }

        /* Separator styling */
        .employeeItem hr {
            margin: 10px 0;
            border: 0;
            border-top: 1px solid #ddd;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            .employeeItem {
                padding: 15px;
            }

            .employeeItem p {
                font-size: 0.9em;
            }

            .employeeItem p:first-of-type {
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

        $sql = "SELECT * FROM Employees";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='employeeItem'>";
                echo "<p><strong>EmployeeID:</strong> " . htmlspecialchars($row["EmployeeID"]) . "</p>";
                echo "<p><strong>Name:</strong> " . htmlspecialchars($row["Name"]) . "</p>";
                echo "<p><strong>Sex:</strong> " . htmlspecialchars($row["Sex"]) . "</p>";
                echo "<hr>";
                echo "</div>";
            }
        } else {
            echo "<p>No employees found.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
