<?php


require_once("../../modelos/OrdenCompraModel.php");


$instacia = new OrdenCompra();
$data = $instacia->listar();

return $data;