<?php

require_once("../../modelos/CentroCostosModel.php");

# Convertimos en mayusculas los datos recibidos en caso de ser texto
# Eliminamos los espacios del principio y final del dato
$id                 = trim($_REQUEST['id']);
$idcc               = trim($_REQUEST['idcc']);
$nombre             = strtoupper(trim($_REQUEST['nombre']));
$area_cc            = trim($_REQUEST['area_cc']);
$cantidad_hilera    = trim($_REQUEST['cantidad_hilera']);
$cantidad_calle     = trim($_REQUEST['cantidad_calle']);
$nombre_especie     = strtoupper(trim($_REQUEST['nombre_especie']));
$nombre_variedad    = strtoupper(trim($_REQUEST['nombre_variedad']));
$nombre_combinacion = strtoupper(trim($_REQUEST['nombre_combinacion']));

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new CentroCostos();
$result = $instacia->update($id, $idcc, $nombre, $area_cc, $cantidad_hilera, $cantidad_calle, $nombre_especie, $nombre_variedad, $nombre_combinacion);

if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('update', 'true');        
        window.location='../../vistas/admin/centrocostos/centrocostos.php?id=".$id."&idcc=".$idcc."'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/admin/centrocostos/centrocostos.php?id=".$id."&idcc=".$idcc."';  
    </script>";
}


