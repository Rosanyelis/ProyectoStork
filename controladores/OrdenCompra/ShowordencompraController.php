<?php

require_once("../../modelos/OrdenCompraModel.php");

# Eliminamos los espacios del principio y final del dato
$id  = trim($_REQUEST['id']);

$instancia = new OrdenCompra();
$data = $instancia->show($id);

return $data;