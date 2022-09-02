<?php

require_once("../../modelos/OrdenCompraModel.php");

# Eliminamos los espacios del principio y final del dato
$id   = trim($_REQUEST['id']);

$instancia = new OrdenCompra();
$result = $instancia->delete($id);

if ($result) {
    echo 
    "<script> 
        localStorage.setItem('delete', 'true');        
        window.location='../../vistas/ordencompra/ordendecompra.php'; 
    </script>";
}