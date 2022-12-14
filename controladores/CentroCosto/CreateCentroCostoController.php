<?php

require_once("../../modelos/CentroCostosModel.php");


# Eliminamos los espacios del principio y final del dato
$campoid            = trim($_REQUEST['id']);
$nombre             = strtoupper(trim($_REQUEST['nombre']));
$area_cc            = trim($_REQUEST['area_cc']);
$cantidad_hilera    = trim($_REQUEST['cantidad_hilera']);
$cantidad_calle     = trim($_REQUEST['cantidad_calle']);
$nombre_especie     = strtoupper(trim($_REQUEST['nombre_especie']));
$nombre_variedad    = strtoupper(trim($_REQUEST['nombre_variedad']));
$nombre_combinacion = strtoupper(trim($_REQUEST['nombre_combinacion']));

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new CentroCostos();
$result = $instacia->create($campoid, $nombre, $area_cc, $cantidad_hilera, $cantidad_calle, $nombre_especie, $nombre_variedad, $nombre_combinacion);
# Validamos el resultado y guardamos un dato en el localstorage
# o memoria del navegador para generar el mensaje de creación exitosa
if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/admin/centrocostos/centrocostos.php?id=".$campoid."'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/admin/centrocostos/centrocostos.php?id=".$campoid."';  
    </script>";
}


