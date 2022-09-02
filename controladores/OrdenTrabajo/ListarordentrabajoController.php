<?php


require_once("../../modelos/OrdenTrabajoModel.php");

date_default_timezone_set('America/Santiago');
setlocale(LC_TIME, 'es_ES');

$instacia = new OrdenTrabajo();
$data = $instacia->listar();

return $data;