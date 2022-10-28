<?php

include_once("ConexionModel.php");

class Productos
{
    public function Editarproducto($id)
    {
        try {
            # Consultar orden de trabajo a capturar seleccionada
            $consulta1 = Conexion::conectar()->prepare("SELECT * FROM Presupuesto WHERE id_presupuesto = ?");
            $consulta1->execute([$id]);
            $ejecucion = $consulta1->fetchObject();

            # Consultar campo a capturar seleccionada
            $consulta2 = Conexion::conectar()->prepare("SELECT id_Grupo as grupo_id FROM Labor WHERE nombre = '$ejecucion->labor
            '");
            $consulta2->execute();
            $labor = $consulta2->fetchObject();

            # Consultar campo a capturar seleccionada
            $consulta3 = Conexion::conectar()->prepare("SELECT * FROM Grupo WHERE id_Grupo = ?");
            $consulta3->execute([$labor->grupo_id]);
            $grupo = $consulta3->fetchObject();

            # Obtener maquinaria de orden
            $consulta5 = Conexion::conectar()->prepare("SELECT * FROM ProductoEjecucion WHERE id_ejecucion = ?");
            $consulta5->execute([$id]);
            $productosEjecucion = $consulta5->fetchAll(PDO::FETCH_OBJ);

            # Obtener Estados Fenealogicos
            $nombre = trim($grupo->nombre);
            $consulta5 = Conexion::conectar()->prepare("SELECT * FROM item WHERE n_familia = '$nombre'");
            $consulta5->execute();
            $consultaProductos = $consulta5->fetchAll(PDO::FETCH_OBJ);

            $results = compact('ejecucion', 'labor', 'productosEjecucion', 'consultaProductos');
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function guardar($id, $loteProductos)
    {
        try {
            # Decodificamos el array de productos
            $productos = json_decode($loteProductos, True);
            $valorProd =0;
            foreach ($productos as $key) {
                $nombre = $key['nombre'];
                $unidad = $key['unidad'];
                $valor_unidad = $key['valor_unidad'];
                $cantidad = $key['cantidad'];
                $valor_final = $key['valor_final'];

                # Ahora creamos los lotes de productos
                $lotes  = Conexion::conectar()->prepare("INSERT INTO ProductoEjecucion (id_ejecucion, nombre, unidad, valorUnidad, cantidad, valorFinal) VALUES (?, ?, ?, ?, ?, ?)");
                $results = $lotes->execute([$id, $nombre, $unidad, $valor_unidad, $cantidad, $valor_final]);

                $val =  $key['valor_final'];
                $valorProd = $valorProd + $val;
            }

            $data1 = Conexion::conectar()->prepare("UPDATE Presupuesto SET valorProductoEjecucion = ? WHERE id_presupuesto = ? ");
            $ejecutar = $data1->execute([$valorProd, $id]);
            
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $data = Conexion::conectar()->prepare("DELETE FROM ProductoEjecucion WHERE id_prodEje = ?");
            $results = $data->execute([$id]);

            // $data2 = Conexion::conectar()->prepare("DELETE FROM ProductoEjecucion WHERE id_prodEje = ?");
            // $results2 = $data2->execute([$id]);

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