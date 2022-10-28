<?php

require_once("../../modelos/OrdenTrabajoModel.php");

# instancia el proceso de busqueda 
$instancia = new OrdenTrabajo();
$data = $instancia->searchColaborador();
# retorna los datos
return $data;