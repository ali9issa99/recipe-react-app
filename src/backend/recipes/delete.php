<?php
require "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $recipe_id = $_POST['recipe_id'];
    $stmt = $conn->prepare("delete from recipes where recipe_id = ?");
    $stmt->bind_param("i", $recipe_id);
    try {
        $stmt->execute();
        echo json_encode(["message" => "recipe of id $recipe_id got deleted", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error, "status" => "failure"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
