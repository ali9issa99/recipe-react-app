<?php
require "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $stmt = $conn->prepare('delete from products where id=?;');
    $stmt->bind_param('i', $id);
    try {
        $stmt->execute();
        echo json_encode(["message" => "user of id $id got deleted", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error, "status" => "failure"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
