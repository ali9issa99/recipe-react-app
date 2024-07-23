<?php

require "../connection.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $comment_id = $_POST['comment_id'];
    $recipe_id = $_POST['recipe_id'];
    $user_id = $_POST['user_id'];
    $comment = $_POST['comment'];


    $stmt = $conn->prepare("update comments set recipe_id = ?, user_id = ?, comment = ? where comment_id = ?");
    $stmt->bind_param("iisi", $recipe_id, $user_id, $comment, $comment_id);
    try {
        $stmt->execute();
        echo json_encode(["message" => "comment of id $comment_id got updated", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error, "status" => "failure"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
