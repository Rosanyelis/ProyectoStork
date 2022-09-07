<?php

require_once("../../modelos/ProductosModel.php");

# Eliminamos los espacios del principio y final del dato
$producto  = trim($_REQUEST['producto']);
# instancia el proceso de busqueda 
$instancia = new Productos();
$data = $instancia->searchItem($producto);
# retorna los datos
return $data;