<?php


require_once("../../modelos/FacturaModel.php");


$instacia = new Factura();
$data = $instacia->listar();

return $data;