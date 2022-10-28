<?php
include "../../../modelos/conn.php";

$id = $_GET['id'];
$fechaInicio = date("Y-m-d", strtotime($_POST['fechaInicio']));
$fechaTermino = date("Y-m-d", strtotime($_POST['fechaTermino']));
$fechaActual = date("Y-m-d", strtotime($_POST['fechaActual']));
$campo = $_POST['Ncampo'];
$centroCosto = $_POST['centroCosto'];
$labor = $_POST['labor'];
$lugarAplicacion = $_POST['lugarAplicacion'];
$cantidadHileraTotal = $_POST['cantidadHileraTotal'];
$cantidadArbolesTotal = $_POST['cantidadArbolesTotal'];
$CantidadMetrosHileraTotal = $_POST['CantidadMetrosHileraTotal'];
$cantidadPersona = $_POST['cantidadPersona'];
$precioPersona = $_POST['precioPersona'];
$valorFinalHerramienta = $_POST['valorFinalHerramienta'];
$valorFinalProducto = $_POST['valorFinalProducto'];
$valorFinalPersonal = $_POST['valorFinalPersonal'];
$valorFinal = $_POST['valorFinal'];

//lotes json
$loteProductoNew = $_POST['loteProductoNew'];
$loteHerramientasNew = $_POST['loteHerramientasNew'];


//insert prosupuesto

$sql1 = "UPDATE Presupuesto
            SET fechaInicio = '$fechaInicio'
            ,fechaTermino = '$fechaTermino'
            ,campo = '$campo'
            ,centroCosto = '$centroCosto'
            ,labor = '$labor'
            ,lugarAplicacion = '$lugarAplicacion'
            ,cantidadHileraTotal = '$cantidadHileraTotal'
            ,cantidadArbolesTotal = '$cantidadArbolesTotal'
            ,CantidadMetrosHileraTotal = '$CantidadMetrosHileraTotal'
            ,cantidadPersona = '$cantidadPersona'
            ,precioPersona = '$precioPersona'
            ,valorFinalHerramienta = '$valorFinalHerramienta'
            ,valorFinalProducto = '$valorFinalProducto'
            ,valorFinalPersonal = '$valorFinalPersonal'
            ,valorFinal = '$valorFinal'
WHERE id_presupuesto = $id";
$insertar = sqlsrv_prepare($conn, $sql1); 
$ejecutar = sqlsrv_execute($insertar);

$dataProductos = json_decode($loteProductoNew, True);

// luego recorremos el array de lotes de productos
foreach ($dataProductos as $key) {

    $nombre= $key['nombre'];
    $unidad = $key['unidad'];
    $valor_unidad = $key['valor_unidad'];
    $cantidad = $key['cantidad'];
    $valor_final = $key['valor_final'];

    $verificar = "SELECT count(*) as cuenta FROM ProductoPresupuesto WHERE id_presupuesto = $id";
    $respuesta = sqlsrv_query($conn, $verificar);
    $fila = sqlsrv_fetch_array($respuesta, SQLSRV_FETCH_ASSOC);
    $count = $fila['cuenta'];

    if ($count > 0) {
      // Insertamos el lote de productosPresupuesto
      $sqlInsertLoteProductos = "UPDATE ProductoPresupuesto
      SET nombre = '$nombre'
        ,unidad = '$unidad'
        ,valorUnidad = '$valor_unidad'
        ,cantidad = '$cantidad'
        ,valorFinal = '$valor_final'
      WHERE id_presupuesto = $id";
      $insertarLoteProductos = sqlsrv_prepare($conn, $sqlInsertLoteProductos);
      $ejecutarLoteProductos = sqlsrv_execute($insertarLoteProductos);

      // Insertamos el lote de productosEjecucion
      $sqlInsertLoteProductos1 = "UPDATE ProductoEjecucion
      SET nombre = '$nombre'
          ,unidad = '$unidad'
          ,valorUnidad = '$valor_unidad'
          ,cantidad = '$cantidad'
          ,valorFinal = '$valor_final'
      WHERE id_ejecucion = $id";
      $insertarLoteProductos1 = sqlsrv_prepare($conn, $sqlInsertLoteProductos1);
      $ejecutarLoteProductos1 = sqlsrv_execute($insertarLoteProductos1);
    }else{
      // Insertamos el lote de productosPresupuesto
      $sqlInsertLoteProductos = "INSERT INTO ProductoPresupuesto (id_presupuesto, nombre, unidad, valorUnidad, cantidad, valorFinal) VALUES ('$id', '$nombre', '$unidad', '$valor_unidad', '$cantidad', '$valor_final')";
      $insertarLoteProductos = sqlsrv_prepare($conn, $sqlInsertLoteProductos);
      $ejecutarLoteProductos = sqlsrv_execute($insertarLoteProductos);

      // Insertamos el lote de productosEjecucion
      $sqlInsertLoteProductos1 = "INSERT INTO ProductoEjecucion (id_ejecucion, nombre, unidad, valorUnidad, cantidad, valorFinal) VALUES ('$id', '$nombre', '$unidad', '$valor_unidad', '$cantidad', '$valor_final')";
      $insertarLoteProductos1 = sqlsrv_prepare($conn, $sqlInsertLoteProductos1);
      $ejecutarLoteProductos1 = sqlsrv_execute($insertarLoteProductos1);
    }
}



