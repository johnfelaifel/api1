<?php
$routesArray = array_filter(explode("/api1/",$_SERVER['REQUEST_URI']));

if(count($routesArray) == 0){
    $json = array(
        'status' => 404,
        'result' => 'Not found'
    );
} else {
    $json = array(
        'status' => 200,
        'result' => $_SERVER["REQUEST_METHOD"]        
    );
}
echo json_encode($json, http_response_code($json["status"]));


