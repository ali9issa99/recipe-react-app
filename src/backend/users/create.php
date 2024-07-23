<?php
require "./connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $ingredients = $_POST["ingredients"];
    $steps = $_POST["steps"];

    $stmt = $conn->prepare("insert into recipes (user_id, name, ingredients, steps) values (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $name, $ingredients, $steps);

    try {
        $stmt->execute();
        echo json_encode(["message" => "new product created", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
