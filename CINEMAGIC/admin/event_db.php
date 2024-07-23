<?php
include("db.php");

// Set the content type to JSON
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Fetch employees
        $sql = "SELECT * FROM event";
        $result = $conn->query($sql);
        $employees = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $employees[] = $row;
            }
        }

        echo json_encode($employees);
        break;

    case 'POST':
        // Add new employee

        $eventTitle = $_POST['eventTitle'];
        $eventDescription = $_POST['eventDescription'];
        $eventDate = $_POST['eventDate'];
        $eventTime = $_POST['eventTime'];
        $eventBanner = $_POST['eventBanner'];
        $eventSBanner = $_POST['eventSBanner'];
        $eventLocation = $_POST['eventLocation'];
        $eventPrice = $_POST['eventPrice'];
        
        $sql = "INSERT INTO event (eventTitle, eventDescription, eventDate, eventTime, eventBanner, eventSBanner, eventLocation, eventPrice) 
                VALUES ( '$eventTitle', '$eventDescription', '$eventDate', '$eventTime', '$eventBanner', '$eventSBanner', '$eventLocation', '$eventPrice')";
        
        
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;

    case 'PUT':
parse_str(file_get_contents("php://input"), $_PUT);

if (isset($_PUT['eventID'])) {
    $eventID = $_PUT['eventID'];
    $eventTitle = $_PUT['eventTitle'];
    $eventDescription = $_PUT['eventDescription'];
    $eventDate = $_PUT['eventDate'];
    $eventTime = $_PUT['eventTime'];
    $eventBanner = $_PUT['eventBanner'];
    $eventSBanner = $_PUT['eventSBanner'];
    $eventLocation = $_PUT['eventLocation'];
    $eventPrice = $_PUT['eventPrice'];

    
    $sql = "UPDATE event 
            SET eventTitle = ?, 
                eventDescription = ?, 
                eventDate = ?, 
                eventTime = ?, 
                eventBanner = ?, 
                eventSBanner = ?, 
                eventLocation = ?, 
                eventPrice = ? 
            WHERE eventID = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssssssi", 
                          $eventTitle, 
                          $eventDescription, 
                          $eventDate, 
                          $eventTime, 
                          $eventBanner, 
                          $eventSBanner, 
                          $eventLocation, 
                          $eventPrice, 
                          $eventID);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => $stmt->error]);
        }

        $stmt->close();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Event ID not provided']);
}

        break;

    case 'DELETE':
        // Delete employee
        parse_str(file_get_contents("php://input"), $_DELETE);
        
        if (isset($_DELETE['eventID'])) {
            $userid = $_DELETE['eventID'];

            $sql = "DELETE FROM event WHERE eventID='$userid'";
            
            if ($conn->query($sql) === TRUE) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => $conn->error]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'User ID not provided']);
        }
        break;

    default:
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
        break;
}

$conn->close();
?>
