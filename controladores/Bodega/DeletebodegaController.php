<?php

require_once("../../modelos/BodegaModel.php");

# Eliminamos los espacios del principio y final del dato
$id   = trim($_REQUEST['id']);

$instancia = new Bodega();
$result = $instancia->delete($id);

if ($result) {
    echo 
    "<script> 
        localStorage.setItem('delete', 'true');        
        window.location='../../vistas/bodega/bodega.php'; 
    </script>";
}