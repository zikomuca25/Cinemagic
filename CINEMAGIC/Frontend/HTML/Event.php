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
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Events</title>
    <link rel="stylesheet" href="../CSS/moviestyle.css">
    <link rel="stylesheet" href="../CSS/eventstyle.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php
echo common::generateHeader();
echo common::generateFirstNav();

?> 
    <header class="header">
        <div class="header-content">
            <h1>CINEMAGIC EVENTS</h1>
        </div>
    </header>
    <main>
        <section class="about">
            <h2>About our Events</h2>
            <p>Welcome to our captivating world of cinema events, where each screening promises an immersive journey into the realms of storytelling and visual artistry. As avid proponents of cinematic excellence, we curate a diverse selection of films that convey absorbing tales and captivate audiences of all ages.</p>
            <p>Step into our theater and prepare to embark on a cinematic odyssey like no other. From timeless classics to avant-garde masterpieces, our curated lineup celebrates the art of storytelling in all its glory. We strive to enhance the movie-goer’s experience by offering carefully selected films with engaging narratives, stunning visuals, and thought-provoking themes.</p>
            <p>Join us as we celebrate the magic of cinema, where every film has a story, every performance evokes emotion, and every screening becomes an unforgettable moment in time. From the anticipation that gathers during the opening credits to the applause that echoes during the closing scene, our cinema events promise to transport you to new worlds, ignite your imagination, and leave you with memories to cherish long after the credits roll. Get ready to immerse yourself in the enchanting world of cinema with us.</p>
        </section>
        <section class="events" id="events">
        </section>
    </main>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '../../Backend/eventdb.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var eventsSection = $('#events');
                    eventsSection.empty(); 
                    
                   data.forEach(function(event) {
                        var eventHtml = '<div class="event">' +
                                        '<img src="' + event.eventSBanner + '" alt="' + event.eventTitle + '" data-id="' + event.eventID + '">' +
                                        '<h3>' + event.eventTitle + '</h3>' +
                                        '<p>' + event.eventDate + '</p>' +
                                        '</div>';
                        eventsSection.append(eventHtml);
                    });

                    $('.event img').on('click', function() {
                        var eventID = $(this).data('id');
                        window.location.href = 'eventDetails.php?eventID=' + eventID;
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching events:', error);
                }
            });
        });
    </script>
    <?php
echo common::generateFooter();
?> 
</body>
</html>
