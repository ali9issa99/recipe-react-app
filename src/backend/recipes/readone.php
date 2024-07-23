<?php 
require "../connection.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $recipe_id = $_GET['recipe_id'];
    $stmt = $conn->prepare("select * from recipes where recipe_id = ?");
    $stmt->bind_param("i", $recipe_id);
    $stmt->execute();
    $recipe=$stmt->get_result();
    if ($result->num_rows>0){
        $result = $stmt->get_result();
        $recipe = $result->fetch_assoc();
        echo json_encode($recipe);
    } else {
        echo json_encode(["message"=>"no records were found"]);
    }
} else {
    echo json_encode(["error" => "Wrong request method"]);
}