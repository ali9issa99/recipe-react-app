<?php 
require "../connection.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $share_id=$_GET['share_id'];
    $stmt=$conn->prepare('select * from shares where share_id=?;');
    $stmt->bind_param('i',$share_id);
    $stmt->execute();
    $result=$stmt->get_result();
    
    if ($result->num_rows>0){
        $shares=$result->fetch_assoc();
        echo json_encode(["shares"=>$shares]);
    } else {
        echo json_encode(["message"=>"no records were found"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}