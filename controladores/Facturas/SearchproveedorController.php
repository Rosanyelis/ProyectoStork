<?php

require_once("../../modelos/FacturaModel.php");

# Eliminamos los espacios del principio y final del dato
$rut   = trim($_REQUEST['rut']);

$instancia = new Factura();
$data = $instancia->searchProveedor($rut);

return $data;