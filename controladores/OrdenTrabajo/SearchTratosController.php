<?php

require_once("../../modelos/OrdenTrabajoModel.php");

# instancia el proceso de busqueda 
$instancia = new OrdenTrabajo();
$data = $instancia->searchTratos();
# retorna los datos
return $data;