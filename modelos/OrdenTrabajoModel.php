<?php

include_once("ConexionModel.php");

class OrdenTrabajo
{
    
    public function listar()
    {
        try {
            $estado = 'orden';
            $data = Conexion::conectar()->prepare("SELECT * FROM Ejecucion WHERE estado = ?");
            $data->execute([$estado]);
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function create($nOT, $rut, $responsable, $nota, $estado_fen, $mojamiento, $VolMinBoq, $VeloSug, $Ef, $HilerasEst, $lotesProductos)
    {
        try {
            $d = new DateTime();
            $fecha = $d->format('Y-m-d');

            # creo una orden de trabajo
            $data = Conexion::conectar()->prepare("INSERT INTO OrdenTrabajo(numOt, responsable, fecha, rut, nota, estado_fen, Mojamiento, VolMinBoq, VeloSug, Ef, HilerasEst) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $results = $data->execute([$nOT, $responsable, $fecha, $rut, $nota, $estado_fen, $mojamiento, $VolMinBoq, $VeloSug, $Ef, $HilerasEst]);

            # Decodificamos el array de productos
            $productos = json_decode($lotesProductos, True);

            foreach ($productos as $key) {
                $descripcionProducto = $key['descripcionProducto'];
                $unidad = $key['unidad'];
                $disolucion = $key['disolucion'];
                $totalProd = $key['totalProd'];
                $dosis = $key['dosis'];
                $saldoStock = $key['saldoStock'];

                # Ahora creamos los lotes de productos
                $lotes  = Conexion::conectar()->prepare("INSERT INTO LoteOrdenTrabajo (id_loteOrden, descripcionProducto, unidad, disolucion, totalProd, dosis, saldoStock) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $procesar = $lotes->execute([$nOT, $descripcionProducto, $unidad, $disolucion, $totalProd, $dosis, $saldoStock]);

                $estado = 'asignacion';
                $data = Conexion::conectar()->prepare("UPDATE Ejecucion SET estado = ? WHERE id_ejecucion = ? ");
                $results = $data->execute([$estado, $nOT]);
            }
            
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function capturar($id)
    {
        try {
            # Consultar orden de trabajo a capturar seleccionada
            $consulta1 = Conexion::conectar()->prepare("SELECT * FROM Ejecucion WHERE id_ejecucion = ?");
            $consulta1->execute([$id]);
            $orden = $consulta1->fetchObject();

            # Obtener el centro de costo
            $consulta2 = Conexion::conectar()->prepare("SELECT * FROM CentroCosto WHERE nombre = ?");
            $consulta2->execute([$orden->centroCosto]);
            $centrocosto = $consulta2->fetchObject();

            # Obtener la labor
            $consulta3 = Conexion::conectar()->prepare("SELECT * FROM Grupo_faena WHERE nombre_labor = ?");
            $consulta3->execute([$orden->labor]);
            $labor = $consulta3->fetchObject();

            # Obtener area de aplicacion
            $consulta4 = Conexion::conectar()->prepare("SELECT * FROM Area_apli WHERE CdSp = ?");
            $consulta4->execute([$orden->lugarAplicacion]);
            $areaAplicacion = $consulta4->fetchObject();

            # Obtener Estados Fenealogicos
            $consulta5 = Conexion::conectar()->prepare("SELECT * FROM Estadofeno");
            $consulta5->execute();
            $estadoFenealogico = $consulta5->fetchAll(PDO::FETCH_OBJ);

            # Obtener maquinaria de orden
            $consulta6 = Conexion::conectar()->prepare("SELECT * FROM HerramientaEjecucion WHERE id_ejecucion = ?");
            $consulta6->execute([$id]);
            $maquinaria = $consulta6->fetchAll(PDO::FETCH_OBJ);

            # Obtener maquinaria de orden
            $consulta7 = Conexion::conectar()->prepare("SELECT * FROM ProductoEjecucion WHERE id_ejecucion = ?");
            $consulta7->execute([$id]);
            $productosEje = $consulta7->fetchAll(PDO::FETCH_OBJ);


            $results = compact('orden', 'centrocosto', 'labor', 'areaAplicacion', 'estadoFenealogico', 'maquinaria', 'productosEje');
            return $results;


        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
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
                        'descripcion' => $data['n_item'],
                        'codItem' => $data['c_item'],
                        'unidadItem' => $data['n_unidad'],
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
