<?php

require "../connection.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $id = $_POST['id'];


    $stmt = $conn->prepare('update username set username=? where id=?;');
    $stmt->bind_param('si', $username, $id);
    try {
        $stmt->execute();
        echo json_encode(["message" => "product of id $id got updated", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error, "status" => "failure"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
