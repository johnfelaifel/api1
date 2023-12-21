<?php
require_once "controllers/get.controller.php";

$table = $routesArray[1];

$select = isset($_GET["select"]) ? $_GET["select"] : "*";

$response = new GetController();

if(isset($_GET["linkTo"]) && isset($_GET["search"])){    
    $response -> getDataSearch($table,$select,$_GET["linkTo"],$_GET["search"]);
} else {
    $response -> getData($table);
}

