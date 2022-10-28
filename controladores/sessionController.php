<?php

require_once("../modelos/loginModel.php");

# Convertimos en mayusculas los datos recibidos en caso de ser texto
# Eliminamos los espacios del principio y final del dato

$user               = trim($_REQUEST['user']);
$password           = trim($_REQUEST['password']);
# Instaciamos la funcion de la clase campos para insertar datos
$instancia = new Logueo();
$result = $instancia->login($user, $password);
# Validamos el resultado y guardamos un dato en el localstorage
# o memoria del navegador para generar el mensaje de creación exitosa
if ($result == 'Administrador') {
    echo "<script> 
        localStorage.setItem('home', 1);       
        window.location = '../vistas/admin/dashboard/dashboard.php'; 
    </script>";
}
if ($result == 'Jefe de Campo') {
    echo "<script> 
        localStorage.setItem('home', 1);       
        window.location = '../vistas/JefeCampo/dashboard/dashboard.php'; 
    </script>";
}
if ($result == 'Error') {
    echo "<script> 
        localStorage.setItem('errorLogin', 1);       
        window.location = '../index.php'; 
    </script>";
}
// else{
//     echo $result;
// }