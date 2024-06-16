<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
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
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Individual item styling */
        .transactionItem {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        /* Hover effect for transaction items */
        .transactionItem:hover {
            transform: scale(1.02);
        }

        /* Paragraph styling */
        .transactionItem p {
            margin-bottom: 12px;
            line-height: 1.6;
        }

        /* Strong text styling */
        .transactionItem p strong {
            color: #555;
        }

        /* Title styling */
        .transactionItem p:first-of-type {
            font-size: 1.2em;
            font-weight: bold;
            color: #0073e6;
        }

        /* Separator styling */
        .transactionItem hr {
            margin: 10px 0;
            border: 0;
            border-top: 1px solid #ddd;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            .transactionItem {
                padding: 15px;
            }

            .transactionItem p {
                font-size: 0.9em;
            }

            .transactionItem p:first-of-type {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
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
                echo "<p><strong>Transaction ID:</strong> " . htmlspecialchars($row["TransactionID"]) . "</p>";
                echo "<p><strong>Employee ID:</strong> " . htmlspecialchars($row["EmployeeID"]) . "</p>";
                echo "<p><strong>Material ID:</strong> " . htmlspecialchars($row["MaterialID"]) . "</p>";
                echo "<p><strong>Material Type:</strong> " . htmlspecialchars($row["MaterialType"]) . "</p>";
                echo "<p><strong>Borrow Date:</strong> " . htmlspecialchars($row["BorrowDate"]) . "</p>";
                echo "<p><strong>Due Date:</strong> " . htmlspecialchars($row["DueDate"]) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No transactions found.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
