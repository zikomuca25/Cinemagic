<?php
include("../Backend/PHP/db.php");

if (isset($_GET['date'])) {
    $date = $_GET['date'];

    $sql = "SELECT * FROM movie WHERE  = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $date);
    $stmt->execute();
    $result = $stmt->get_result();

    $movies = [];
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }

    echo json_encode($movies);

    $stmt->close();
    $conn->close();
}
?>
