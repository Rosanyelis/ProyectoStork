<?php

include_once("ConexionModel.php");

class Calles
{
    
    public function listar($id, $idcc)
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT CentroCosto.nombre as Centro_Costo, Calle_cc.id_calle as id_calle, 
            Calle_cc.metro_calle as metro_calle 
            FROM Calle_cc INNER JOIN CentroCosto ON Calle_cc.id_cc = CentroCosto.id_CC WHERE (Calle_cc.id_campo = ?) 
            AND (Calle_cc.id_cc = ?)");
            $data->execute([$id, $idcc]);
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function create($id, $idcc, $metro_calle)
    {
        try {
            $data = Conexion::conectar()->prepare("INSERT INTO Calle_cc(id_campo, id_cc, metro_calle) VALUES (?, ?, ?)");
            $results = $data->execute([$id, $idcc, $metro_calle]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function edit($id, $idcc, $idcalle)
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Calle_cc WHERE (id_campo = ?) AND (id_cc = ?) AND (id_calle = ?)");
            $data->execute([$id, $idcc, $idcalle]);
            $results = $data->fetchObject();
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function update($id, $idcc, $idcalle, $metro_calle)
    {
        try {
            $data = Conexion::conectar()->prepare("UPDATE Calle_cc SET metro_calle = ? WHERE (id_campo = ?) AND (id_cc = ?) AND (id_calle = ?)");
            $results = $data->execute([$metro_calle, $id, $idcc, $idcalle]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }
}
