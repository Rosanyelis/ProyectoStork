<?php

require_once("../../modelos/ContratistasModel.php");

# Convertimos en mayusculas los datos recibidos en caso de ser texto
# Eliminamos los espacios del principio y final del dato
$rut_entidad            = strtoupper(trim($_REQUEST['rut_entidad']));
$Nombre_Entidad         = strtoupper(trim($_REQUEST['Nombre_Entidad']));
$direccion              = strtoupper(trim($_REQUEST['direccion']));
$giro                   = strtoupper(trim($_REQUEST['giro']));
$sucursal               = strtoupper(trim($_REQUEST['sucursal']));
$trato                  = strtoupper(trim($_REQUEST['trato']));
$valor                  = trim($_REQUEST['valor']);

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new Contratista();
$result = $instacia->create($rut_entidad, $Nombre_Entidad, $direccion, $giro, $sucursal, $trato, $valor);
# Validamos el resultado y guardamos un dato en el localstorage
# o memoria del navegador para generar el mensaje de creación exitosa
if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/admin/contratistas/contratista.php'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/admin/contratistas/contratista.php'; 
    </script>";
}