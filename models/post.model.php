<?php

require_once "connection.php";

class PostModel{
    static public function postData($table,$data){
        $sql = "INSERT INTO materia (title,description) VALUES (:title,:description)";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam(":title",$data['title'], PDO::PARAM_STR);
        $stmt->bindParam(":description",$data['description'], PDO::PARAM_STR);
        try{
            $stmt -> execute();
            $response = array(
                "lastId" => $link->lastInsertId(),
                "comment" => "The process was successful"
            );
            return $response;            
        }catch(PDOException $e){
            //return $link->errorInfo();
            return null;
        }        
    }
}
