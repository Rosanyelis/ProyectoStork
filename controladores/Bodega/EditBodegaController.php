<?php

require_once("../../modelos/BodegaModel.php");

# Eliminamos los espacios del principio y final del dato
$id   = trim($_REQUEST['id']);

$instancia = new Bodega();
$data = $instancia->edit($id);

return $data;