<?php

include_once("ConexionModel.php");

class OrdenCompra
{
    
    public function listar()
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT ordenes.*, proveedores.nombre FROM ordenes JOIN proveedores ON ordenes.rut_proveedor = proveedores.rut");
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function create($rut, $proveedor, $direccion, $razon_social, $telefono, $monto_compra, $lotesProductos, $numerorden)
    {
        try {
            $d = new DateTime();
            $fecha = $d->format('Y-m-d');

            # Instacio para crear proveedor si no existe y lo mismo con la factura
            $FacturaProveedor = new OrdenCompra();
            $proveedor = $FacturaProveedor->Proveedor($rut, $proveedor, $direccion, $razon_social, $telefono, $numerorden, $monto_compra);

            # Obtenemos el ultimo id del dato insertado
            $last = Conexion::conectar()->prepare("SELECT IDENT_CURRENT('ordenes') as id");
            $last->execute();
            $dato = $last->fetchObject();
            $idOrden = $dato->id;

            # Decodificamos el array de productos
            $productos = json_decode($lotesProductos, True);

            foreach ($productos as $key) {
                $codigo = $key['codigo'];
                $producto = $key['producto'];
                $medida = $key['medida'];
                $stock = $key['stock'];
                $cantidad = $key['cantidad'];
                $precio = $key['precio'];

                # Ahora creamos los lotes de productos
                $lotes  = Conexion::conectar()->prepare("INSERT INTO lotes_compras (n_orden, codproducto, producto, cantidad, unidad, precioc, fecha_creacion) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $results = $lotes->execute([$idOrden, $codigo, $producto, $cantidad, $medida, $precio, $fecha]);

            }
            return $results;
        } catch (PDOException $e) {
            echo 'Error en el proceso de insercion';
            echo $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            $ordenes = Conexion::conectar()->prepare("SELECT ordenes.*, proveedores.nombre, proveedores.direccion , proveedores.razon_social, proveedores.telefono FROM ordenes JOIN proveedores ON ordenes.rut_proveedor = proveedores.rut WHERE ordenes.n_orden = ?");
            $ordenes->execute([$id]);
            $data = $ordenes->fetchObject();

            $lotesf = Conexion::conectar()->prepare("SELECT lotes_compras.*, productos.stock FROM lotes_compras JOIN productos ON lotes_compras.codproducto = productos.cod_producto WHERE lotes_compras.n_orden = ?");
            $lotesf->execute([$id]);
            $lotes = $lotesf->fetchAll(PDO::FETCH_OBJ);


            $results = compact('data', 'lotes');
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $data = Conexion::conectar()->prepare("DELETE FROM ordenes WHERE n_orden = ?");
            $results = $data->execute([$id]);
            $dato = Conexion::conectar()->prepare("DELETE FROM lotes_compras WHERE n_orden = ?");
            $dato->execute([$id]);
            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function searchProveedor($rut)
    {
        try {
            $datos['data'] = [];
            $info = Conexion::conectar()->prepare("SELECT * FROM proveedores WHERE rut = ?");
            $procesar = $info->execute([$rut]);
            if ($procesar) {
                while ($data = $info->fetch(PDO::FETCH_ASSOC)) {
                    $datos['data'] = [
                        'rut' => $data['rut'],
                        'nombre' => $data['nombre'],
                        'direccion' => $data['direccion'],
                        'razon_social' => $data['razon_social'],
                        'telefono' => $data['telefono'],
                    ];
                }
           
                $results = json_encode($datos);
                echo $results;
            }
            
        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function searchProducto($codigo)
    {
        try {
            $datos['data'] = [];
            $info = Conexion::conectar()->prepare("SELECT * FROM Productos WHERE cod_producto = ?");
            $procesar = $info->execute([$codigo]);
            if ($procesar) {
                while ($data = $info->fetch(PDO::FETCH_ASSOC)) {
                    $datos['data'] = [
                        'codigo' => $data['cod_producto'],
                        'producto' => $data['descripcion'],
                        'medida' => $data['medida'],
                        'familia' => $data['familia'],
                        'subfamilia' => $data['sub_familia'],
                        'tipo' => $data['tipo'],
                        'stock' => $data['stock'],
                    ];
                }

                $results = json_encode($datos);
                echo $results;
            }
        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }
    
    public function Proveedor($rut, $proveedor, $direccion, $razon_social, $telefono, $numerorden, $monto_compra)
    {
        try {
            $d = new DateTime();
            $fecha = $d->format('Y-m-d');
            # hacemos un count para saber si el Proveedor existe o no
            $proveedor  = Conexion::conectar()->prepare("SELECT COUNT(*) FROM proveedores WHERE rut = ?");
            $countp     = $proveedor->execute([$rut]);

            # SI no existe lo registramos
            if ($countp === 0) {
                $proveedor  = Conexion::conectar()->prepare("INSERT INTO proveedores (rut, nombre, direccion, razon_social, telefono) VALUES (?, ?, ?, ?, ?)");
                $countp     = $proveedor->execute([$rut, $proveedor, $direccion, $razon_social, $telefono]);
            }

            # Insertamos la factura
            $factura  = Conexion::conectar()->prepare("INSERT INTO ordenes (numerorden, fecha, rut_proveedor, monto_compra, estatus) VALUES (?, ?, ?, ?, ?)");
            $factura->execute([$numerorden, $fecha, $rut, $monto_compra, 'En Revisión']);

        }catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

}
