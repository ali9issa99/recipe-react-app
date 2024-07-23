<?php
require "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_POST["user_id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password_hash = $_POST["password_hash"];

    $stmt = $conn->prepare("insert into recipes (user_id, username, email, password_hash) values (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $username, $email, $password_hash, $created_at);

    try {
        $stmt->execute();
        echo json_encode(["message" => "new product created", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
