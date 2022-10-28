<?php

include_once("ConexionModel.php");

class Logueo
{
    public function login($user, $password){

        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE usuario = ? AND password = ?");
            $data->execute([$user, $password]);
        
            //si existe el usuario
            if($data->rowCount() == -1)
            {
                $fila  = $data->fetchObject();
                if ($fila->rol == 'Administrador') {
                    session_start();
                    $_SESSION['nombre'] = $fila->nombre;
                    $_SESSION['apellido'] = $fila->apellido;
                    $_SESSION['rol'] = $fila->rol;
                    $_SESSION['id_user'] = $fila->id_usuario;
                    
                    $result = 'Administrador';
                    return $result;
                    // echo '<script>
                    //     localStorage.setItem("home", 1);
                    //     window.location = "../views/admin/home/dashboard.php";
                    // </script>';
                }
                if ($fila->rol == 'Jefe de Campo') {
                    
                    session_start();
                    $_SESSION['nombre'] = $fila->nombre;
                    $_SESSION['apellido'] = $fila->apellido;
                    $_SESSION['rol'] = $fila->rol;
                    $_SESSION['id_user'] = $fila->id_usuario;
        
                    $result = 'Jefe de Campo';
                    return $result;

                    // echo '<script>
                    //     window.location = "../views/clientes/home/dashboard.php";
                    // </script>';
                }
            }else{
                $result = 'Error';
                return $result;
            }
        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }

        
    }
}
