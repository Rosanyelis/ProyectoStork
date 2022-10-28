<?php

require_once("../../modelos/BodegaModel.php");


# Eliminamos los espacios del principio y final del dato
$id                 = trim($_REQUEST['id']);
$codigoProducto     = trim($_REQUEST['CodigoProducto']);
$descripcion        = trim($_REQUEST['descripcion']);
$medida             = trim($_REQUEST['medida']);
$stock              = trim($_REQUEST['stock']);
$Familia            = trim($_REQUEST['Familia']);
$SubFamilia         = trim($_REQUEST['SubFamilia']);
$Tipo               = trim($_REQUEST['Tipo']);
$preciocomprau      = trim($_REQUEST['preciocompra_unidad']);
$preciocomprat      = trim($_REQUEST['preciocompra_total']);
$preciovalorp       = trim($_REQUEST['preciovalor_p']);
$preciocostor       = trim($_REQUEST['preciocosto_r']);

# Instaciamos la funcion de la clase campos para actualizar datos
$instacia = new Bodega();
$result = $instacia->update($id, $codigoProducto, $descripcion, $medida, $stock, $Familia, $SubFamilia, $Tipo, $preciocomprau, $preciocomprat, $preciovalorp, $preciocostor);
# valida el proceso de actualizacion 
if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('update', 'true');        
        window.location='../../vistas/admin/bodega/bodega.php'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/admin/bodega/bodega.php'; 
    </script>";
}


