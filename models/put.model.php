<?php

require_once "connection.php";

class PutModel{
    static public function putData($table,$col,$value,$id){

        $sql = "UPDATE $table SET $col = '$value' WHERE id = $id";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        try{
            $stmt -> execute();
            $response = array(
                "comment" => "The process was successful"
            );
            return $response;            
        }catch(PDOException $e){
            //return $link->errorInfo();
            return null;
        }        
    }
}
