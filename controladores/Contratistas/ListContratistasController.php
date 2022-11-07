<?php
# Realizo la llamada del modelo para instanciar la funcion 
# correspondiente de listado
require_once("../../../modelos/ContratistasModel.php");

# Instancio la funcion listar
$instacia = new Contratista();
$data = $instacia->listar();
# Retorno los datos en la variable para usarlos en la vista
return $data;