<?php

require_once "connection.php";

class GetModel{
    static public function getData($table){
        $sql = "SELECT * FROM $table";
        $stmt = Connection::connect()->prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }

    static public function getDataFilter($table, $select, $linkTo, $equalTo){       
        $sql = "SELECT $select FROM $table WHERE $linkTo = :$linkTo AND ";
        $stmt = Connection::connect()->prepare($sql);
        $stmt -> bindParam(":".$linkTo, $equalTo, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }

    static public function getDataSearch($table,$select,$linkTo,$search){
        $sql = "SELECT $select FROM $table WHERE $linkTo LIKE '%$search%'";
        $stmt = Connection::connect()->prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }
}
