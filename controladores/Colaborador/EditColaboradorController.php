<?php

require_once("../../../modelos/ColaboradoresModel.php");

# Eliminamos los espacios del principio y final del dato
$id  = trim($_REQUEST['id']);
# instancia funcion de ver datos
$instancia = new Colaboradores();
$data = $instancia->edit($id);
# retorna los datos en la variable
return $data;