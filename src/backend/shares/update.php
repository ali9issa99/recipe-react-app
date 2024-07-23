<?php

require "../connection.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $share_id = $_PUT['share_id'];
    $recipe_id = $_PUT['recipe_id'];
    $user_id = $_PUT['user_id'];
    $share_url = $_PUT['share_url'];

    $stmt = $conn->prepare("update shares set recipe_id = ?, user_id = ?, share_url = ? WHERE share_id = ?");
    $stmt->bind_param("iisi", $recipe_id, $user_id, $share_url, $share_id);
    
    if ($stmt->execute()) {
        echo json_encode(["message" => "Share updated successfully"]);
    } else {
        echo json_encode(["message" => "Error updating share: " . $stmt->error]);
    }

    $stmt->close();
}
