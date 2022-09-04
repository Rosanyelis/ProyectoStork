<?php
# Realizo la llamada del modelo para instanciar la funcion 
# correspondiente de listado
require_once("../../modelos/CamposModel.php");

# Instancio la funcion listar
$instacia = new Campos();
$data = $instacia->listar();
# Retorno los datos en la variable para usarlos en la vista
return $data;