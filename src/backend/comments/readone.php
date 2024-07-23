<?php 
require "../connection.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $comment_id = $_GET['comment_id'];
    $stmt = $conn->prepare("select * from comments where comment_id = ?");
    $stmt->bind_param("i", $comment_id);
    $stmt->execute();
    $result=$stmt->get_result();
    
    if ($result->num_rows>0){
        $comment=$result->fetch_assoc();
        echo json_encode(["comment"=>$comment]);
    } else {
        echo json_encode(["message"=>"no records were found"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}