<?php
require "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $recipe_id = $_POST['recipe_id'];
    $user_id = $_POST['user_id'];
    $share_url = $_POST['share_url'];

    $stmt = $conn->prepare("insert into shares (recipe_id, user_id, share_url) values (?, ?, ?)");
    $stmt->bind_param("iis", $recipe_id, $user_id, $share_url);

    try {
        $stmt->execute();
        echo json_encode(["message" => "new product created", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
