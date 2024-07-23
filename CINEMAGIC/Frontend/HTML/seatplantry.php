<?php
include_once("common.php");
require('../../Backend/PHP/db.php');
session_start();

if(!isset($_SESSION["admin"])){
    if(!isset($_SESSION["username"])){
        header("Location: ./default.php");
        exit();
    } 
}

if(isset($_SESSION["admin"])){
    header("Location: ./admin.php");
    exit();
}

$_SESSION['UserID']=$userId; // Assuming user ID is stored in session
$movieId = intval($_GET['MovieID']); // Get movie ID from URL

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Seat reservation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/moviestyle.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
</head>
<body>

<?php 
echo common::generateHeader();
echo common::generateFirstNav();
?>

<main>
    <div class="bar">
        <h2>Ticketing</h2>
        <span class="aside"><i>...get your lucky seat, instantly.</i></span>
    </div>
    <section>
        <?php
        // Fetch broadcast information
        $broadcastId = intval($_POST['broadcast1']);
        $query = "SELECT * FROM broadcast WHERE BroadcastId = $broadcastId";
        $broadcastRecord = mysqli_query($conn, $query) or die("Query Error: " . mysqli_error($conn));
        $broadcastInfo = mysqli_fetch_array($broadcastRecord);
        mysqli_free_result($broadcastRecord);

        // Fetch film information directly using $movieId
        $query = "SELECT * FROM movie WHERE MovieID = $movieId";
        $filmRecord = mysqli_query($conn, $query) or die("Query Error: " . mysqli_error($conn));
        $filmInfo = mysqli_fetch_array($filmRecord);
        mysqli_free_result($filmRecord);
        ?>
        <p><b>Movie name:</b>: <?php echo $filmInfo['Title']; ?></p>
        <p><b>Category:</b>: <?php echo $filmInfo['Category']; ?></p>
        <p><b>Genre:</b>: <?php echo $filmInfo['Genre']; ?></p>
        <p><b>Ratings:</b>: <?php echo $filmInfo['Ratings']; ?></p>
        <p><b>Show Time</b>: <?php echo $filmInfo['date_showing'] . " " . $broadcastInfo['Time'] ; ?></p>
    </section>

    <section class="clearfix">
        <form method="post" action="buyticket.php" onsubmit="return check();">
            <?php
            // Fetch house information directly
            $query = "SELECT * FROM theater WHERE TheaterId = " . $broadcastInfo['TheaterId'];
            $theaterRecord = mysqli_query($conn, $query) or die("Query Error: " . mysqli_error($conn));
            $theaterInfo = mysqli_fetch_array($theaterRecord);
            mysqli_free_result($theaterRecord);

            // Fetch occupied seats directly
            $query = "SELECT * FROM reservation WHERE BroadcastId = $broadcastId";
            $ticketRecord = mysqli_query($conn, $query) or die("Query Error: " . mysqli_error($conn));
            $seatsOccupied = [];
            while ($row = mysqli_fetch_array($ticketRecord)) {
                $seatsOccupied[] = ['SeatRow' => $row['SeatRow'], 'SeatCol' => $row['SeatCol']];
            }
            mysqli_free_result($ticketRecord);
            ?>

            <?php for ($row = 1; $row <= $theaterInfo['TheaterRow']; $row++) { ?>
                <div class="ticketing-row">
                    <?php
                    $rowName = chr(65 + $row - 1);
                    for ($col = 1; $col <= $theaterInfo['TheaterCol']; $col++) {
                        $isReserved = false;
                        foreach ($seatsOccupied as $seat) {
                            if ($seat['SeatRow'] == $row && $seat['SeatCol'] == $col) {
                                $isReserved = true;
                                break;
                            }
                        }
                        if ($isReserved) {
                            echo "<div class='ticketing-col reserved'>Sold $rowName$col</div>";
                        } else {
                            echo "<div class='ticketing-col'><input type='checkbox' class='checkbox' name='seat[]' value='$row|$col'>$rowName$col</div>";
                        }
                    }
                    ?>
                </div>
            <?php } ?>

            <div class="ticketing-row">
                <div class="ticketing-col screen">Screen</div>
            </div>
            <button type="submit" name="submit" id="submit" class="two-button-one">Select Seat(s)</button>
            <a href="buywelcome.php"><button type="button" name="cancel" class="two-button-two">Cancel</button></a>
            <input type="hidden" name="broadcast1" value="<?php echo $broadcastId; ?>">
        </form>
    </section>
</main>

<?php mysqli_close($conn); ?>

<script type="text/javascript">
    function check() {
        var flag = -1;
        var listOfCheckboxes = document.getElementsByClassName('checkbox');
        for (var i = 0; i < listOfCheckboxes.length; i++) {
            if (listOfCheckboxes[i].checked)
                flag = 1;
        }
        if (flag == -1) {
            alert("Please choose at least one seat.");
            return false;
        }
    }
</script>
</body>
</html>
