<?php
require_once "models/put.model.php";

class PutController
{
    static public function putData($table,$col,$value,$id)
    {
        $response = PutModel::putData($table,$col,$value,$id);                
        $return = new PutController();
        $return -> fncResponse($response);        
    }

   //Respuestas del Controlador
    public function fncResponse($response)
    {
        if(!empty($response)){
            $json = array(
                'status' => 200,                
                'result' => $response
            );            
        } else {
            $json = array(
                'status' => 404,                
                'result' => "Not Found"
            );                        
        }
        echo json_encode($json, http_response_code($json["status"]));
    }
}
