<?php
# Realizo la llamada del modelo para instanciar la funcion 
# correspondiente de listado
require_once("../../../modelos/OrdenTrabajoModel.php");

# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);

# Instancio la funcion Capturar
$instacia = new OrdenTrabajo();
$data = $instacia->verRegistroActividades($id);
# Retorno los datos en la variable para usarlos en la vista
return $data;