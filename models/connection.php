<?php

class Connection{

    static public function infoDatabase(){        
        $infoDB = array(
            "database" => "courses",
            "user" => "john",
            "password" => "1234",

        );

        return $infoDB;
    }


    static public function connect(){
        try {
            $link = new PDO(
                "mysql:host=localhost;dbname=".Connection::infoDatabase()["database"],
                Connection::infoDatabase()["user"],
                Connection::infoDatabase()["password"]
            );
            //$link = new PDO('mysql:host=localhost;dbname=prueba', $usuario, $contraseña);
            $link->exec("set names utf8");
        } catch (PDOException $e) {
            die("Error: ".$e->getMessage());
        }
        return $link;
    }

    static public function getColumnsData($table){
        $databese = Connection::infoDatabase()['database'];
        $sql = "SELECT COLUMN_NAME AS item FROM information_schema.columns WHERE table_schema = '$databese' AND table_name = '$table'";
        return Connection::connect()
        ->query($sql)
        ->fetchAll(PDO::FETCH_OBJ);
    }

}