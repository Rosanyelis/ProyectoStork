<?php

include_once("ConexionModel.php");
date_default_timezone_set("America/Santiago");

class Factura
{
    
    public function listar()
    {
        try {
            $data = Conexion::conectar()->prepare("SELECT facturas.n_factura, facturas.numerof, facturas.rut_proveedor, facturas.fecha, facturas.monto_compra, proveedores.nombre FROM facturas JOIN proveedores ON facturas.rut_proveedor = proveedores.rut");
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            return $results;

        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function create($rut, $proveedor, $direccion, $razon_social, $telefono, $monto_compra, $lotesProductos, $nro_factura)
    {
        try {
            $d = new DateTime();
            $fecha = $d->format('Y-m-d');

            # Instacio para crear proveedor si no existe y lo mismo con la factura
            $FacturaProveedor = new Factura();
            $proveedor = $FacturaProveedor->Proveedor($rut, $proveedor, $direccion, $razon_social, $telefono, $nro_factura, $monto_compra);

            # Obtenemos el ultimo id del dato insertado
            $last = Conexion::conectar()->prepare("SELECT IDENT_CURRENT('facturas') as id");
            $last->execute();
            $dato = $last->fetchObject();
            $idFactura = $dato->id;

            # Decodificamos el array de productos
            $productos = json_decode($lotesProductos, True);

            foreach ($productos as $key) {
                $lote = $key['lote']; 
                $codigo = $key['codigo']; 
                $producto = $key['producto']; 
                $tipo = $key['tipo'];
                $familia = $key['familia']; 
                $subfamilia = $key['subfamilia']; 
                $medida = $key['medida']; 
                $cantidad = $key['cantidad'];
                $precio = $key['precio'];

                $instacia = new Factura();
                $productof = $instacia->Producto($codigo, $producto, $medida, $cantidad, $familia, $subfamilia, $tipo, $precio, $fecha);
                

                # Ahora creamos los lotes de productos
                $lotes  = Conexion::conectar()->prepare("INSERT INTO lotes (n_factura, codigo_lote, codproducto, producto, cantidad, unidad, precio, fecha_creacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $procesar = $lotes->execute([$idFactura, $lote, $codigo, $producto, $cantidad, $medida, $precio, $fecha]);
                
                # Luego buscamos el producto para actualizar su stock y su precio base
                $obtener  = Conexion::conectar()->prepare("SELECT * FROM Productos WHERE cod_producto = ?");
                $obtener->execute([$codigo]);
                $dato = $obtener->fetchObject();
                $stock = $dato->stock;

                if ($stock === '0') {
                    $stock = $cantidad;
                }else{
                    # Sumamos el stock actual con la cantidad entrante
                    $stock = $stock + $cantidad;
                }

                $data = Conexion::conectar()->prepare("UPDATE Productos SET stock = ?, preciocompra_unidad = ? WHERE cod_producto = ? ");
                $results = $data->execute([$stock, $precio, $codigo]);
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
            $factura = Conexion::conectar()->prepare("SELECT facturas.numerof, facturas.rut_proveedor, facturas.fecha, facturas.monto_compra, proveedores.nombre, proveedores.direccion, proveedores.razon_social, proveedores.telefono  FROM facturas JOIN proveedores ON facturas.rut_proveedor = proveedores.rut WHERE facturas.n_factura = ?");
            $factura->execute([$id]);
            $data = $factura->fetchObject();

            $lotesf = Conexion::conectar()->prepare("SELECT lotes.*, productos.tipo,productos.familia,productos.sub_familia FROM lotes JOIN productos ON lotes.codproducto = productos.cod_producto WHERE n_factura = ?");
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
            $data = Conexion::conectar()->prepare("DELETE FROM facturas WHERE n_factura = ?");
            $results = $data->execute([$id]);
            $dato = Conexion::conectar()->prepare("DELETE FROM lotes WHERE n_factura = ?");
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

    public function Proveedor($rut, $proveedor, $direccion, $razon_social, $telefono, $nro_factura, $monto_compra)
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
            $factura  = Conexion::conectar()->prepare("INSERT INTO facturas (numerof, fecha, rut_proveedor, monto_compra) VALUES (?, ?, ?, ?)");
            $factura->execute([$nro_factura, $fecha, $rut, $monto_compra]);

        }catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }

    public function Producto($codigo, $producto, $medida, $cantidad, $familia, $subfamilia, $tipo, $precio, $fecha)
    {
        try {
            # Contamos si existe el producto
            $producto  = Conexion::conectar()->prepare("SELECT COUNT(*) FROM Productos WHERE cod_producto = ?");
            $countp     = $producto->execute([$codigo]);
            
            # Si no existe lo creamos
            if ($countp === 0) {
                $productos  = Conexion::conectar()->prepare("INSERT INTO Productos (cod_producto, descripcion, medida, stock, familia, sub_familia, tipo, preciocompra_unidad, fecha_creacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $productos->execute([$codigo, $producto, $medida, $cantidad, $familia, $subfamilia, $tipo, $precio, $fecha]);
            }
        } catch (PDOException $e) {
            echo 'incapaz de recuperar datos';
            echo $e->getMessage();
        }
    }
}
