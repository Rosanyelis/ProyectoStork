<?php

require_once("../../modelos/CamposModel.php");

# Convertimos en mayusculas los datos recibidos en caso de ser texto
# Eliminamos los espacios del principio y final del dato
$nombre         = strtoupper(trim($_REQUEST['nombre']));
$area_total     = strtoupper(trim($_REQUEST['area_total']));
$cantidad_cc    = strtoupper(trim($_REQUEST['cantidad_cc']));
$promedio_cc    = strtoupper(trim($_REQUEST['promedio_cc']));

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new Campos();
$result = $instacia->create($nombre, $area_total, $cantidad_cc, $promedio_cc);
# Validamos el resultado y guardamos un dato en el localstorage
# o memoria del navegador para generar el mensaje de creación exitosa
if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/admin/campos/campos.php'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/admin/campos/campos.php'; 
    </script>";
}


