<?php

include_once("ConexionModel.php");

class Contratista
{
    
    public function listar()
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Contratistas");
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function create($rut_entidad, $Nombre_Entidad, $direccion, $giro, $sucursal, $trato, $valor)
    {
        try {
            $data = Conexion::conectar()->prepare("INSERT INTO Contratistas
                                                    (Rut_Entidad, Nombre_Entidad, Direccion, Giro, Sucursal, trato, valor) 
                                                    VALUES (?, ?, ?, ?, ?, ?, ?)");
            $results = $data->execute([$rut_entidad, $Nombre_Entidad, $direccion, $giro, $sucursal, $trato, $valor]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Contratistas WHERE Id = ?");
            $data->execute([$id]);
            $results = $data->fetchObject();

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            $r = Conexion::conectar()->prepare("SELECT * FROM Contratistas WHERE Id = ?");
            $r->execute([$id]);
            $data = $r->fetchObject();
            
            $t = Conexion::conectar()->prepare("SELECT * FROM Tratos");
            $t->execute();
            $tratos = $t->fetchAll(PDO::FETCH_OBJ);

            $c = Conexion::conectar()->prepare("SELECT * FROM Campo");
            $c->execute();
            $campos = $c->fetchAll(PDO::FETCH_OBJ);

            $results = compact('data','tratos', 'campos');
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function update($id, $rut_entidad, $Nombre_Entidad, $direccion, $giro, $sucursal, $trato, $valor)
    {
        try {
            $data = Conexion::conectar()->prepare("UPDATE Contratistas SET Rut_Entidad = ?, Nombre_Entidad = ?, 
                                                    Direccion = ?, Giro = ?, Sucursal = ?, trato = ?, valor = ? WHERE Id = ? ");
            $results = $data->execute([$rut_entidad, $Nombre_Entidad, $direccion, $giro, $sucursal, $trato, $valor, $id]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $data = Conexion::conectar()->prepare("DELETE FROM Contratistas WHERE Id = ?");
            $results = $data->execute([$id]);
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function SelectCampoTrato()
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Tratos");
            $data->execute();
            $tratos = $data->fetchAll(PDO::FETCH_OBJ);

            $data = Conexion::conectar()->prepare("SELECT * FROM Campo");
            $data->execute();
            $campos = $data->fetchAll(PDO::FETCH_OBJ);

            $results = compact('tratos', 'campos');
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function SearchTrato($trato)
    {
        try {
            $datos['data'] = [];
            $data = Conexion::conectar()->prepare("SELECT * FROM Tratos WHERE Trato='$trato'");
            $data->execute();
            $record = $data->fetchObject();
            $datos['data'] = [
                'Trato' => $record->Trato,
                'valor' => $record->valor,
            ];
            $results = json_encode($datos);
            echo $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }
}
