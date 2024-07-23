<?php
include("../Backend/PHP/db.php");

header('Content-Type: application/json');

if (isset($_GET['movieid'])) {
    $movieId = intval($_GET['movieid']);
    $sql = "SELECT * FROM movie WHERE MovieID = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $movieId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $movie = $result->fetch_assoc();
            echo json_encode($movie);
        } else {
            echo json_encode(["error" => "No movie found for the given ID"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "Failed to prepare SQL statement"]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Movie ID not set"]);
}
?>
