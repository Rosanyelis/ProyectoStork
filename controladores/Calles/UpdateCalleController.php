<?php

require_once("../../modelos/CallesModel.php");


# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);
$idcc          = trim($_REQUEST['idcc']);
$idcalle       = trim($_REQUEST['idcalle']);
$metro_calle   = trim($_REQUEST['metro_calle']);

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new Calles();
$result = $instacia->update($id, $idcc, $idcalle, $metro_calle);
# Validamos el resultado y guardamos un dato en el localstorage
# o memoria del navegador para generar el mensaje de creación exitosa
if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('update', 'true');        
        window.location='../../vistas/calles/calles.php?id=".$id."&idcc=".$idcc."'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/calles/calles.php?id=".$id."&idcc=".$idcc."'; 
    </script>";
}



