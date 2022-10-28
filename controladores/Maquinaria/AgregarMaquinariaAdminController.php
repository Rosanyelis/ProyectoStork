<?php

require_once("../../modelos/MaquinariaModel.php");

# Eliminamos los espacios del principio y final del dato
$id             = trim($_REQUEST['id']);
$loteMaquinaria = $_REQUEST['loteHerramientas'];

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new Maquinaria();
$result = $instacia->guardar($id, $loteMaquinaria);
# Validamos el resultado y guardamos un dato en el localstorage
# o memoria del navegador para generar el mensaje de creación exitosa
if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/admin/orden-trabajo/capturarordentrabajo.php?id=".$id."'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/admin/orden-trabajo/capturarordentrabajo.php?id=".$id."; 
    </script>";
}