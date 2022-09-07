<?php

require_once("../../modelos/PresupuestoModel.php");

# Eliminamos los espacios del principio y final del dato
$campo  = trim($_REQUEST['campo']);
# instancia el proceso de busqueda 
$instancia = new Prespuesto();
$data = $instancia->searchCentroCostos($campo);
# retorna los datos
return $data;