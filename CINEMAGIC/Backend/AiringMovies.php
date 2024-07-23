<?php
include("../Backend/PHP/db.php");
$sql = "SELECT * FROM movie WHERE date_showing=  CURDATE()";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(["error" => "Failed to prepare the statement"]);
    exit;
}

$stmt->execute();

$result = $stmt->get_result();

$movies = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
} else {
    echo json_encode(["error" => "No results found"]);
    exit;
}

$stmt->close();

$conn->close();

header('Content-Type: application/json');

echo json_encode($movies);
?>
