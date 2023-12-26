<?php
require_once "controllers/post.controller.php";
$table = array_filter(explode("?",$routesArray[1]));
if(isset($_POST)){
    foreach (array_keys($_POST) as $key => $value) {
        //var_dump($value);
    }     

    $response = new PostController();
    $response-> postData($table,$_POST);


} else {
    $json = array(
        'status' => 400,                
        'result' => "Error: Fields in the form do not math the database"
    );                        
    echo json_encode($json, http_response_code($json["status"]));
}