$dataHerramienta = json_decode($loteHerramientasNew, True);

// luego recorremos el array de lotes de Herramienta
foreach ($dataHerramienta as $key) {

    $maquinaria= $key['maquinaria'];
    $implemento = $key['implemento'];
    $km = $key['km'];
    $valor = $key['valor'];
    $valorTotal = $key['valorTotal'];

    $verificar = "SELECT count(*) as cuenta FROM HerramientaPresupuesto WHERE id_presupuesto = $id";
    $respuesta = sqlsrv_query($conn, $verificar);
    $fila = sqlsrv_fetch_array($respuesta, SQLSRV_FETCH_ASSOC);
    $count = $fila['cuenta'];

    if ($count > 0) {
      // Insertamos el lote de productos presupuesto
      $sqlInsertLoteHerramienta= "UPDATE HerramientaPresupuesto
      SET maquinaria = '$maquinaria'
        ,implemento = '$implemento'
        ,kmH = '$km'
        ,valor = '$valor'
        ,valorFinal = '$valorTotal'
      WHERE id_presupuesto = $id";
      
      $insertarLoteHerramienta= sqlsrv_prepare($conn, $sqlInsertLoteHerramienta);
      $ejecutarLoteHerramienta = sqlsrv_execute($insertarLoteHerramienta);

      // Insertamos el lote de productos ejecucion
      $sqlInsertLoteHerramienta1= "UPDATE HerramientaPresupuesto
      SET maquinaria = '$maquinaria'
        ,implemento = '$implemento'
        ,kmH = '$km'
        ,valor = '$valor'
        ,valorFinal = '$valorTotal'
      WHERE id_ejecucion = $id";
      $insertarLoteHerramienta1= sqlsrv_prepare($conn, $sqlInsertLoteHerramienta1);
      $ejecutarLoteHerramienta1 = sqlsrv_execute($insertarLoteHerramienta1);
    }else{
      // Insertamos el lote de productos presupuesto
      $sqlInsertLoteHerramienta= "INSERT INTO HerramientaPresupuesto (id_presupuesto, maquinaria, implemento, kmH, valor, valorFinal) VALUES ('$id', '$maquinaria', '$implemento', '$km', '$valor', '$valorTotal')";
      $insertarLoteHerramienta= sqlsrv_prepare($conn, $sqlInsertLoteHerramienta);
      $ejecutarLoteHerramienta = sqlsrv_execute($insertarLoteHerramienta);

      // Insertamos el lote de productos ejecucion
      $sqlInsertLoteHerramienta1= "INSERT INTO HerramientaEjecucion (id_ejecucion, maquinaria, implemento, kmH, valor, valorFinal) VALUES ('$id', '$maquinaria', '$implemento', '$km', '$valor', '$valorTotal')";
      $insertarLoteHerramienta1= sqlsrv_prepare($conn, $sqlInsertLoteHerramienta1);
      $ejecutarLoteHerramienta1 = sqlsrv_execute($insertarLoteHerramienta1);
    }
    
}
?>