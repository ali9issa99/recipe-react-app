<?php
require "../connection.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $username = $_GET['username'];
    $stmt = $conn->prepare('select user_id, username, email, created_at from users ');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        echo json_encode(["products" => $products]);
    } else {
        echo json_encode(["message" => "no records were found"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
