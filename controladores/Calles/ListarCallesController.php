<?php
# Realizo la llamada del modelo para instanciar la funcion 
# correspondiente de listado
require_once("../../../modelos/CallesModel.php");

# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);
$idcc          = trim($_REQUEST['idcc']);
# Instancio la funcion listar
$instancia = new Calles();
$data = $instancia->listar($id, $idcc);
# Retorno los datos en la variable para usarlos en la vista
return $data;