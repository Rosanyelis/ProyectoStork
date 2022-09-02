<?php

include_once("ConexionModel.php");

class Usuarios
{
    
    public function listar()
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Usuario");
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function create($nombre, $apellido, $rut, $campo, $usuario, $clave)
    {
        try {
            $data = Conexion::conectar()->prepare("INSERT INTO Usuario(Nombre, apellido, rut, campo, usuario, clave ) VALUES (?, ?, ?, ?, ?, ?)");
            $results = $data->execute([$nombre, $apellido, $rut, $campo, $usuario, $clave]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Usuario WHERE ndoc = ?");
            $data->execute([$id]);
            $results = $data->fetchObject();

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function update($id, $nombre, $apellido, $rut, $campo, $usuario, $clave)
    {
        try {
            $data = Conexion::conectar()->prepare("UPDATE Usuario SET Nombre = ?, apellido = ?, rut = ?, campo = ?, usuario = ?, clave = ? WHERE ndoc = ? ");
            $results = $data->execute([$nombre, $apellido, $rut, $campo, $usuario, $clave, $id]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $data = Conexion::conectar()->prepare("DELETE FROM Usuario WHERE ndoc = ?");
            $results = $data->execute([$id]);
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }
}
