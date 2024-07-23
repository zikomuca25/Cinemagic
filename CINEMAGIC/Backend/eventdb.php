<?php
// Database credentials
include("../Backend/PHP/db.php");
if (isset($_GET['eventID'])) {
    // Query to get specific event details
    $eventID = intval($_GET['eventID']);
    $eventQuery = "SELECT eventID, eventSBanner, eventTitle, eventDate, eventTime, eventLocation, eventPrice, eventDescription FROM event WHERE eventID = $eventID";
    $result = $conn->query($eventQuery);

    $event = [];

    if ($result->num_rows > 0) {
        $event[] = $result->fetch_assoc();
    }

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($event);
} else {
    // Query to get event list
    $eventQuery = "SELECT eventID, eventSBanner, eventTitle, eventDate FROM event WHERE eventDate> CURDATE() ORDER BY eventDate ASC ";
    $result = $conn->query($eventQuery);

    $events = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
    }

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($events);
}

$conn->close();
?>

