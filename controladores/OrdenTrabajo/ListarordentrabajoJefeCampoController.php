<?php
# Realizo la llamada del modelo para instanciar la funcion 
# correspondiente de listado
require_once("../../../modelos/OrdenTrabajoModel.php");
# Instancio la funcion listar
$instacia = new OrdenTrabajo();
$data = $instacia->listarJefeCampo();
# Retorno los datos en la variable para usarlos en la vista
return $data;