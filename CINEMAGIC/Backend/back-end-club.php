<?php
session_start();
include("../Backend/PHP/db.php");

if (isset($_SESSION['username'])) {
    $user_id = $_SESSION['username'];
    
    if (!isset($_SESSION['is_member'])) {
        // Check if the user is already a member
        $check_sql = "SELECT is_member FROM user WHERE email = ?";
        $check_stmt = $conn->prepare($check_sql);

        if ($check_stmt) {
            $check_stmt->bind_param("s", $user_id);
            $check_stmt->execute();
            $check_stmt->bind_result($is_member);
            $check_stmt->fetch();
            $check_stmt->close();

            $_SESSION['is_member'] = $is_member; // Set session variable
        } else {
            echo "Error preparing check statement: " . $conn->error;
            exit;
        }
    } else {
        $is_member = $_SESSION['is_member'];
    }

    if ($is_member) {
        echo "member";
    } else {
        $update_sql = "UPDATE user SET is_member = true WHERE email = ?";
        $update_stmt = $conn->prepare($update_sql);

        if ($update_stmt) {
            $update_stmt->bind_param("s", $user_id);

            if ($update_stmt->execute()) {
                $_SESSION['is_member'] = true; // Update session variable
                echo "success";
            } else {
                echo "Error updating record: " . $update_stmt->error;
            }

            $update_stmt->close();
        } else {
            echo "Error preparing update statement: " . $conn->error;
        }
    }

    $conn->close();
} else {
    echo "To become a member you need to LogIn";
}
?>
