<?php

require_once("../../modelos/ProductosModel.php");

# Eliminamos los espacios del principio y final del dato
$id             = trim($_REQUEST['id']);
$loteProductos = $_REQUEST['loteProductos'];

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new Productos();
$result = $instacia->guardar($id, $loteProductos);
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