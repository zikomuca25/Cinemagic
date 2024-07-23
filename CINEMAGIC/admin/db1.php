<?php
include("db.php");

// Set the content type to JSON
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

function respond($data) {
    echo json_encode($data);
    exit;
}

function sanitize($data) {
    return htmlspecialchars(strip_tags($data));
}

switch ($method) {
    case 'GET':
        // Fetch employees
        $sql = "SELECT * FROM user WHERE admin=1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $employees = [];

        while ($row = $result->fetch_assoc()) {
            $employees[] = $row;
        }

        respond($employees);
        break;

    case 'POST':
        // Add new employee
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);
        $email = sanitize($_POST['email']);
        $dateOfBirth = sanitize($_POST['dateOfBirth']);
        $admin = 1; // Ensure admin is set to 1
        $is_member = 1; // Assuming a default value

        // Hash the password
        $hash = sha1($password . $salt);
        $sql = "INSERT INTO user (username, password, email, dateOfBirth, admin, is_member) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssii', $username, $hash, $email, $dateOfBirth, $admin, $is_member);

        if ($stmt->execute()) {
            respond(['success' => true]);
        } else {
            respond(['success' => false, 'message' => $stmt->error]);
        }
        break;

    case 'PUT':
        // Update employee
        parse_str(file_get_contents("php://input"), $_PUT);

        if (isset($_PUT['userid'])) {
            $userid = sanitize($_PUT['userid']);
            $username = sanitize($_PUT['username']);
            $password = sanitize($_PUT['password']);
            $email = sanitize($_PUT['email']);
            $dateOfBirth = sanitize($_PUT['dateOfBirth']);
            $admin = 1; // Ensure admin is set to 1
            $is_member = 1; // Assuming a default value

            // Hash the password
            $hash = sha1($password . $salt);
            $sql = "UPDATE user SET username=?, password=?, email=?, dateOfBirth=?, admin=?, is_member=? WHERE UserID=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssiii', $username, $hash, $email, $dateOfBirth, $admin, $is_member, $userid);

            if ($stmt->execute()) {
                respond(['success' => true]);
            } else {
                respond(['success' => false, 'message' => $stmt->error]);
            }
        } else {
            respond(['success' => false, 'message' => 'User ID not provided']);
        }
        break;

    case 'DELETE':
        // Delete employee
        parse_str(file_get_contents("php://input"), $_DELETE);

        if (isset($_DELETE['UserID'])) {
            $userid = sanitize($_DELETE['UserID']);

            $sql = "DELETE FROM user WHERE UserID=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $userid);

            if ($stmt->execute()) {
                respond(['success' => true]);
            } else {
                respond(['success' => false, 'message' => $stmt->error]);
            }
        } else {
            respond(['success' => false, 'message' => 'User ID not provided']);
        }
        break;

    default:
        respond(['success' => false, 'message' => 'Invalid request']);
        break;
}

$conn->close();
?>


