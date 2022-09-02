<?php

require_once("../../modelos/UsuariosModel.php");


# Eliminamos los espacios del principio y final del dato
$nombre           = strtoupper(trim($_REQUEST['nombre']));
$apellido         = strtoupper(trim($_REQUEST['apellido']));
$rut              = strtoupper(trim($_REQUEST['rut']));
$campo            = strtoupper(trim($_REQUEST['campo']));
$usuario          = strtoupper(trim($_REQUEST['usuario']));
$clave            = strtoupper(trim($_REQUEST['clave']));


# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new Usuarios();
$result = $instacia->create($nombre, $apellido, $rut, $campo, $usuario, $clave);

if ($result) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/usuarios/usuario.php'; 
    </script>";
}
