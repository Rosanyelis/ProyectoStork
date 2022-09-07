<?php

require_once("../../modelos/PresupuestoModel.php");

# Eliminamos los espacios del principio y final del dato
$grupo  = trim($_REQUEST['grupo']);
# instancia el proceso de busqueda 
$instancia = new Prespuesto();
$data = $instancia->searchLabor($grupo);
# retorna los datos
return $data;