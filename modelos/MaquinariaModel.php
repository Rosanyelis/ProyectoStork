<?php

include_once("ConexionModel.php");

class Maquinaria
{
    public function EditarMaquinaria($id)
    {
        try {
            # Consultar orden de trabajo a capturar seleccionada
            $consulta1 = Conexion::conectar()->prepare("SELECT * FROM Ejecucion WHERE id_ejecucion = ?");
            $consulta1->execute([$id]);
            $ejecucion = $consulta1->fetchObject();

            # Obtener maquinaria de orden
            $consulta5 = Conexion::conectar()->prepare("SELECT * FROM HerramientaEjecucion WHERE id_ejecucion = ?");
            $consulta5->execute([$id]);
            $maquinariaEjecucion = $consulta5->fetchAll(PDO::FETCH_OBJ);

            # lista maquinarias
            $consulta6 = Conexion::conectar()->prepare("SELECT * FROM Tipo_maquinaria");
            $consulta6->execute();
            $maquinaria = $consulta6->fetchAll(PDO::FETCH_OBJ);

            # Lista implementos
            $consulta7 = Conexion::conectar()->prepare("SELECT * FROM Tipo_implemeto");
            $consulta7->execute([$id]);
            $implementos = $consulta7->fetchAll(PDO::FETCH_OBJ);

            $results = compact('ejecucion', 'maquinaria', 'implementos', 'maquinariaEjecucion');
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }
}