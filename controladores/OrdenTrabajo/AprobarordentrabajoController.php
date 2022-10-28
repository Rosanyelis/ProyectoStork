<?php
# Realizo la llamada del modelo para instanciar la funcion 
# correspondiente de listado
require_once("../../modelos/OrdenTrabajoModel.php");

# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);

# Instancio la funcion Capturar
$instacia = new OrdenTrabajo();
$result = $instacia->aprobarOrden($id);
# Retorno los datos en la variable para usarlos en la vista
# Validamos el resultado y guardamos un dato en el localstorage
# o memoria del navegador para generar el mensaje de creación exitosa
if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('aprobacion', 'true');        
        window.location='../../vistas/admin/orden-trabajo/orden-trabajo.php'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/admin/orden-trabajo/orden-trabajo.php'; 
    </script>";
}