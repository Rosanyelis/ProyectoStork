<?php

include_once("ConexionModel.php");

class CentroCostos
{
    
    public function listar($id)
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM CentroCosto WHERE id_Campo = ? ");
            $data->execute([$id]);
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function create($campoid, $nombre, $area_cc, $cantidad_hilera, $cantidad_calle, $nombre_especie, $nombre_variedad, $nombre_combinacion)
    {
        try {
            $data = Conexion::conectar()->prepare("INSERT INTO CentroCosto(id_Campo, nombre, area_cc, cantidad_hilera, cantidad_calle, 
                    nombre_especie, nombre_variedad, nombre_combinacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $results = $data->execute([$campoid, $nombre, $area_cc, $cantidad_hilera, $cantidad_calle, $nombre_especie, $nombre_variedad, $nombre_combinacion]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function show($id, $idcc)
    {
        try {
            /** Data de Centro de Costo */
            $centro = Conexion::conectar()->prepare("SELECT * FROM CentroCosto WHERE (id_campo = ?) AND (id_CC = ?)");
            $centro->execute([$id, $idcc]);
            $data = $centro->fetchObject();
            /** Data de las calles */
            $datos = Conexion::conectar()->prepare("SELECT CentroCosto.nombre as Centro_Costo, Calle_cc.id_calle as id_calle, 
            Calle_cc.metro_calle as metro_calle 
            FROM Calle_cc INNER JOIN CentroCosto ON Calle_cc.id_cc = CentroCosto.id_CC WHERE (Calle_cc.id_campo = ?) 
            AND (Calle_cc.id_cc = ?)");
            $datos->execute([$id, $idcc]);
            $calles = $datos->fetchAll(PDO::FETCH_OBJ);
            /** Data de las hileras */
            $dato = Conexion::conectar()->prepare("SELECT CentroCosto.nombre as Centro_Costo, Hilera_cc.id_hilera as id_hilera, 
            Hilera_cc.metro_hilera as metro_hilera, Hilera_cc.arbol_hilera as arbol_hilera 
            FROM Hilera_cc INNER JOIN CentroCosto ON Hilera_cc.id_cc = CentroCosto.id_CC WHERE (Hilera_cc.id_campo = ?) 
            AND (Hilera_cc.id_cc = ?)");
            $dato->execute([$id, $idcc]);
            $hileras = $dato->fetchAll(PDO::FETCH_OBJ);
            /** Agrupamos en una matriz los datos todo lo consultado */
            $results = compact('data', 'calles', 'hileras');

            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function edit($id, $idcc)
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM CentroCosto WHERE (id_campo = ?) AND (id_CC = ?)");
            $data->execute([$id, $idcc]);
            $results = $data->fetchObject();
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function update($id, $idcc, $nombre, $area_cc, $cantidad_hilera, $cantidad_calle, $nombre_especie, $nombre_variedad, $nombre_combinacion)
    {
        try {
            $data = Conexion::conectar()->prepare("UPDATE CentroCosto SET nombre = ?, area_cc = ?, cantidad_hilera = ?, 
                    cantidad_calle = ?, nombre_especie = ?, nombre_variedad = ?, nombre_combinacion = ? WHERE (id_campo = ?) AND (id_CC = ?)");
            $results = $data->execute([$nombre, $area_cc, $cantidad_hilera, $cantidad_calle, $nombre_especie, $nombre_variedad, $nombre_combinacion, $id, $idcc]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }
}
