<?php

include_once("ConexionModel.php");

class Campos
{
    
    public function listar()
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Campo");
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function create($nombre, $area_total, $cantidad_cc, $promedio_cc)
    {
        try {
            $data = Conexion::conectar()->prepare("INSERT INTO Campo(nombre, area_total, cantidad_cc, promedio_cc) VALUES (?, ?, ?, ?)");
            $results = $data->execute([$nombre, $area_total, $cantidad_cc, $promedio_cc]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            $campo = Conexion::conectar()->prepare("SELECT * FROM Campo WHERE id_Campo = ?");
            $campo->execute([$id]);
            $data = $campo->fetchObject();

            $dato = Conexion::conectar()->prepare("SELECT * FROM CentroCosto WHERE id_Campo = ? ");
            $dato->execute([$id]);
            $centros = $dato->fetchAll(PDO::FETCH_OBJ);

            $results = compact('data', 'centros');
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Campo WHERE id_Campo = ?");
            $data->execute([$id]);
            $results = $data->fetchObject();

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function update($id, $nombre, $area_total, $cantidad_cc, $promedio_cc)
    {
        try {
            $data = Conexion::conectar()->prepare("UPDATE Campo SET nombre = ?, area_total = ?, cantidad_cc = ?, promedio_cc = ? WHERE id_Campo = ? ");
            $results = $data->execute([$nombre, $area_total, $cantidad_cc, $promedio_cc, $id]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }
}
