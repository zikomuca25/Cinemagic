<?php
include("db.php");
// Fetch datas
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET') {
    // Prepare the SELECT statement
    $stmt = $conn->prepare("SELECT MovieID, Title, Description, Genre, UpcomingDate, date_showing, end_date, Ratings, Category, Language, photo_link FROM movie");
    
    // Execute the statement
    if ($stmt->execute()) {
        // Bind the result variables
        $stmt->bind_result($movieID, $title, $description, $genre, $UpcomingDate, $airingDate, $end_date, $Ratings,$Category, $language, $photoLink);

        // Fetch and output the results
        $data = array();
        while ($stmt->fetch()) {
            $row = array(
                'MovieID' => $movieID,
                'Title' => $title,
                'Description' => $description,
                'Genre' => $genre,
                'UpcomingDate' => $UpcomingDate,
                'date_showing' => $airingDate,
                'end_date' => $end_date,
                'Ratings' => $Ratings,
                'Category' => $Category,
                'Language' => $language,
                'photo_link' => $photoLink
            );
            $data[] = $row;
        }
        if (count($data) > 0) {
            http_response_code(200); // Success
            echo json_encode($data);
        } else {
            http_response_code(404); // Not Found
            echo json_encode(array("message" => "No movies found."));
        }
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Error executing the query."));
    }
} 

//add a new movie 
elseif ($method == 'POST') {

    $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
    $genre = isset($_POST['genre']) ? htmlspecialchars($_POST['genre']) : '';
    $upcomingDate = isset($_POST['upcomingDate']) ? htmlspecialchars($_POST['upcomingDate']) : '';
    $airing_date = isset($_POST['AiringDate']) ? htmlspecialchars($_POST['AiringDate']) : '';
    $endDate = isset($_POST['endDate']) ? htmlspecialchars($_POST['endDate']) : '';
    $rating = isset($_POST['rating']) ? htmlspecialchars($_POST['rating']) : '';
    $category = isset($_POST['category']) ? htmlspecialchars($_POST['category']) : '';
    $Language = isset($_POST['Language']) ? htmlspecialchars($_POST['Language']) : '';
    $photo_link = isset($_POST['photo_link']) ? htmlspecialchars($_POST['photo_link']) : '';

    // Insert data into the database using prepared statements
    $stmt = $conn->prepare("INSERT INTO movie (Title, Description, Genre, UpcomingDate, date_showing, end_date, Ratings, Category, Language, photo_link) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $title, $description, $genre, $upcomingDate, $airing_date, $endDate, $rating, $category, $Language, $photo_link);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error " . $stmt->error;
    }
}

elseif ($method == 'DELETE') {

    parse_str(file_get_contents("php://input"), $_DELETE);
    $title = $_DELETE['movieid'];

    $sql = "DELETE FROM movie WHERE MovieID='$title'";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
elseif ($method == 'PUT') {
    // Update existing movie
    parse_str(file_get_contents("php://input"), $_PUT);
    
    $movieID = isset($_PUT['MovieID']) ? intval($_PUT['MovieID']) : -1;
    if ($movieID > 0) {
        $title = isset($_PUT['title']) ? htmlspecialchars($_PUT['title']) : '';
        $description = isset($_PUT['description']) ? htmlspecialchars($_PUT['description']) : '';
        $genre = isset($_PUT['genre']) ? htmlspecialchars($_PUT['genre']) : '';
        $upcomingDate = isset($_PUT['upcomingDate']) ? htmlspecialchars($_PUT['upcomingDate']) : '';
        $airing_date = isset($_PUT['AiringDate']) ? htmlspecialchars($_PUT['AiringDate']) : '';
        $endDate = isset($_PUT['endDate']) ? htmlspecialchars($_PUT['endDate']) : '';
        $rating = isset($_PUT['rating']) ? htmlspecialchars($_PUT['rating']) : '';
        $category = isset($_PUT['category']) ? htmlspecialchars($_PUT['category']) : '';
        $Language = isset($_PUT['Language']) ? htmlspecialchars($_PUT['Language']) : '';
        $photo_link = isset($_PUT['photo_link']) ? htmlspecialchars($_PUT['photo_link']) : '';

        $stmt = $conn->prepare("UPDATE movie SET Title=?, Description=?, Genre=?, UpcomingDate=?, date_showing=?, end_date=?, Ratings=?, Category=?, Language=?, photo_link=? WHERE MovieID=?");
        $stmt->bind_param("ssssssssssi", $title, $description, $genre, $upcomingDate, $airing_date, $endDate, $rating, $category, $Language, $photo_link, $movieID);
      
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: Invalid MovieID";
    }
} else {
    echo "Error: Invalid operation type";
}

$conn->close();
?>

