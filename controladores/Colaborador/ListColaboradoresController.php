<?php
# Realizo la llamada del modelo para instanciar la funcion 
# correspondiente de listado
require_once("../../../modelos/ColaboradoresModel.php");

# Instancio la funcion listar
$instacia = new Colaboradores();
$data = $instacia->listar();
# Retorno los datos en la variable para usarlos en la vista
return $data;