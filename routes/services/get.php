<?php
require_once "controllers/get.controller.php";

//$table = array_filter(explode("?",$routesArray[1]));

//$select = isset($_GET["select"]) ? $_GET["select"] : "*";
$select = ($_GET["select"]) ?? "*";

$response = new GetController();

if(isset($_GET["linkTo"]) && isset($_GET["search"])){    
    $response -> getDataSearch($table[0],$select,$_GET["linkTo"],$_GET["search"]);
} else {
    $response -> getData($table[0]);
}

