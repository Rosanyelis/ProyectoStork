<?php

require_once("../../modelos/FacturaModel.php");

# Eliminamos los espacios del principio y final del dato
$id  = trim($_REQUEST['id']);

$instancia = new Factura();
$data = $instancia->show($id);

return $data;