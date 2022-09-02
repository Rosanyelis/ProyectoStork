<?php

require_once("../../modelos/UsuariosModel.php");

# Eliminamos los espacios del principio y final del dato
$id   = trim($_REQUEST['id']);

$instancia = new Usuarios();
$result = $instancia->delete($id);

if ($result) {
    echo 
    "<script> 
        localStorage.setItem('delete', 'true');        
        window.location='../../vistas/usuarios/usuario.php'; 
    </script>";
}