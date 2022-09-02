<?php

require_once("../../modelos/CamposModel.php");


# Eliminamos los espacios del principio y final del dato
$nombre         = strtoupper(trim($_REQUEST['nombre']));
$area_total     = strtoupper(trim($_REQUEST['area_total']));
$cantidad_cc    = strtoupper(trim($_REQUEST['cantidad_cc']));
$promedio_cc    = strtoupper(trim($_REQUEST['promedio_cc']));

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new Campos();
$result = $instacia->create($nombre, $area_total, $cantidad_cc, $promedio_cc);

if ($result) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/campos/campos.php'; 
    </script>";
}


