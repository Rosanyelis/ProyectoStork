<?php
    session_start();
    $_SESSION['nombre'] = '';
    $_SESSION['apellido'] = '';
    $_SESSION['rol'] = '';
    $_SESSION['id_user'] = '';
    
    if(empty($_SESSION['nombre']) && empty($_SESSION['apellido'])){
        session_destroy();

        echo '<script>
            window.location = "../index.php";
        </script>';
    }