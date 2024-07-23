<?php
require "../connection.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    
    $stmt = $conn->prepare("select * from recipes");
    $stmt->execute();
    $result = $stmt->get_result();
    $recipes = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $recipes[] = $row;
        }
        echo json_encode(["recipes" => $recipes]);
    } else {
        echo json_encode(["message" => "no records were found"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
