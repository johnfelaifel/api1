<?php
//Mostrar Errores
ini_set('display_errors',1);
ini_set('log_errors',1);
ini_set('error_log',"C:/wamp64/www/api1/php_error_log");

//Requerimiento
require_once "controllers/routes.controller.php";
$index =  new RoutesController();
$index->index();
