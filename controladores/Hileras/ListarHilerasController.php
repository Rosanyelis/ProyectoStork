<?php


require_once("../../modelos/HilerasModel.php");

# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);
$idcc          = trim($_REQUEST['idcc']);

$instancia = new Hileras();
$data = $instancia->listar($id, $idcc);

return $data;