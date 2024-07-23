<?php
require "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $recipe_id = $_POST['recipe_id'];
    $user_id = $_POST['user_id'];

    $stmt = $conn->prepare("insert into favorites (recipe_id, user_id) values (?, ?)");
    $stmt->bind_param("ii", $recipe_id, $user_id);

    try {
        $stmt->execute();
        echo json_encode(["message" => "Favorite added successfully", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
