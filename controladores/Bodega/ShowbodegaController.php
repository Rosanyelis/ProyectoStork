<?php

require_once("../../../modelos/BodegaModel.php");

# Eliminamos los espacios del principio y final del dato
$id   = trim($_REQUEST['id']);
# instanciamos la funcion de ver registro
$instancia = new Bodega();
$data = $instancia->show($id);
# retornamos los datos del registro
return $data;