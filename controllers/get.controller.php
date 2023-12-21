<?php
require_once "models/get.model.php";

class GetController
{
    static public function getData($table)
    {
        $response = GetModel::getData($table);        
        $return = new GetController();
        $return -> fncResponse($response);        
    }

    static public function getDataSearch($table,$select,$linkTo,$search)
    {
        echo "$table,$select,$linkTo,$search";
        return;
        $response = GetModel::getDataSearch($table,$select,$linkTo,$search);        
        $return = new GetController();
        $return -> fncResponse($response);       
    }    

    //Respuestas del Controlador
    public function fncResponse($response)
    {
        if(!empty($response)){
            $json = array(
                'status' => 200,
                'total' => count($response),
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
