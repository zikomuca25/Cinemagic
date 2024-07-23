
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
    header("Location: ./admin.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <link rel="stylesheet" href="../CSS/moviestyle.css">

    <link rel="stylesheet" href="../CSS/eventdetstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php
echo common::generateHeader();
echo common::generateFirstNav();

?> 
    <header>
        <h1 id="event-title">A Genre Journey</h1>
        <p>About the Event</p>
    </header>
    <main>
        <section class="event-description" id="event-description">
            <p>Loading event details...</p>
        </section>
        <section class="event-info">
            <img src="default-event-image.jpg" alt="Event Image" id="event-image">
            <div class="event-details">
                <h2>Event Information</h2>
                <p><strong>Date:</strong> <span id="event-date">Loading...</span></p>
                <p><strong>Time:</strong> <span id="event-time">Loading...</span></p>
                <p><strong>Location:</strong> <span id="event-location">Loading...</span></p>
                <p><strong>Price:</strong> <span id="event-price">Loading...</span></p>
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function() {
            var urlParams = new URLSearchParams(window.location.search);
            var eventID = urlParams.get('eventID');

            $.ajax({
                url: '../../Backend/eventdb.php',
                method: 'GET',
                data: { eventID: eventID },
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        var event = data[0];
                        $('#event-title').text(event.eventTitle);
                        $('#event-description').html('<p>' + event.eventDescription + '</p>');
                        $('#event-image').attr('src', event.eventSBanner).attr('alt', event.eventTitle);
                        $('#event-date').text(event.eventDate);
                        $('#event-time').text(event.eventTime);
                        $('#event-location').text(event.eventLocation);
                        $('#event-price').text(event.eventPrice);
                    } else {
                        $('#event-description').html('<p>No event details found.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching event details:', error);
                    $('#event-description').html('<p>Error loading event details.</p>');
                }
            });
        });
    </script>
    <?php
echo common::generateFooter();
?> 
</body>
</html>
