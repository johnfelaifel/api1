<?php
$routesArray = array_filter(explode("/api1/",$_SERVER['REQUEST_URI']));
$table = array_filter(explode("?",$routesArray[1]));

//crear validar jwtoken
//$jwt = Connection::jwt("22","john@gmail.com");

//Validar key en la cabecera de la peticion, la cabecera debe llamarse "Autorization" para este ejemplo con la clave 1234567890
//Connection::validarAppykey();
//return;

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
/*             
        case "PUT":
            include "services/put.php";
            break;
        
 */          
        
    }
}


