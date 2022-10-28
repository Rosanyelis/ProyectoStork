<?php

require_once("../../../modelos/CentroCostosModel.php");

# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);
$idcc          = trim($_REQUEST['idcc']);
# instanciamos la funcion de ver registro
$instancia = new CentroCostos();
$data = $instancia->show($id, $idcc);
# retornamos los datos del registro
return $data;