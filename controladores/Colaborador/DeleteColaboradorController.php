<?php

require_once("../../modelos/ColaboradoresModel.php");

# Eliminamos los espacios del principio y final del dato
$id   = trim($_REQUEST['id']);
# Instancio la funcion de eliminar registro
$instancia = new Colaboradores();
$result = $instancia->delete($id);

if ($result) {
    echo 
    "<script> 
        localStorage.setItem('delete', 'true');        
        window.location='../../vistas/admin/colaborador/colaborador.php';
    </script>";
}