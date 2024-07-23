<?php
include_once("common.php");
include_once("../../Backend/connection.php");
session_start();
if(!isset($_SESSION["admin"])){
    if(!isset($_SESSION["username"])){
        header("Location: ./default.php");
        exit();
    } 
}
if(isset($_SESSION["admin"])){
    header("Location: ../../admin/homepageadmin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cinema</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../CSS/moviestyle.css">



</head>
<body>
<?php
echo common::generateHeader();
echo common::generateFirstNav();

?> 
   
</header>
 <!----------------------------------------------- Navbar ---------------------------------------->


<main class="main-container">
    <section class="buttons-container">
        <div class="left-buttons">
        <button id="airingButton">Airing</button>
            <button id="upcomingButton">Upcoming</button>
        </div>
        <input type="date" class="right-button" name="date-picker" id="date-picker">
    </section>
    <section class="articles-container">
        <!-- Movies will be dynamically inserted here -->
    </section>
</main>


<script src="../JS/DisplayMovie.js"></script>
<?php
echo common::generateFooter();
?> 
</body>
</html>
