<?php
require "../connection.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $stmt = $conn->prepare("select * from comments");
    $stmt->execute();
    $result = $stmt->get_result();
    $comments = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }
        echo json_encode(["comments" => $comments]);
    } else {
        echo json_encode(["message" => "no records were found"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}
