<?php

require "../connection.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $favorite_id = $_POST['favorite_id'];
    $recipe_id = $_POST['recipe_id'];
    $user_id = $_POST['user_id'];


    $stmt = $conn->prepare("update favorites set recipe_id = ?, user_id = ? where favorite_id = ?");
    $stmt->bind_param("iii", $recipe_id, $user_id, $favorite_id);
    try {
        $stmt->execute();
        echo json_encode(["message" => "product of id $favorite_id got updated", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error, "status" => "failure"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
