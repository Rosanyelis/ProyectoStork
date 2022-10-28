<?php

require_once("../../modelos/MaquinariaModel.php");

# Eliminamos los espacios del principio y final del dato
$id   = trim($_REQUEST['id']);
$idP   = trim($_REQUEST['idP']);
# Instancio la funcion de eliminar registro
$instancia = new Maquinaria();
$result = $instancia->delete($id);

if ($result) {
    echo 
    "<script> 
        localStorage.setItem('delete', 'true');        
        window.location='../../vistas/admin/maquinaria/editmaquinaria.php?id=".$idP."'; 
    </script>";
}