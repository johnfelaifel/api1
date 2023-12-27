<?php
require_once "controllers/put.controller.php";
$column = isset($_REQUEST['column']) ? $_REQUEST['column'] : false;
$value = isset($_REQUEST['value']) ? $_REQUEST['value'] : false;
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : false;
if($column && $value && $id){   
    $response = new PutController();
    $response-> putData($table[0],$column,$value,$id);
} else {
    $json = array(
        'status' => 400,                
        'result' => "Error: Fields in the form do not math the database"
    );                        
    echo json_encode($json, http_response_code($json["status"]));
}