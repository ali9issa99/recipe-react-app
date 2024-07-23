<?php 
require "../connection.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $favorite_id = $_GET['favorite_id'];
    $stmt = $conn->prepare("select * from favorites where favorite_id = ?");
    $stmt->bind_param("i", $favorite_id);
    $stmt->execute();
    $result=$stmt->get_result();
    if ($result->num_rows>0){
        $favorites=$result->fetch_assoc();
        echo json_encode(["favorites"=>$favorites]);
    } else {
        echo json_encode(["message"=>"no records were found"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}