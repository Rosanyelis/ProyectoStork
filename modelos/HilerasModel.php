<?php

include_once("ConexionModel.php");

class Hileras
{
    
    public function listar($id, $idcc)
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT CentroCosto.nombre as Centro_Costo, Hilera_cc.id_hilera as id_hilera, 
            Hilera_cc.largo_hilera as largo_hilera, Hilera_cc.ancho_hilera as ancho_hilera,  Hilera_cc.hectareas as hectareas, Hilera_cc.plantas_teoricas as plantas_teoricas
            FROM Hilera_cc INNER JOIN CentroCosto ON Hilera_cc.id_cc = CentroCosto.id_CC WHERE (Hilera_cc.id_campo = ?) 
            AND (Hilera_cc.id_cc = ?)");
            $data->execute([$id, $idcc]);
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function create($id, $idcc, $metro_hilera, $arbol_hilera)
    {
        try {
            $data = Conexion::conectar()->prepare("INSERT INTO Hilera_cc(id_campo, id_cc, metro_hilera, arbol_hilera) VALUES (?, ?, ?, ?)");
            $results = $data->execute([$id, $idcc, $metro_hilera, $arbol_hilera]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function edit($id, $idcc, $idhilera)
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Hilera_cc WHERE (id_campo = ?) AND (id_cc = ?) AND (id_hilera = ?)");
            $data->execute([$id, $idcc, $idhilera]);
            $results = $data->fetchObject();
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function update($id, $idcc, $idhilera, $metro_hilera, $arbol_hilera)
    {
        try {
            $data = Conexion::conectar()->prepare("UPDATE Hilera_cc SET metro_hilera = ?, arbol_hilera = ? WHERE (id_campo = ?) AND (id_cc = ?) AND (id_hilera = ?)");
            $results = $data->execute([$metro_hilera, $arbol_hilera, $id, $idcc, $idhilera]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }
}
