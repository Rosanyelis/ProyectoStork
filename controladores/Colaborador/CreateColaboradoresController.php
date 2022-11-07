<?php

require_once("../../modelos/ColaboradoresModel.php");

# Convertimos en mayusculas los datos recibidos en caso de ser texto
# Eliminamos los espacios del principio y final del dato
$r_trabajador           = strtoupper(trim($_REQUEST['r_trabajador']));
$nombres                = strtoupper(trim($_REQUEST['nombres']));
$Apellido_paterno       = strtoupper(trim($_REQUEST['Apellido_paterno']));
$Apellido_materno       = strtoupper(trim($_REQUEST['Apellido_materno']));
$Fecha_Nacimiento       = date("Y-m-d", strtotime($_REQUEST['Fecha_Nacimiento']));
$sexo                   = strtoupper(trim($_REQUEST['sexo']));
$n_cuadrillas           = strtoupper(trim($_REQUEST['n_cuadrilla']));
$n_contrato             = strtoupper(trim($_REQUEST['contrato']));
$n_labor_vigencia       = strtoupper(trim($_REQUEST['n_labor_vigencia']));

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new Colaboradores();
$result = $instacia->create($r_trabajador, $nombres, $Apellido_paterno, $Apellido_materno, $Fecha_Nacimiento, $sexo, $n_cuadrillas, $n_contrato, $n_labor_vigencia);
# Validamos el resultado y guardamos un dato en el localstorage
# o memoria del navegador para generar el mensaje de creación exitosa
if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/admin/colaborador/colaborador.php'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/admin/colaborador/colaborador.php'; 
    </script>";
}