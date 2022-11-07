<?php

include_once("ConexionModel.php");

class Colaboradores
{
    
    public function listar()
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Colaborador");
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function create($r_trabajador, $nombres, $Apellido_paterno, $Apellido_materno, $Fecha_Nacimiento, $sexo, $n_cuadrillas, $n_contrato, $n_labor_vigencia)
    {
        try {
            $n_trabajador = $nombres.' '.$Apellido_paterno.' '.$Apellido_materno;
            $r_empresa = '76.582.871-6';
            $n_empresa = 'Storck Chile SPA';

            $data = Conexion::conectar()->prepare("INSERT INTO Colaborador
                                                    (r_trabajador, n_trabajador, Fecha_Nacimiento, nombres, 
                                                    Apellido_paterno, Apellido_materno, sexo, n_cuadrillas,
                                                    n_contrato, r_empresa, n_empresa, n_labor_vigencia) 
                                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $results = $data->execute([$r_trabajador, $n_trabajador, $Fecha_Nacimiento, $nombres, $Apellido_paterno, $Apellido_materno, $sexo, $n_cuadrillas,
                                        $n_contrato, $r_empresa, $n_empresa, $n_labor_vigencia]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Colaborador WHERE id = ?");
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
            $data = Conexion::conectar()->prepare("SELECT * FROM Colaborador WHERE id = ?");
            $data->execute([$id]);
            $results = $data->fetchObject();

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function update($id, $r_trabajador, $nombres, $Apellido_paterno, $Apellido_materno, $Fecha_Nacimiento, $sexo, $n_cuadrillas, $n_contrato, $n_labor_vigencia )
    {
        try {
            $n_trabajador = $nombres.' '.$Apellido_paterno.' '.$Apellido_materno;
            $data = Conexion::conectar()->prepare("UPDATE Colaborador SET r_trabajador = ?, n_trabajador = ?, 
                                                    Fecha_Nacimiento = ?, nombres = ?, Apellido_paterno = ?, Apellido_materno = ?, 
                                                    sexo = ?, n_cuadrillas = ?, n_contrato = ?, n_labor_vigencia = ? WHERE id = ? ");
            $results = $data->execute([$r_trabajador, $n_trabajador, $Fecha_Nacimiento, $nombres, $Apellido_paterno, $Apellido_materno, $sexo, $n_cuadrillas,
                                        $n_contrato, $n_labor_vigencia, $id]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $data = Conexion::conectar()->prepare("DELETE FROM Colaborador WHERE id = ?");
            $results = $data->execute([$id]);
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }
}
