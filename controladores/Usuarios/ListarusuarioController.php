<?php


require_once("../../modelos/UsuariosModel.php");


$instacia = new Usuarios();
$data = $instacia->listar();

return $data;