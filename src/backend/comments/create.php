<?php
require "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $recipe_id = $data->recipe_id;
    $user_id = $data->user_id;
    $comment = $data->comment;

    $stmt = $conn->prepare("insert into comments (recipe_id, user_id, comment) values (?, ?, ?)");
    $stmt->bind_param("iis", $recipe_id, $user_id, $comment);

    try {
        $stmt->execute();
        echo json_encode(["message" => "new comment created", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
