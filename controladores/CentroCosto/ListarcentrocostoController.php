<?php
# Realizo la llamada del modelo para instanciar la funcion 
# correspondiente de listado
require_once("../../../modelos/CentroCostosModel.php");

# Obtenemos el id de la url
$id         = $_REQUEST['id'];
# Instancio la funcion listar
$instancia = new CentroCostos();
$data = $instancia->listar($id);
# Retorno los datos en la variable para usarlos en la vista
return $data;