<?php

require_once("../../modelos/FacturaModel.php");


# Eliminamos los espacios del principio y final del dato
$rut                = strtoupper(trim($_REQUEST['rut']));
$proveedor          = strtoupper(trim($_REQUEST['proveedor']));
$direccion          = strtoupper(trim($_REQUEST['direccion']));
$razon_social       = strtoupper(trim($_REQUEST['razon_social']));
$telefono           = strtoupper(trim($_REQUEST['telefono']));
$monto_compra       = strtoupper(trim($_REQUEST['monto_compra']));
$lotesProductos     = $_REQUEST['loteproductos'];
$nro_factura        = rand(1, 10000000);

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new Factura();
$result = $instacia->create($rut, $proveedor, $direccion, $razon_social, $telefono, $monto_compra, $lotesProductos, $nro_factura);

// echo $result;

if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/facturas/facturas.php'; 
    </script>";
}


