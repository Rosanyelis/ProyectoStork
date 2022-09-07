<?php
include "../../modelos/conn.php";

$fechaInicio = $_POST['fechaInicio'];
$fechaTermino = $_POST['fechaTermino'];
$fechaActual = $_POST['fechaActual'];
$campo = $_POST['Ncampo'];
var_dump($campo);
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

$sql1 = "INSERT INTO Presupuesto (fechaInicio, fechaTermino, fechaIngreso, campo, centroCosto, labor, lugarAplicacion,
 cantidadHileraTotal, cantidadArbolesTotal, CantidadMetrosHileraTotal, cantidadPersona, precioPersona, valorFinalHerramienta,
 valorFinalProducto, valorFinalPersonal, valorFinal)
 VALUES 
 ('$fechaInicio', '$fechaTermino', '$fechaActual', '$campo', '$centroCosto', '$labor', '$lugarAplicacion', 
 '$cantidadHileraTotal', '$cantidadArbolesTotal', '$CantidadMetrosHileraTotal', '$cantidadPersona', '$precioPersona',
 '$valorFinalHerramienta', '$valorFinalProducto', '$valorFinalPersonal', '$valorFinal')";
$insertar = sqlsrv_prepare($conn, $sql1); 
$ejecutar = sqlsrv_execute($insertar);

// obtengo el id del registro recien insertado en entrada_productos
$query = "SELECT * FROM Presupuesto WHERE labor ='$labor' and valorFinalPersonal ='$valorFinalPersonal' and valorFinalHerramienta ='$valorFinalHerramienta' AND valorFinalProducto ='$valorFinalProducto' AND valorFinal ='$valorFinal'";
$respuesta = sqlsrv_query($conn, $query);
$fila = sqlsrv_fetch_array($respuesta, SQLSRV_FETCH_ASSOC);
$id = $fila['id_presupuesto'];
var_dump($id);

//insert ejecucion
$estado = 'orden';

$sql5 = "INSERT INTO Ejecucion (id_ejecucion,fechaInicio, fechaTermino, fechaIngreso, campo, centroCosto, labor, lugarAplicacion,
 cantidadHileraTotal, cantidadArbolesTotal, CantidadMetrosHileraTotal, cantidadPersona, precioPersona, valorFinalHerramienta,
 valorFinalProducto, valorFinalPersonal, valorFinal , estado)
 VALUES 
 ('$id','$fechaInicio', '$fechaTermino', '$fechaActual', '$campo', '$centroCosto', '$labor', '$lugarAplicacion', 
 '$cantidadHileraTotal', '$cantidadArbolesTotal', '$CantidadMetrosHileraTotal', '$cantidadPersona', '$precioPersona',
 '$valorFinalHerramienta', '$valorFinalProducto', '$valorFinalPersonal', '$valorFinal' ,'$estado')";
$insertar5 = sqlsrv_prepare($conn, $sql5); 
$ejecutar2 = sqlsrv_execute($insertar5);

$dataProductos = json_decode($loteProductoNew, True);

// luego recorremos el array de lotes de productos
foreach ($dataProductos as $key) {

    $nombre= $key['nombre'];
    $unidad = $key['unidad'];
    $valor_unidad = $key['valor_unidad'];
    $cantidad = $key['cantidad'];
    $valor_final = $key['valor_final'];

    // Insertamos el lote de productosPresupuesto
    $sqlInsertLoteProductos = "INSERT INTO ProductoPresupuesto (id_presupuesto, nombre, unidad, valorUnidad, cantidad, valorFinal) VALUES ('$id', '$nombre', '$unidad', '$valor_unidad', '$cantidad', '$valor_final')";
    $insertarLoteProductos = sqlsrv_prepare($conn, $sqlInsertLoteProductos);
    $ejecutarLoteProductos = sqlsrv_execute($insertarLoteProductos);

     // Insertamos el lote de productosEjecucion
     $sqlInsertLoteProductos1 = "INSERT INTO ProductoEjecucion (id_ejecucion, nombre, unidad, valorUnidad, cantidad, valorFinal) VALUES ('$id', '$nombre', '$unidad', '$valor_unidad', '$cantidad', '$valor_final')";
     $insertarLoteProductos1 = sqlsrv_prepare($conn, $sqlInsertLoteProductos1);
     $ejecutarLoteProductos1 = sqlsrv_execute($insertarLoteProductos1);
}



$dataHerramienta = json_decode($loteHerramientasNew, True);

// luego recorremos el array de lotes de Herramienta
foreach ($dataHerramienta as $key) {

    $maquinaria= $key['maquinaria'];
    $implemento = $key['implemento'];
    $km = $key['km'];
    $valor = $key['valor'];
    $valorTotal = $key['valorTotal'];

    // Insertamos el lote de productos presupuesto
    $sqlInsertLoteHerramienta= "INSERT INTO HerramientaPresupuesto (id_presupuesto, maquinaria, implemento, kmH, valor, valorFinal) VALUES ('$id', '$maquinaria', '$implemento', '$km', '$valor', '$valorTotal')";
    $insertarLoteHerramienta= sqlsrv_prepare($conn, $sqlInsertLoteHerramienta);
    $ejecutarLoteHerramienta = sqlsrv_execute($insertarLoteHerramienta);

     // Insertamos el lote de productos ejecucion
     $sqlInsertLoteHerramienta1= "INSERT INTO HerramientaEjecucion (id_ejecucion, maquinaria, implemento, kmH, valor, valorFinal) VALUES ('$id', '$maquinaria', '$implemento', '$km', '$valor', '$valorTotal')";
     $insertarLoteHerramienta1= sqlsrv_prepare($conn, $sqlInsertLoteHerramienta1);
     $ejecutarLoteHerramienta1 = sqlsrv_execute($insertarLoteHerramienta1);
}
?>