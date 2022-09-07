<?php

include_once("ConexionModel.php");

class Prespuesto
{
    
    public function listar()
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Presupuesto order by id_presupuesto");
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function create($nombre, $apellido, $rut, $campo, $usuario, $clave)
    {
        try {
            $data = Conexion::conectar()->prepare("INSERT INTO Usuario(Nombre, apellido, rut, campo, usuario, clave ) VALUES (?, ?, ?, ?, ?, ?)");
            $results = $data->execute([$nombre, $apellido, $rut, $campo, $usuario, $clave]);
            return $results;

        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Presupuesto WHERE id_presupuesto = ?");
            $data->execute([$id]);
            $presupuesto = $data->fetchObject();

            # Obtener maquinaria de orden
            $consulta6 = Conexion::conectar()->prepare("SELECT * FROM HerramientaEjecucion WHERE id_ejecucion = ?");
            $consulta6->execute([$id]);
            $maquinaria = $consulta6->fetchAll(PDO::FETCH_OBJ);

            # Obtener maquinaria de orden
            $consulta7 = Conexion::conectar()->prepare("SELECT * FROM ProductoEjecucion WHERE id_ejecucion = ?");
            $consulta7->execute([$id]);
            $productosEje = $consulta7->fetchAll(PDO::FETCH_OBJ);

            $results = compact('presupuesto', 'maquinaria', 'productosEje');
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function gruposCampos()
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT * FROM Campo");
            $data->execute();
            $campos = $data->fetchAll(PDO::FETCH_OBJ);
            # Obtener grupos
            $consulta6 = Conexion::conectar()->prepare("SELECT * FROM Grupo");
            $consulta6->execute();
            $grupos = $consulta6->fetchAll(PDO::FETCH_OBJ);

            # lista maquinarias
            $consulta6 = Conexion::conectar()->prepare("SELECT * FROM Tipo_maquinaria");
            $consulta6->execute();
            $maquinaria = $consulta6->fetchAll(PDO::FETCH_OBJ);

            # Lista implementos
            $consulta7 = Conexion::conectar()->prepare("SELECT * FROM Tipo_implemeto");
            $consulta7->execute();
            $implementos = $consulta7->fetchAll(PDO::FETCH_OBJ);

             # Obtener Productos
             $consulta5 = Conexion::conectar()->prepare("SELECT * FROM item");
             $consulta5->execute();
             $consultaProductos = $consulta5->fetchAll(PDO::FETCH_OBJ);

            $results = compact('campos', 'grupos', 'maquinaria', 'implementos', 'consultaProductos');
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function searchCentroCostos($campo)
    {
        try {
            $datos['data'] = [];
            $info = Conexion::conectar()->prepare("SELECT * FROM CentroCosto WHERE id_Campo = ?");
            $procesar = $info->execute([$campo]);
            if ($procesar) {
                $cadena="<option value='Todos Los Centro Costos'>****Todos Los Centro Costos****</option>";
                while ($data = $info->fetch(PDO::FETCH_ASSOC)) {
                    $datos['data'] = $cadena=$cadena.'<option value='.$data['id_CC'].'>'.$data['nombre'].'</option>';
                    // $datos['data'] = [
                    //     'id_CC' => $data['id_CC'],
                    //     'nombre' => $data['nombre']
                    // ];
                }
           
                $results = json_encode($datos);
                echo $results;
            }
            
        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function searchLabor($grupo)
    {
        try {
            $datos['data'] = [];
            $info = Conexion::conectar()->prepare("SELECT * FROM Labor WHERE id_Grupo = ?");
            $procesar = $info->execute([$grupo]);
            if ($procesar) {
                $cadena="<option value=''>---Seleccione Labor---</option>";
                while ($data = $info->fetch(PDO::FETCH_ASSOC)) {
                    $datos['data'] = $cadena=$cadena.'<option value='.$data['id_Labor'].'>'.$data['nombre'].'</option>';
                    // $datos['data'] = [
                    //     'id_CC' => $data['id_CC'],
                    //     'nombre' => $data['nombre']
                    // ];
                }
           
                $results = json_encode($datos);
                echo $results;
            }
            
        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    
}
