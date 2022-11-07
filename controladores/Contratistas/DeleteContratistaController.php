<?php

require_once("../../modelos/ContratistasModel.php");

# Eliminamos los espacios del principio y final del dato
$id   = trim($_REQUEST['id']);
# Instancio la funcion de eliminar registro
$instancia = new Contratista();
$result = $instancia->delete($id);

if ($result) {
    echo 
    "<script> 
        localStorage.setItem('delete', 'true');        
        window.location='../../vistas/admin/contratistas/contratista.php';
    </script>";
}