<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
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
            max-width: 900px;
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
        .flip-up {
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

        /* Hover effect for transaction items */
        .flip-up:hover {
            transform: scale(1.02);
        }

        /* Paragraph styling */
        .flip-up p {
            margin-bottom: 12px;
            line-height: 1.6;
        }

        /* Strong text styling */
        .flip-up p strong {
            color: #555;
        }

        /* Title styling */
        .flip-up p:first-of-type {
            font-size: 1.2em;
            font-weight: bold;
            color: #0073e6;
        }

        /* Separator styling */
        .flip-up hr {
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
            bottom: 1038px;
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

            .flip-up {
                padding: 15px;
            }

            .flip-up p {
                font-size: 0.9em;
            }

            .flip-up p:first-of-type {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="search-form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="search" class="search-input" placeholder="Search by Employee ID">
            <!-- <button type="submit" class="search-btn">Search</button> -->
        </form>
    </div>
    <div class="container">
        <h1>Transactions</h1>
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

        // Handle delete request for transactions
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_transaction_id'])) {
            $delete_id = $_POST['delete_transaction_id'];
            $delete_sql = "DELETE FROM Transactions WHERE TransactionID = $delete_id";
            mysqli_query($conn, $delete_sql);
        }

        // Search query handling for transactions
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM Transactions WHERE EmployeeID LIKE '%$search%'";
        } else {
            $sql = "SELECT * FROM Transactions";
        }

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='flip-up' data-aos='flip-up' id='transaction-" . htmlspecialchars($row["TransactionID"]) . "'>";
                echo "<p><strong>Transaction ID:</strong> " . htmlspecialchars($row["TransactionID"]) . "</p>";
                echo "<p><strong>Employee ID:</strong> " . htmlspecialchars($row["EmployeeID"]) . "</p>";
                echo "<p><strong>Material ID:</strong> " . htmlspecialchars($row["MaterialID"]) . "</p>";
                echo "<p><strong>Material Type:</strong> " . htmlspecialchars($row["MaterialType"]) . "</p>";
                echo "<p><strong>Borrow Date:</strong> " . htmlspecialchars($row["BorrowDate"]) . "</p>";
                echo "<p><strong>Due Date:</strong> " . htmlspecialchars($row["DueDate"]) . "</p>";
                echo "<hr>";
                echo "<button class='btn hide-btn' onclick='hideTransaction(" . htmlspecialchars($row["TransactionID"]) . ")'>Hide</button>";
                echo "<form action='' method='post' style='display:inline;'>
                          <input type='hidden' name='delete_transaction_id' value='" . htmlspecialchars($row["TransactionID"]) . "'>
                          <input type='submit' class='btn' value='Delete'>
                      </form>";
                echo "</div>";
            }
        } else {
            echo "<p>No transactions found.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
    <button class="btn unhide-btn" onclick="unhideAllTransactions()">Unhide All Transactions</button>
    <script>
        function hideTransaction(TransactionID) {
            document.getElementById('transaction-' + TransactionID).style.display = 'none';
        }

        function unhideAllTransactions() {
            var transactionItems = document.querySelectorAll('[id^="transaction-"]');
            transactionItems.forEach(function(item) {
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
