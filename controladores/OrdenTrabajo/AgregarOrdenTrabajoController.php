<?php

require_once("../../modelos/OrdenTrabajoModel.php");

# Convertimos en mayusculas los datos recibidos en caso de ser texto
# Eliminamos los espacios del principio y final del dato
$id                     = trim($_REQUEST['id']);
$nota                   = strtoupper(trim($_REQUEST['nota']));
if (!$_REQUEST['estado_fen']) {
    $estado_fen = Null;
}else{
    $estado_fen             = strtoupper(trim($_REQUEST['estado_fen']));
}

$hileras_totales        = strtoupper(trim($_REQUEST['hileras_totales']));
$hileras_trabajadas     = strtoupper(trim($_REQUEST['hileras_trabajadas']));

$tipo_personal          = strtoupper(trim($_REQUEST['tipo_personal']));
$cantidad_personal      = strtoupper(trim($_REQUEST['cantidad_personal']));

$lotesProductos         = $_REQUEST['lotenew'];
$lotesPersonal          = $_REQUEST['personal'];

# Instaciamos la funcion de la clase factura para insertar datos
$instacia = new OrdenTrabajo();
$result = $instacia->create($id, $nota, $estado_fen, $hileras_totales, $hileras_trabajadas, 
                            $tipo_personal, $cantidad_personal, $lotesProductos, $lotesPersonal);

# Validamos el resultado y guardamos un dato en el localstorage
# o memoria del navegador para generar el mensaje de creación exitosa
// echo $result;
if ($result === 1) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/admin/orden-trabajo/orden-trabajo.php'; 
    </script>";
}else if ($result == 'Error Fecha') {
    echo 
    "<script> 
        localStorage.setItem('errorFecha', 'true');        
        window.location='../../vistas/admin/orden-trabajo/orden-trabajo.php'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/admin/orden-trabajo/orden-trabajo.php'; 
    </script>";
}