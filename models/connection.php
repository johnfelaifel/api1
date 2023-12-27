<?php
require_once "vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Connection
{

    static public function infoDatabase()
    {
        $infoDB = array(
            "database" => "courses",
            "user" => "john",
            "password" => "1234",

        );

        return $infoDB;
    }


    static public function connect()
    {
        try {
            $link = new PDO(
                "mysql:host=localhost;dbname=" . Connection::infoDatabase()["database"],
                Connection::infoDatabase()["user"],
                Connection::infoDatabase()["password"]
            );
            //$link = new PDO('mysql:host=localhost;dbname=prueba', $usuario, $contraseña);
            $link->exec("set names utf8");
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $link;
    }

    static public function getColumnsData($table)
    {
        $databese = Connection::infoDatabase()['database'];
        $sql = "SELECT COLUMN_NAME AS item FROM information_schema.columns WHERE table_schema = '$databese' AND table_name = '$table'";
        return Connection::connect()
            ->query($sql)
            ->fetchAll(PDO::FETCH_OBJ);
    }

    static public function jwt($id, $email)
    {
        $time = time();
        $token = array(
            "iat" => $time,
            "exp" => $time + (60*60*24), //Expiracion en 1 dia
            "data" => [
                "id" => $id,
                "email" => $email
            ]
        );
        $jwt = JWT::encode($token, "01234567899876543210", 'HS256');
        print_r($jwt);
    }

    static public function validarAppykey(){
        if(!isset(getallheaders()["Autorization"])  || (getallheaders()["Autorization"] != "1234567890") ){
            $json = array(
                'status' => 400,
                'result' => "You are not authorizes to make this request"
            );
            echo json_encode($json,http_response_code($json["status"]));
            return;
        }
    }

}
