<?php

require_once("../../../modelos/ContratistasModel.php");

# Eliminamos los espacios del principio y final del dato
$id  = trim($_REQUEST['id']);
# instancia funcion de ver datos
$instancia = new Contratista();
$data = $instancia->Edit($id);
# retorna los datos en la variable
return $data;