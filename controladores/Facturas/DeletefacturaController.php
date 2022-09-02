<?php

require_once("../../modelos/FacturaModel.php");

# Eliminamos los espacios del principio y final del dato
$id   = trim($_REQUEST['id']);

$instancia = new Factura();
$result = $instancia->delete($id);

if ($result) {
    echo 
    "<script> 
        localStorage.setItem('delete', 'true');        
        window.location='../../vistas/facturas/facturas.php'; 
    </script>";
}