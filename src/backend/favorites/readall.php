<?php
require "../connection.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    
    $stmt = $conn->prepare("select * from favorites");
    $stmt->execute();
    $result = $stmt->get_result();
    $favorites = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $favorites[] = $row;
        }
        echo json_encode(["favorites" => $favorites]);
    } else {
        echo json_encode(["message" => "no records were found"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
