<?php

require_once("../../modelos/HilerasModel.php");


# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);
$idcc          = trim($_REQUEST['idcc']);
$idhilera      = trim($_REQUEST['idhilera']);
$metro_hilera  = trim($_REQUEST['metro_hilera']);
$arbol_hilera  = trim($_REQUEST['arbol_hilera']);

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new Hileras();
$result = $instacia->update($id, $idcc, $idhilera, $metro_hilera, $arbol_hilera);
# valida el proceso de actualizacion 
if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('update', 'true');        
        window.location='../../vistas/admin/hileras/hileras.php?id=".$id."&idcc=".$idcc."'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/admin/hileras/hileras.php?id=".$id."&idcc=".$idcc."';  
    </script>";
}


