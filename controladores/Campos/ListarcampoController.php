<?php


require_once("../../modelos/CamposModel.php");


$instacia = new Campos();
$data = $instacia->listar();

return $data;