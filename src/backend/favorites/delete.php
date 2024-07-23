<?php
require "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $favorite_id = $_POST['favorite_id'];
    $stmt = $conn->prepare("delete from favorites where favorite_id = ?");
    $stmt->bind_param("i", $favorite_id);
    try {
        $stmt->execute();
        echo json_encode(["message" => "user of id $favorite_id got deleted", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error, "status" => "failure"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
