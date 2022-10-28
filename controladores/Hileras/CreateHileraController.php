<?php

require_once("../../modelos/HilerasModel.php");

# Convertimos en mayusculas los datos recibidos en caso de ser texto
# Eliminamos los espacios del principio y final del dato
$id            = trim($_REQUEST['id']);
$idcc          = trim($_REQUEST['idcc']);
$metro_hilera  = strtoupper(trim($_REQUEST['metro_hilera']));
$arbol_hilera  = strtoupper(trim($_REQUEST['arbol_hilera']));

# Instaciamos la funcion de la clase campos para insertar datos
$instacia = new Hileras();
$result = $instacia->create($id, $idcc, $metro_hilera, $arbol_hilera);
# Validamos el resultado y guardamos un dato en el localstorage
# o memoria del navegador para generar el mensaje de creación exitosa
if ($result == 1) {
    echo 
    "<script> 
        localStorage.setItem('registry', 'true');        
        window.location='../../vistas/admin/hileras/hileras.php?id=".$id."&idcc=".$idcc."'; 
    </script>";
}else{
    echo 
    "<script> 
        localStorage.setItem('error', 'true');        
        window.location='../../vistas/admin/hileras/hileras.php?id=".$id."&idcc=".$idcc."';
    </script>";
}


