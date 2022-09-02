<?php

require_once("../../modelos/HilerasModel.php");

# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);
$idcc          = trim($_REQUEST['idcc']);
$idhilera      = trim($_REQUEST['idhilera']);

$instancia = new Hileras();
$data = $instancia->edit($id, $idcc, $idhilera);

return $data;