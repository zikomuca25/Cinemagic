<?php
include("db.php");

header('Content-Type: application/json');
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    // Fetch user ID from the database using the username
    $userCheckSql = "SELECT UserID FROM user WHERE email = ?";
    if ($stmt = $conn->prepare($userCheckSql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt->close();
    } else {
        error_log("Failed to prepare user check SQL statement: " . $conn->error);
        echo json_encode(["error" => "Failed to prepare user check SQL statement"]);
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['movieId'], $_POST['seats'])) {
            $movieId = intval($_POST['movieId']);
            $seats = $_POST['seats']; // This should be an array of seat IDs

            // Debugging line to check movieId and seats
            error_log("Movie ID: $movieId, User ID: $userId, Seats: " . json_encode($seats));

            if (!is_array($seats) || empty($seats)) {
                echo json_encode(["error" => "Seats data is invalid"]);
                exit;
            }

            // Verify that the movieId exists
            $movieCheckSql = "SELECT 1 FROM movie WHERE MovieID = ?";
            if ($stmt = $conn->prepare($movieCheckSql)) {
                $stmt->bind_param("i", $movieId);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows === 0) {
                    echo json_encode(["error" => "Movie ID does not exist"]);
                    exit;
                }
                $stmt->close();
            } else {
                error_log("Failed to prepare movie check SQL statement: " . $conn->error);
                echo json_encode(["error" => "Failed to prepare movie check SQL statement"]);
                exit;
            }

            $conn->begin_transaction();

            try {
                foreach ($seats as $seat) {
                    $seat = intval($seat);


                    
                    // Verify that the seat exists
                    $seatCheckSql = "SELECT SeatID FROM seats WHERE SeatID = ?";
                    if ($stmt = $conn->prepare($seatCheckSql)) {
                        $stmt->bind_param("i", $seat);
                        $stmt->execute();
                        $stmt->store_result();
                        // if ($stmt->num_rows === 0) {
                        //     echo json_encode(["error" => "Seat ID $seat does not exist"]);
                        //     exit;
                        // }
                        // $stmt->close();
                    } 
                    $sql = "INSERT INTO reservations (MovieID, UserID, SeatID) VALUES (?, ?, ?)";
                    if ($stmt = $conn->prepare($sql)) {
                        $stmt->bind_param("iii", $movieId, $userId, $seat);
                        $stmt->execute();
                        $stmt->close();
                    } else {
                        throw new Exception("Failed to prepare SQL statement: " . $conn->error);
                    }
                }

                $conn->commit();
                echo json_encode(["success" => true]);
            } catch (Exception $e) {
                $conn->rollback();
                error_log($e->getMessage());
                echo json_encode(["error" => $e->getMessage()]);
            }

            $conn->close();
        } else {
            echo json_encode(["error" => "Invalid input"]);
        }
    } else {
        echo json_encode(["error" => "Invalid request method"]);
    }
} else {
    echo json_encode(["error" => "User not authenticated"]);
}
?>
