<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/images.jfif.jpg">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(3.5px);
            -webkit-backdrop-filter: blur(3.5px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        /* Individual item styling */
        .employeeItem {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(3.5px);
            -webkit-backdrop-filter: blur(3.5px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            transition: transform 0.3s ease;
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

        /* Button styling */
        .btn {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #0073e6;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #005bb5;
        }

        .btn.hide-btn {
            background-color: #f0ad4e;
        }

        .btn.hide-btn:hover {
            background-color: #ec971f;
        }

        .btn.unhide-btn {
            background-color: #5cb85c;
        }

        .btn.unhide-btn:hover {
            background-color: #4cae4c;
        }

        /* Search form styling */
        .search-form {
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
            position: relative;
            bottom: 580px;
            z-index: 5;
        }

        .search-input {
            padding: 20px;
            width: 60%;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        /* .search-btn {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        } */

        .search-btn:hover {
            background-color: #45a049;
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

        .zoom-out-left h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="search-form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="search" class="search-input" placeholder="Search by name">
            <!-- <button type="submit" class="search-btn">Search</button> -->
        </form>
    </div>
    <div class="container">
        <h1>Active Employees</h1>
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

        // Handle delete request for employees
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_employee_id'])) {
            $delete_id = $_POST['delete_employee_id'];
            $delete_sql = "DELETE FROM Employees WHERE EmployeeID = $delete_id";
            mysqli_query($conn, $delete_sql);
        }

        // Search query handling for employees
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM Employees WHERE Name LIKE '%$search%'";
        } else {
            $sql = "SELECT * FROM Employees";
        }

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='employeeItem' data-aos='zoom-out-left' id='employee-" . htmlspecialchars($row["EmployeeID"]) . "'>";
                echo "<p><strong>EmployeeID:</strong> " . htmlspecialchars($row["EmployeeID"]) . "</p>";
                echo "<p><strong>Name:</strong> " . htmlspecialchars($row["Name"]) . "</p>";
                echo "<p><strong>Sex:</strong> " . htmlspecialchars($row["Sex"]) . "</p>";
                echo "<hr>";
                echo "<button class='btn hide-btn' onclick='hideEmployee(" . htmlspecialchars($row["EmployeeID"]) . ")'>Hide</button>";
                echo "<form action='' method='post' style='display:inline;'>
                          <input type='hidden' name='delete_employee_id' value='" . htmlspecialchars($row["EmployeeID"]) . "'>
                          <input type='submit' class='btn' value='Delete'>
                      </form>";
                echo "</div>";
            }
        } else {
            echo "<p>No employees found.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
    <button class="btn unhide-btn" onclick="unhideAllEmployees()">Unhide All Employees</button>
    <script>
        function hideEmployee(EmployeeID) {
            document.getElementById('employee-' + EmployeeID).style.display = 'none';
        }

        function unhideAllEmployees() {
            var employeeItems = document.querySelectorAll('[id^="employee-"]');
            employeeItems.forEach(function(item) {
                item.style.display = 'block';
            });
        }
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
