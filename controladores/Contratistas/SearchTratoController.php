<?php

require_once("../../modelos/ContratistasModel.php");

# Eliminamos los espacios del principio y final del dato
$trato  = trim($_REQUEST['trato']);
# instancia el proceso de busqueda 
$instancia = new Contratista();
$data = $instancia->SearchTrato($trato);
# retorna los datos
return $data;