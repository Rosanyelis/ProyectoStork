<?php

require_once("../../modelos/OrdenCompraModel.php");

# Eliminamos los espacios del principio y final del dato
$rut   = trim($_REQUEST['rut']);

$instancia = new OrdenCompra();
$data = $instancia->searchProveedor($rut);

return $data;