<?php
class Conexion{

    public static function conectar(){

        $serverName = "DESKTOP-84OTVUB\SQLEXPRESS";
        $db = "Storck";
        $database = new PDO("sqlsrv:server=$serverName;database=$db","sa","AdminSystem");

        return $database;

    }

}


 