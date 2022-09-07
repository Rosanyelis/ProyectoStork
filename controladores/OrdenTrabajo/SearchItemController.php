<?php

require_once("../../modelos/OrdenTrabajoModel.php");

# Eliminamos los espacios del principio y final del dato
$producto  = trim($_REQUEST['producto']);
# instancia el proceso de busqueda 
$instancia = new OrdenTrabajo();
$data = $instancia->searchItem($producto);
# retorna los datos
return $data;