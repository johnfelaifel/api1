<?php
$routesArray = array_filter(explode("/api1/",$_SERVER['REQUEST_URI']));
$table = array_filter(explode("?",$routesArray[1]));
if(count($routesArray) == 0){
    $json = array(
        'status' => 404,
        'result' => 'Not found'
    );
} else {
    switch($_SERVER["REQUEST_METHOD"]){
        case "GET":
            include "services/get.php";
            break;
        case "POST":
            include "services/post.php";
            break;
        
        
    }
}


