<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
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

        /* Individual item styling */
        .fade-left {
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
            position: relative;
            bottom: 1200px;
            left: 600px;
        }

        /* Hover effect for items */
        .fade-left:hover {
            transform: scale(1.02);
        }

        /* Paragraph styling */
        .fade-left p {
            margin-bottom: 12px;
            line-height: 1.6;
        }

        /* Strong text styling */
        .fade-left p strong {
            color: #555;
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
            bottom: 1178px;
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
    </style>
</head>
<body>
    <div class="search-form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="search" class="search-input" placeholder="Search by title or author">
            <!-- <button type="submit" class="search-btn">Search</button> -->
        </form>
    </div>

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

    // Handle delete request
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        $delete_sql = "DELETE FROM Books WHERE BookID = $delete_id";
        mysqli_query($conn, $delete_sql);
    }

    // Search query handling
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM Books WHERE Title LIKE '%$search%' OR Author LIKE '%$search%'";
    } else {
        $sql = "SELECT * FROM Books";
    }

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='fade-left' data-aos='fade-left' id='book-" . htmlspecialchars($row["BookID"]) . "'>";
            echo "<p><strong>BookID:</strong> " . htmlspecialchars($row["BookID"]) . "</p>";
            echo "<p><strong>Title:</strong> " . htmlspecialchars($row["Title"]) . "</p>";
            echo "<p><strong>Author:</strong> " . htmlspecialchars($row["Author"]) . "</p>";
            echo "<p><strong>Category:</strong> " . htmlspecialchars($row["Category"]) . "</p>";
            echo "<p><strong>Publisher:</strong> " . htmlspecialchars($row["Publisher"]) . "</p>";
            echo "<p><strong>Publication Year:</strong> " . htmlspecialchars($row["PublicationYear"]) . "</p>";
            echo "<p><strong>ISBN:</strong> " . htmlspecialchars($row["ISBN"]) . "</p>";
            echo "<button class='btn hide-btn' onclick='hideBook(" . htmlspecialchars($row["BookID"]) . ")'>Hide</button>";
            echo "<form action='' method='post' style='display:inline;'>
                      <input type='hidden' name='delete_id' value='" . htmlspecialchars($row["BookID"]) . "'>
                      <input type='submit' class='btn' value='Delete'>
                  </form>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    ?>

    <button class="btn unhide-btn" onclick="unhideAllBooks()">Unhide All</button>

    <script>
        function hideBook(bookID) {
            document.getElementById('book-' + bookID).style.display = 'none';
        }

        function unhideAllBooks() {
            var books = document.querySelectorAll('[id^="book-"]');
            books.forEach(function(book) {
                book.style.display = 'block';
            });
        }
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
