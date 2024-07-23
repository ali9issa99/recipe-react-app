<?php

require "../connection.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $recipe_id = $_POST['recipe_id'];
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $ingredients = $_POST['ingredients'];
    $steps = $_POST['steps'];


    $stmt = $conn->prepare("update recipes set user_id = ?, name = ?, ingredients = ?, steps = ? WHERE recipe_id = ?");
    $stmt->bind_param("isssi", $user_id, $name, $ingredients, $steps, $recipe_id);
    try {
        $stmt->execute();
        echo json_encode(["message" => "recipe of id $recipe_id got updated", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error, "status" => "failure"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
