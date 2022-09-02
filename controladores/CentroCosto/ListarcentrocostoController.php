<?php


require_once("../../modelos/CentroCostosModel.php");

# Obtenemos el id de la url
$id         = $_REQUEST['id'];

$instancia = new CentroCostos();
$data = $instancia->listar($id);

return $data;