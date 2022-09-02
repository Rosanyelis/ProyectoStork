<?php

require_once("../../modelos/CallesModel.php");

# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);
$idcc          = trim($_REQUEST['idcc']);
$idcalle       = trim($_REQUEST['idcalle']);

$instancia = new Calles();
$data = $instancia->edit($id, $idcc, $idcalle);

return $data;