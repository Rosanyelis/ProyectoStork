<?php

require_once("../../modelos/BodegaModel.php");

# Eliminamos los espacios del principio y final del dato
$id   = trim($_REQUEST['id']);
# Instanciamos la funcion de edicion de la clase
$instancia = new Bodega();
$data = $instancia->edit($id);
# retorna los datos del registro segun su id
return $data;