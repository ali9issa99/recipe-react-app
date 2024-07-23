<?php
require "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $share_id = $_POST['share_id'];
    $stmt = $conn->prepare("delete from shares where share_id = ?");
    $stmt->bind_param("i", $share_id);
    try {
        $stmt->execute();
        echo json_encode(["message" => "user of id $share_id got deleted", "status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $stmt->error, "status" => "failure"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
