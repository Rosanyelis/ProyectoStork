<?php

require_once("../../modelos/CallesModel.php");


# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);
$idcc          = trim($_REQUEST['idcc']);
$metro_calle   = trim($_REQUEST['metro_calle']);

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new Calles();
$result = $instacia->create($id, $idcc, $metro_calle);

if ($result) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/calles/calles.php?id=".$id."&idcc=".$idcc."'; 
    </script>";
}


