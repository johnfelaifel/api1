<?php

require_once "connection.php";

class GetModel{
    static public function getData($table){
        if(empty(Connection::getColumnsData($table))){
            return null;
        }
        $sql = "SELECT * FROM $table";
        $stmt = Connection::connect()->prepare($sql);
        try{
            $stmt -> execute();
        }catch(PDOException $e){
            return null;
        }
        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }

    static public function getDataSearch($table,$select,$linkTo,$search){
        if(empty(Connection::getColumnsData($table))){
            return null;
        }        
        $sql = "SELECT $select FROM $table WHERE $linkTo LIKE '%$search%'";
        $stmt = Connection::connect()->prepare($sql);
        try{
            $stmt -> execute();
        }catch(PDOException $e){
            return null;
        }
        
        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }
}
