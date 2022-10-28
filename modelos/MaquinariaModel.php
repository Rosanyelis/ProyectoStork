<?php

include_once("ConexionModel.php");

class Maquinaria
{
    public function EditarMaquinaria($id)
    {
        try {
            # Consultar orden de trabajo a capturar seleccionada
            $consulta1 = Conexion::conectar()->prepare("SELECT * FROM Presupuesto WHERE id_presupuesto = ?");
            $consulta1->execute([$id]);
            $ejecucion = $consulta1->fetchObject();

            # Consultar campo a capturar seleccionada
            $consulta2 = Conexion::conectar()->prepare("SELECT * FROM Campo WHERE nombre = ?");
            $consulta2->execute([$ejecucion->campo]);
            $campo = $consulta2->fetchObject();

            # Obtener maquinaria de orden
            $consulta5 = Conexion::conectar()->prepare("SELECT * FROM HerramientaEjecucion WHERE id_ejecucion = ? ");
            $consulta5->execute([$id]);
            $maquinariaEjecucion = $consulta5->fetchAll(PDO::FETCH_OBJ);

            # lista maquinarias
            $consulta6 = Conexion::conectar()->prepare("SELECT * FROM maquinaria WHERE campo_id = ? OR campo_id = NULL");
            $consulta6->execute([$campo->id_Campo]);
            $maquinaria = $consulta6->fetchAll(PDO::FETCH_OBJ);

            # Lista implementos
            $consulta7 = Conexion::conectar()->prepare("SELECT * FROM implementos WHERE campo_id = ?");
            $consulta7->execute([$campo->id_Campo]);
            $implementos = $consulta7->fetchAll(PDO::FETCH_OBJ);

            $results = compact('ejecucion', 'maquinaria', 'implementos', 'maquinariaEjecucion');
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function guardar($id, $loteMaquinaria)
    {
        try {
            # Decodificamos el array de productos
            $maquinaria = json_decode($loteMaquinaria, True);
            $valorHerr =0;
            foreach ($maquinaria as $key) {
                $maquinaria = $key['maquinaria'];
                $implemento = $key['implemento'];
                $km = $key['km'];
                $valor = $key['valor'];
                $valorTotal = $key['valorTotal'];


                # Ahora creamos los lotes de productos
                $lotes  = Conexion::conectar()->prepare("INSERT INTO HerramientaEjecucion (id_ejecucion, maquinaria, implemento, kmH, valor, valorFinal) VALUES (?, ?, ?, ?, ?, ?)");
                $results = $lotes->execute([$id, $maquinaria, $implemento, $km, $valor, $valorTotal]);

                $val =  $key['valorTotal'];
                $valorHerr = $valorHerr + $val;
            }

            $data1 = Conexion::conectar()->prepare("UPDATE Presupuesto SET ValorHerramientaEjecucion = ? WHERE id_presupuesto = ? ");
            $ejecutar = $data1->execute([$valorHerr, $id]);
            
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $data = Conexion::conectar()->prepare("DELETE FROM HerramientaEjecucion WHERE id_herrEje = ?");
            $results = $data->execute([$id]);
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }
}