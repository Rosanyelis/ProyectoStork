<?php

require_once("../../modelos/CentroCostosModel.php");

# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);
$idcc          = trim($_REQUEST['idcc']);

$instancia = new CentroCostos();
$data = $instancia->show($id, $idcc);

return $data;