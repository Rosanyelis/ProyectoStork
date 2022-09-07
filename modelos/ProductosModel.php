<?php

include_once("ConexionModel.php");

class Productos
{
    public function Editarproducto($id)
    {
        try {
            # Consultar orden de trabajo a capturar seleccionada
            $consulta1 = Conexion::conectar()->prepare("SELECT * FROM Ejecucion WHERE id_ejecucion = ?");
            $consulta1->execute([$id]);
            $ejecucion = $consulta1->fetchObject();

            # Obtener maquinaria de orden
            $consulta5 = Conexion::conectar()->prepare("SELECT * FROM ProductoEjecucion WHERE id_ejecucion = ?");
            $consulta5->execute([$id]);
            $productosEjecucion = $consulta5->fetchAll(PDO::FETCH_OBJ);

            # Obtener Estados Fenealogicos
            $consulta5 = Conexion::conectar()->prepare("SELECT * FROM item");
            $consulta5->execute();
            $consultaProductos = $consulta5->fetchAll(PDO::FETCH_OBJ);

            $results = compact('ejecucion', 'productosEjecucion', 'consultaProductos');
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function searchItem($producto)
    {
        try {
            $datos['data'] = [];
            $info = Conexion::conectar()->prepare("SELECT * FROM item WHERE n_item = ?");
            $procesar = $info->execute([$producto]);
            if ($procesar) {
                while ($data = $info->fetch(PDO::FETCH_ASSOC)) {
                    $datos['data'] = [
                        'unidad' => $data['n_unidad'],
                        'valor' => $data['ValorItem']
                    ];
                }
           
                $results = json_encode($datos);
                echo $results;
            }
            
        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }
}