<?php
include_once("common.php");
include_once("../../Backend/connection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cinema</title>
    <link rel="stylesheet" href="../CSS/moviestyle.css">
</head>

<body>
    <!----------------------------------------------- Header ---------------------------------------->
    <!----------------------------------------------- Header HTML ---------------------------------------->
    <!----------------------------------------------- Navbar ---------------------------------------->

    <?php
    echo common::generateHeader();
    echo common::generateFirstNav();
    ?>

    <!----------------------------------------------- Header JavaScript ---------------------------------------->
    <!--------------------------------Body HTML----------------------------->
    <main class="main-container">
    
        <section class="articles-container">
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'moviedatabase', '3306');
            if (mysqli_connect_error()) {
                echo "Database connection error";
                exit;
            }

            if (isset($_GET['userInput'])) {
                $userInput = $_GET['userInput'];
                $sql = "SELECT MovieID, Title, Description, Genre, UpcomingDate, date_showing, end_date, Ratings, Category, Language, photo_link FROM movie WHERE Title LIKE ?";
                $stmt = mysqli_prepare($con, $sql);
                $searchTerm = "%$userInput%";
                mysqli_stmt_bind_param($stmt, "s", $searchTerm);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<article class='grid-item'>";
                        echo "<h2>" . htmlspecialchars($row["Title"]) . "</h2>";
                        echo "<img src='" . htmlspecialchars($row["photo_link"]) . "' alt='Image of " . htmlspecialchars($row["Title"]) . "' style='width: 167px; height: 244px;'>";
                        echo "<p class='rate'>Rating: " . htmlspecialchars($row["Ratings"]) . "</p>";
                        echo "<p>" . htmlspecialchars($row["Description"]) . "</p>";
                        echo "<p>Genre: " . htmlspecialchars($row["Genre"]) . "</p>";
                        echo "<p>Language: " . htmlspecialchars($row["Language"]) . "</p>";
                        echo "</article>";
                    }
                } else {
                    echo "No results found.";
                }
                mysqli_stmt_close($stmt);
            }
            mysqli_close($con);
            ?>
        </section>
    </main>

    <!----------------------------------------------- Footer ---------------------------------------->
    <?php
    echo common::generateFooter();
    ?>

    <!---------------------------------------------------- Footer JavaScript ------------------------------------->
    <script>
        function gotoHome() {
            window.location.href = "#";
        }
    </script>
</body>

</html>
