<?php

require_once("../../modelos/BodegaModel.php");

# Convertimos en mayusculas los datos recibidos en caso de ser texto
# Eliminamos los espacios del principio y final del dato
$codigoProducto     = strtoupper(trim($_REQUEST['CodigoProducto']));
$descripcion        = strtoupper(trim($_REQUEST['descripcion']));
$medida             = strtoupper(trim($_REQUEST['medida']));
$stock              = strtoupper(trim($_REQUEST['stock']));
$Familia            = strtoupper(trim($_REQUEST['Familia']));
$SubFamilia         = strtoupper(trim($_REQUEST['SubFamilia']));
$Tipo               = strtoupper(trim($_REQUEST['Tipo']));
$preciocomprau      = strtoupper(trim($_REQUEST['preciocompra_unidad']));
$preciocomprat      = strtoupper(trim($_REQUEST['preciocompra_total']));
$preciovalorp       = strtoupper(trim($_REQUEST['preciovalor_p']));
$preciocostor       = strtoupper(trim($_REQUEST['preciocosto_r']));


# Instanciamos la funcion de la clase bodega para insertar datos
$instacia = new Bodega();
$result = $instacia->create($codigoProducto, $descripcion, $medida, $stock, $Familia, $SubFamilia, $Tipo, $preciocomprau, $preciocomprat, $preciovalorp, $preciocostor);

# Validamos el resultado y guardamos un dato en el localstorage
# o memoria del navegador para generar el mensaje de creación exitosa

if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/bodega/bodega.php'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/bodega/bodega.php'; 
    </script>";
}


