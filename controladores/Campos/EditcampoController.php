<?php

require_once("../../modelos/CamposModel.php");

# Eliminamos los espacios del principio y final del dato
$id   = trim($_REQUEST['id']);

$instancia = new Campos();
$data = $instancia->edit($id);

return $data;