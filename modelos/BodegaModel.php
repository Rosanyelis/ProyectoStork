<?php

include_once("ConexionModel.php");
date_default_timezone_set("America/Santiago");

class Bodega
{
    
    public function listar()
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM item");
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function create($codigoProducto, $descripcion, $medida, $stock, $Familia, $SubFamilia, $Tipo, $preciocomprau, $preciocomprat, $preciovalorp, $preciocostor)
    {
        try {
            $d = new DateTime();
            $fecha = $d->format('Y-m-d');
            $data = Conexion::conectar()->prepare("INSERT INTO Productos (cod_producto, descripcion, medida, stock, familia, sub_familia, tipo, preciocompra_unidad, preciocompra_total, preciovalor_p, preciocosto_r, fecha_creacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $results = $data->execute([$codigoProducto, $descripcion, $medida, $stock, $Familia, $SubFamilia, $Tipo, $preciocomprau, $preciocomprat, $preciovalorp, $preciocostor, $fecha]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            $campo = Conexion::conectar()->prepare("SELECT * FROM item WHERE c_item = ?");
            $campo->execute([$id]);
            $data = $campo->fetchObject();

            $results = compact('data');
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM item WHERE c_item = ?");
            $data->execute([$id]);
            $results = $data->fetchObject();

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function update($id, $codigoProducto, $descripcion, $medida, $stock, $Familia, $SubFamilia, $Tipo, $preciocomprau, $preciocomprat, $preciovalorp, $preciocostor)
    {
        try {
            $data = Conexion::conectar()->prepare("UPDATE Productos SET cod_producto = ?, descripcion = ?, medida = ?, stock = ?, familia = ?, sub_familia = ?, tipo = ?, preciocompra_unidad = ?, preciocompra_total = ?, preciovalor_p = ?, preciocosto_r = ? WHERE n_producto = ? ");
            $results = $data->execute([$codigoProducto, $descripcion, $medida, $stock, $Familia, $SubFamilia, $Tipo, $preciocomprau, $preciocomprat, $preciovalorp, $preciocostor, $id]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $data = Conexion::conectar()->prepare("DELETE FROM item WHERE c_item = ?");
            $results = $data->execute([$id]);
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }
}
