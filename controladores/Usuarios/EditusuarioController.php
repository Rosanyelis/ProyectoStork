<?php

require_once("../../modelos/UsuariosModel.php");

# Eliminamos los espacios del principio y final del dato
$id   = trim($_REQUEST['id']);

$instancia = new Usuarios();
$data = $instancia->edit($id);




return $data;