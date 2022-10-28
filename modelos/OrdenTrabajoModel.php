<?php

include_once("ConexionModel.php");

class OrdenTrabajo
{
    
    public function listar()
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Presupuesto WHERE estatus = 'Por Confirmar' OR estatus = 'Aprobada' OR estatus = 'En Ejecucion'");
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }
    public function listarJefeCampo()
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Presupuesto WHERE estatus = 'Aprobada' OR estatus = 'En Ejecucion'");
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function aprobarOrden($id)
    {
        try {

            $d = new DateTime();
            $fecha = $d->format('Y-m-d');

            $data = Conexion::conectar()
                            ->prepare("UPDATE Presupuesto 
                                        SET estatus = 'Aprobada', fechaAprobacion = ?  
                                        WHERE id_presupuesto = ? 
                                    ");
            $results = $data->execute([$fecha, $id]);
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function verOrden($id)
    {
        try {
            # Consultar orden de trabajo a capturar seleccionada
            $consulta1 = Conexion::conectar()->prepare("SELECT * FROM Presupuesto WHERE id_presupuesto = ? AND estatus = 'Aprobada' OR estatus = 'En Ejecucion'");
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
            $consulta6 = Conexion::conectar()->prepare("SELECT * FROM HerramientaEjecucion WHERE id_ejecucion = ? ");
            $consulta6->execute([$id]);
            $maquinaria = $consulta6->fetchAll(PDO::FETCH_OBJ);

            # Obtener maquinaria de orden
            $consulta7 = Conexion::conectar()->prepare("SELECT * FROM ProductoEjecucion WHERE id_ejecucion = ?");
            $consulta7->execute([$id]);
            $productosEje = $consulta7->fetchAll(PDO::FETCH_OBJ);

            # lista maquinarias
            $consulta11 = Conexion::conectar()->prepare("SELECT * FROM Campo WHERE nombre = '$orden->campo'");
            $consulta11->execute();
            $campo = $consulta11->fetchObject();

            # lista maquinarias
            $consulta8 = Conexion::conectar()->prepare("SELECT * FROM maquinaria WHERE campo_id = '$campo->id_Campo' OR campo_id = NULL");
            $consulta8->execute();
            $tipoMaquinaria = $consulta8->fetchAll(PDO::FETCH_OBJ);
 
            # Lista implementos
            $consulta9 = Conexion::conectar()->prepare("SELECT * FROM implementos WHERE campo_id = '$campo->id_Campo'");
            $consulta9->execute();
            $implementos = $consulta9->fetchAll(PDO::FETCH_OBJ);

            # Lista implementos
            $consulta10 = Conexion::conectar()->prepare("SELECT * FROM Usuarios WHERE rol = 'Jefe de Campo'");
            $consulta10->execute();
            $responsable = $consulta10->fetchObject();

            $c = Conexion::conectar()->prepare("SELECT SUM(CAST(hileras_trabajadas AS int)) as total FROM laborEjecucion WHERE id_presupuesto = ?");
            $c->execute([$id]);
            $record = $c->fetchObject();
            if($record != NULL){
                $total = $record->total;
            }else{
                $total = 0;
            }
                

            $results = compact('orden', 'centrocosto', 'labor', 'areaAplicacion', 'estadoFenealogico', 
                                'maquinaria', 'productosEje', 'tipoMaquinaria', 'implementos', 'responsable', 'total');
            return $results;


        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function create($id, $nota, $estado_fen, $hileras_totales, $hileras_trabajadas, 
                            $tipo_personal, $cantidad_personal, $lotesProductos, $lotesPersonal)
    {
        try {
            date_default_timezone_set('America/Santiago');
            $d = new DateTime();
            $fecha = $d->format('Y-m-d');
            // $fecha = '2022-06-12';

            # verificar fecha actual con el ingreso del nuevo registro
            $evaluar = Conexion::conectar()->prepare("SELECT MAX(fecha) as fecha FROM laborEjecucion WHERE id_presupuesto = ?");
            $evaluar->execute([$id]);
            $registro = $evaluar->fetchObject();
            $fechaMax = $registro->fecha;

            if ($fecha > $fechaMax) {

                # creo una orden de trabajo
                $data = Conexion::conectar()
                                    ->prepare("INSERT INTO laborEjecucion (id_presupuesto, fecha, hileras_totales, hileras_trabajadas, 
                                                    notas_responsable, tipo_personal, cantidad_personal ) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?)");
                $results = $data->execute([$id, $fecha, $hileras_totales, $hileras_trabajadas, $nota, $tipo_personal, $cantidad_personal]);

                # Decodificamos el array de productos
                $productos = json_decode($lotesProductos, True);

                foreach ($productos as $key) {
                    $descripcionProducto = $key['descripcionProducto'];
                    $unidad = $key['unidad'];
                    $disolucion = $key['disolucion'];
                    $totalProd = $key['totalProd'];
                    $dosis = $key['dosis'];
                    $saldoStock = $key['saldoStock'];
                    $mojamiento = $key['mojamiento'];
                    $VolMinBoquillas = $key['VolMinBoquillas'];
                    $VeloSugerido = $key['VeloSugerido'];
                    $Ef = $key['Ef'];
                    $HilerasEstimadas = $key['HilerasEstimadas'];

                    # Ahora creamos los lotes de productos
                    $lotes  = Conexion::conectar()
                                        ->prepare("INSERT INTO productosLaborEjecucion (id_ejecucion, fecha, descripcionProducto, unidad, disolucion, 
                                                                                totalProd, dosis, saldoStock, mojamiento, volmin_boquillas, 
                                                                                velo_sugerido, ef, hileras_estimadas) 
                                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $procesar = $lotes->execute([$id, $fecha, $descripcionProducto, $unidad, $disolucion, $totalProd, $dosis, 
                                                $saldoStock, $mojamiento, $VolMinBoquillas, $VeloSugerido, $Ef, $HilerasEstimadas]);
                }

                # Decodificamos el array de personal
                $personal = json_decode($lotesPersonal, True);

                foreach ($personal as $key) {
                    $rut = $key['Personal'];
                    $tipo_jornada = $key['tipo_jornada'];
                    $horario = $key['horario'];
                    $maquinaria = $key['Maquinaria'];
                    $implemento = $key['Implemento'];
                    $mojamientom = $key['mojamientom'];
                    $litraje = $key['Litraje'];

                    # Ahora creamos los lotes de productos
                    $lotes  = Conexion::conectar()
                                        ->prepare("INSERT INTO personal_maquinaria (id_ejecucion, fecha, rut_personal, tipo_jornada, horario, 
                                                                                    maquinaria, implemento, mojamiento, litraje) 
                                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $procesar = $lotes->execute([$id, $fecha, $rut, $tipo_jornada, $horario, $maquinaria, $implemento, $mojamientom, $litraje]);
                }

                # consultamos para sumar las hileras trabajadas e indicar el porcentaje de evolucion
                # consultamos el total de hileras
                $resp = Conexion::conectar()->prepare("SELECT cantidadHileraTotal as hilera, estatus, valorFinalPersonal, ValorHerramientaEjecucion, valorProductoEjecucion FROM Presupuesto WHERE id_presupuesto = ?");
                $resp->execute([$id]);
                $record = $resp->fetchObject();
                $hilera = $record->hilera;
                $estatusPresupuesto = $record->estatus;
                $valorPersonas = $record->valorFinalPersonal;
                $valorHerramientas = $record->ValorHerramientaEjecucion;
                $valorProductos = $record->valorProductoEjecucion;

                #Calculamos valor final de labor en ejecucion
                $valorEjecucion = $valorPersonas + $valorHerramientas + $valorProductos;
                
                # Sumamos las hileras trabajadas
                $resp = Conexion::conectar()->prepare("SELECT SUM(CAST(hileras_trabajadas AS int)) as total FROM laborEjecucion WHERE id_presupuesto = ?");
                $resp->execute([$id]);
                $record = $resp->fetchObject();
                $total = $record->total;

                # Calculamos el porcentaje
                $calculo = ($total * 100) / $hilera;
                $porcentaje = number_format($calculo);

                # Validamos el estado en el que se encuentra el presupuesto para definir su estatus, su fecha de inicio de ejecucion, 
                # y su porcentaje de completado
                if ($estatusPresupuesto != 'En Ejecucion') {
                    if (!$estado_fen) {
                        $data = Conexion::conectar()->prepare("UPDATE Presupuesto SET valorFinalEjecucion = ?, estatus = 'En Ejecucion', fechaInicioEjecucion = ?, porcentaje_completado = ? WHERE id_presupuesto = ? ");
                        $results = $data->execute([$valorEjecucion, $fecha, $porcentaje, $id]);
                    }
    
                    if ($estado_fen) {
                        $data = Conexion::conectar()->prepare("UPDATE Presupuesto SET valorFinalEjecucion = ?, estado_fenealogico = ?, estatus = 'En Ejecucion', fechaInicioEjecucion = ?, porcentaje_completado = ? WHERE id_presupuesto = ? ");
                        $results = $data->execute([$valorEjecucion, $estado_fen, $fecha, $porcentaje, $id]);
                    }
                }

                if ($estatusPresupuesto == 'En Ejecucion') {
                    $data = Conexion::conectar()->prepare("UPDATE Presupuesto SET valorFinalEjecucion = ?, porcentaje_completado = ? WHERE id_presupuesto = ? ");
                    $results = $data->execute([$valorEjecucion, $porcentaje, $id]);
                }
                

                return $results;

                
            }else{
                echo 'Error Fecha';
            }
            
        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function verRegistroActividades($id)
    {
        try {
            # Consultar orden de trabajo a capturar seleccionada
            $consulta1 = Conexion::conectar()->prepare("SELECT * FROM Presupuesto WHERE id_presupuesto = ? AND estatus = 'En Ejecucion'");
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

            # lista labor ejecucion
            $consulta5 = Conexion::conectar()->prepare("SELECT * FROM LaborEjecucion WHERE id_presupuesto = ?");
            $consulta5->execute([$id]);
            $laborEjecucion = $consulta5->fetchObject();


            # lista personal
            $consulta9 = Conexion::conectar()->prepare("SELECT * FROM personal_maquinaria  WHERE id_ejecucion = ?");
            $consulta9->execute([$id]);
            $personal_maquinaria = $consulta9->fetchAll(PDO::FETCH_OBJ);

            # lista personal
            $consulta10 = Conexion::conectar()->prepare("SELECT * FROM productosLaborEjecucion  WHERE id_ejecucion = ?");
            $consulta10->execute([$id]);
            $productos = $consulta10->fetchAll(PDO::FETCH_OBJ);

            # Lista implementos
            $consulta10 = Conexion::conectar()->prepare("SELECT * FROM Usuarios WHERE rol = 'Jefe de Campo'");
            $consulta10->execute();
            $responsable = $consulta10->fetchObject();

            $results = compact('orden', 'centrocosto', 'labor', 'areaAplicacion', 'laborEjecucion', 
            'personal_maquinaria', 'productos', 'responsable');
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
                    if ($data['ValorItem'] == NULL) {
                        $valor = 0;
                    }else{
                        $valor =$data['ValorItem'];
                    }
                    $datos['data'] = [
                        'descripcion' => $data['n_item'],
                        'codItem' => $data['c_item'],
                        'unidadItem' => $data['n_unidad'],
                        'valor' => $valor
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

    public function searchColaborador()
    {
        try {
            $datos['data'] = [];
            $info = Conexion::conectar()->prepare("SELECT * FROM Colaborador");
            $procesar = $info->execute();
            if ($procesar) {
                $cadena="<option>Seleccione el Trabajador</option>";
                while ($data = $info->fetch(PDO::FETCH_ASSOC)) {
                    $datos['data'] = $cadena=$cadena.'<option value='.$data['r_trabajador'].'>'.$data['r_trabajador']. ' - ' .$data['n_trabajador'].'</option>';
                }
           
                $results = json_encode($datos);
                echo $results;
            }
            
        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function searchContratista()
    {
        try {
            $datos['data'] = [];
            $info = Conexion::conectar()->prepare("SELECT * FROM Contratistas");
            $procesar = $info->execute();
            if ($procesar) {
                $cadena="<option>Seleccione la Entidad</option>";
                while ($data = $info->fetch(PDO::FETCH_ASSOC)) {
                    $entidad = $data['Nombre_Entidad'].' - '.$data['Sucursal'];
                    $datos['data'] = $cadena=$cadena."<option>".$entidad."</option>";
                }
           
                $results = json_encode($datos);
                echo $results;
            }
            
        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }
    public function searchTratos()
    {
        try {
            $datos['data'] = [];
            $info = Conexion::conectar()->prepare("SELECT * FROM Tratos");
            $procesar = $info->execute();
            if ($procesar) {
                $cadena="<option>Seleccione el Trato</option>";
                while ($data = $info->fetch(PDO::FETCH_ASSOC)) {
                    $title = $data['referenca'].' - '.$data['Trato'];
                    $datos['data'] = $cadena=$cadena."<option>".$title."</option>";
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
