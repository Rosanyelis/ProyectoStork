<?php 
    session_start();
    if(isset($_SESSION['nombre']) && isset($_SESSION['rol']) && isset($_SESSION['apellido']))
    {
        echo '<script>
                localStorage.setItem("home", 1);
            </script>';
    }else{
        echo '<script>
            window.location = "../../../index.php";
        </script>';
    }
?>