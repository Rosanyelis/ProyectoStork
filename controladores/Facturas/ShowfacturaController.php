<?php

require_once("../../../modelos/FacturaModel.php");

# Eliminamos los espacios del principio y final del dato
$id  = trim($_REQUEST['id']);
# instancia funcion de ver datos
$instancia = new Factura();
$data = $instancia->show($id);
# retorna los datos en la variable
return $data;