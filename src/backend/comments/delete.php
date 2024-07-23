<?php
require "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $comment_id = $_POST['comment_id'];
    $stmt = $conn->prepare("delete from comments where comment_id = ?");
    $stmt->bind_param("i", $comment_id);
    try {
        $stmt->execute();
        echo json_encode(["message" => "comment of id $comment_id got deleted", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error, "status" => "failure"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
