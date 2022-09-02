<?php

require_once("../../modelos/HilerasModel.php");


# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);
$idcc          = trim($_REQUEST['idcc']);
$metro_hilera  = trim($_REQUEST['metro_hilera']);
$arbol_hilera  = trim($_REQUEST['arbol_hilera']);

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new Hileras();
$result = $instacia->create($id, $idcc, $metro_hilera, $arbol_hilera);

if ($result) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/hileras/hileras.php?id=".$id."&idcc=".$idcc."'; 
    </script>";
}


