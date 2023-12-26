<?php
require_once "models/post.model.php";

class PostController
{
    static public function postData($table,$data)
    {
        $response = PostModel::postData($table,$data);                
        $return = new PostController();
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
