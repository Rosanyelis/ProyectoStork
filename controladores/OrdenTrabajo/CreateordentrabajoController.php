<?php

require_once("../../modelos/OrdenTrabajoModel.php");

# Convertimos en mayusculas los datos recibidos en caso de ser texto
# Eliminamos los espacios del principio y final del dato
$nOT                = trim($_REQUEST['nOT']);
$rut                = strtoupper(trim($_REQUEST['rut']));
$responsable        = strtoupper(trim($_REQUEST['responsable']));
$nota               = strtoupper(trim($_REQUEST['nota']));
$estado_fen         = strtoupper(trim($_REQUEST['estado_fen']));
$mojamiento         = strtoupper(trim($_REQUEST['mojamiento']));
$VolMinBoq          = strtoupper(trim($_REQUEST['volminboquillas']));
$VeloSug            = strtoupper(trim($_REQUEST['VeloSugerido']));
$Ef                 = strtoupper(trim($_REQUEST['Ef']));
$HilerasEst         = strtoupper(trim($_REQUEST['HilerasEstimadas']));
$lotesProductos     = $_REQUEST['lotenew'];

# Instaciamos la funcion de la clase factura para insertar datos
$instacia = new OrdenTrabajo();
$result = $instacia->create($nOT, $rut, $responsable, $nota, $estado_fen, $mojamiento, $VolMinBoq, $VeloSug, $Ef, $HilerasEst, $lotesProductos);

# Validamos el resultado y guardamos un dato en el localstorage
# o memoria del navegador para generar el mensaje de creación exitosa
if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/admin/orden-trabajo/orden-trabajo.php'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/admin/orden-trabajo/orden-trabajo.php'; 
    </script>";
}