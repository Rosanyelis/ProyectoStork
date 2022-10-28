<?php

require_once("../../../modelos/CentroCostosModel.php");

# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);
$idcc          = trim($_REQUEST['idcc']);
# Instanciamos la funcion de edicion de la clase
$instancia = new CentroCostos();
$data = $instancia->edit($id, $idcc);
# retorna los datos del registro segun su id
return $data;