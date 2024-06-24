<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Visual Materials</title>
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
        .fade-up {
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
            position: relative;
            bottom: 1030px;
            left: 600px;
        }

        /* Hover effect for AV items */
        .fade-up:hover {
            transform: scale(1.02);
        }

        /* Paragraph styling */
        .fade-up p {
            margin-bottom: 12px;
            line-height: 1.6;
        }

        /* Strong text styling */
        .fade-up p strong {
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
        .search-form {
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
            position: relative;
            bottom: 1035px;
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
            <input type="text" name="search" class="search-input" placeholder="Search by title">
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

    // Handle delete request for audio-visual materials
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_av_id'])) {
        $delete_id = $_POST['delete_av_id'];
        $delete_sql = "DELETE FROM AudioVisualMaterials WHERE AVID = $delete_id";
        mysqli_query($conn, $delete_sql);
    }

    // Search query handling for audio-visual materials
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql_av = "SELECT * FROM AudioVisualMaterials WHERE Title LIKE '%$search%'";
    } else {
        $sql_av = "SELECT * FROM AudioVisualMaterials";
    }

    $result_av = mysqli_query($conn, $sql_av);

    if ($result_av && mysqli_num_rows($result_av) > 0) {
        while($row = mysqli_fetch_assoc($result_av)) {
            echo "<div class='fade-up' data-aos='fade-up' id='av-" . htmlspecialchars($row["AVID"]) . "'>";
            echo "<p><strong>Title:</strong> " . htmlspecialchars($row["Title"]) . "</p>";
            echo "<p><strong>Publication Year:</strong> " . htmlspecialchars($row["PublicationYear"]) . "</p>";
            echo "<p><strong>Length (minutes):</strong> " . htmlspecialchars($row["LengthInMinutes"]) . "</p>";
            echo "<p><strong>Storage Media:</strong> " . htmlspecialchars($row["StorageMediaType"]) . "</p>";
            echo "<p><strong>Serial Number:</strong> " . htmlspecialchars($row["SerialNumber"]) . "</p>";
            echo "<button class='btn hide-btn' onclick='hideAV(" . htmlspecialchars($row["AVID"]) . ")'>Hide</button>";
            echo "<form action='' method='post' style='display:inline;'>
                      <input type='hidden' name='delete_av_id' value='" . htmlspecialchars($row["AVID"]) . "'>
                      <input type='submit' class='btn' value='Delete'>
                  </form>";
            echo "</div>";
        }
    } else {
        echo "0 results for audio-visual materials";
    }

    mysqli_close($conn);
    ?>

    <button class="btn unhide-btn" onclick="unhideAllAV()">Unhide All Audio Visuals</button>

    <script>
        function hideAV(AVID) {
            document.getElementById('av-' + AVID).style.display = 'none';
        }

        function unhideAllAV() {
            var avItems = document.querySelectorAll('[id^="av-"]');
            avItems.forEach(function(item) {
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
