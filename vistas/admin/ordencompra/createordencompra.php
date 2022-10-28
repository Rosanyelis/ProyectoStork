<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->

<!-- Fin de Controlador de listado  -->

<?php include '../../layouts/cabecera.php'; ?>
<?php include '../../layouts/estilos.php'; ?>

<!-- Incluir estilos css en caso de ser necesario  -->

<?php include '../../layouts/fincabecera.php'; ?>
<?php include '../../layouts/body.php'; ?>
<?php include '../../layouts/navigation.php'; ?>
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-body"><!-- Kick start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ingreso Orden De Compra</h4>
                        </div>
                        <div class="card-body">
                            <form id="aggOrden" class="form" action="../../../controladores/OrdenCompra/CreateordencompraController.php" method="POST">
                                <div id="proveedor" class="row needs-validation">
                                    <div class="col-md-12 col-12 mb-1">
                                        <h5>Proveedor</h5>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="area-total">Rut Proveedor:</label>
                                            <input type="text" id="rut" name="rut" oninput="checkRut(this)"  class="form-control" placeholder="00000000-0">
                                            <div class="msgproveedor invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="cantidad_cc">Nombre:</label>
                                            <input type="text" id="nombrep" name="proveedor"  class="form-control" placeholder="Alejandro Venales" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <div class="form-group">
                                            <label for="promedio_cc">Direccion:</label>
                                            <input type="text" id="direccion" name="direccion" class="form-control"  placeholder="Ejm: Quilicura" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="area-total">Razon social:</label>
                                            <input type="text" id="razon_social" name="razon_social"  class="form-control" placeholder="Ejm: Empresa Farma" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="cantidad_cc">Telefono:</label>
                                            <input type="text"id="telefono" name="telefono" class="form-control" placeholder="Ejm: +00 000 000 00" readonly>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-12 col-12 mb-1">
                                        <h5>Buscar Producto</h5>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="area-total">Codigo del Producto:</label>
                                            <input type="text" id="codproducto" class="form-control" placeholder="00000000-0">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 mt-2">
                                        <button type="button" id="buscarproduct" class="btn btn-primary">
                                            <i class="fas fa-search"></i> Buscar
                                        </button>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <div class="form-group">
                                            <label for="promedio_cc">Precio Total de Compra:</label>
                                            <input type="text" name="monto_compra" class="form-control" >
                                        </div>
                                    </div>
                                </div>

                                 <div class="row">
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                        <label for="">Codigo del Producto:</label>
                                        <input type="text" id="codigo" name="cod_producto"  class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="">Descripcion:</label>
                                            <input type="text"id="producto" name="producto"  class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="">Tipo:</label>
                                            <input type="text" id="tipo" name="tipo" class="form-control"  readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="">Familia:</label>
                                            <input type="text" id="familia" name="familia" class="form-control"  readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="">Sub-Familia:</label>
                                            <input type="text" id="subfamilia" name="subfamilia" class="form-control"  readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                        <label for="">Medida:</label>
                                        <input type="text"  id="medida" name="medida"  class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="">Stock:</label>
                                            <input type="text" id="stock" name="stock"  class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="">Cantidad a comprar:</label>
                                            <input type="text" id="cantidad" name="cantidad" class="form-control"  >
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="">Precio de compra:</label>
                                            <input type="text" id="precio" name="precio" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 mt-2">
                                        <button type="button" id="aggLoteprod" class="btn btn-primary btn">
                                            <i class="fas fa-file"></i> Agregar
                                        </button>
                                    </div>
                                </div>
                                

                                <div class="row mt-1">
                                    <div class="col-md-12 col-12 mb-2">
                                        <h4>Listado de productos para la orden de compra</h4>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <table class="lote-productos table table-condensed table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Codigo</th>
                                                    <th>Descripción</th>
                                                    <th>Medida</th>
                                                    <th>Stock</th>  
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Acciones</th>
                                                </tr>
                                             </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-right mt-3">
                                        <input id="productos" type="hidden" name="loteproductos">
                                        <button id="enviarorden" type="button" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Guardar</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect">Limpiar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--/ Kick start -->

</div>
<!-- END: Content-->

<?php include '../../layouts/footer.php'; ?>
<?php include '../../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->
<script>
    $(window).on('load', function() {
        'use strict';
    /**
     * Modulo de Orden de Compra - Crear Orden de Compra
     */
    var loteProductos = [];
        $('#rut').change(function() {
            var rut = $('#rut').val();
            $.ajax({
                type: 'POST',
                url: '../../../controladores/OrdenCompra/SearchproveedorController.php',
                data: {
                    rut: rut
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.data != '') {
                        $('.msgproveedor').empty();
                        $('#nombrep').val(response.data.nombre);
                        $('#direccion').val(response.data.direccion);
                        $('#razon_social').val(response.data.razon_social);
                        $('#telefono').val(response.data.telefono);
                    }else{
                        $('#proveedor').addClass('invalid was-validated');
                        $('.invalid-feedback').empty();
                        $('.invalid-feedback').append('El Rut de Proveedor que ingresó no existe!');
                        alert('Si el rut no se encuentra registrado, se le habilitan los campos para un nuevo registro');
                        $('#nombrep').removeAttr('readonly');;
                        $('#direccion').removeAttr('readonly');;
                        $('#razon_social').removeAttr('readonly');;
                        $('#telefono').removeAttr('readonly');;
                    }
                }
            });
        });
        $('#buscarproduct').on('click', function() {
            let codproducto = $('#codproducto').val();
            $.ajax({
                type: 'POST',
                url: '../../../controladores/OrdenCompra/SearchbodegaController.php',
                data: {
                    codproducto
                },
                dataType: 'json',
                success: function(response) {
                    if (response.data != '') {
                        $('#codigo').val(response.data.codigo);
                        $('#producto').val(response.data.producto);
                        $('#tipo').val(response.data.tipo);
                        $('#familia').val(response.data.familia);
                        $('#subfamilia').val(response.data.subfamilia);
                        $('#medida').val(response.data.medida);
                        $('#stock').val(response.data.stock);
                    }else{
                        alert('El nombre de producto ingresado no existe, por favor ingrese un producto que exista');
                        $('#codigo').val('');
                        $('#producto').val('');
                        $('#tipo').val('');
                        $('#familia').val('');
                        $('#subfamilia').val('');
                        $('#medida').val('');
                        $('#stock').val('');
        
                        $('#codigo').removeAttr('readonly');
                        $('#producto').removeAttr('readonly');
                        $('#tipo').removeAttr('readonly');
                        $('#familia').removeAttr('readonly');
                        $('#subfamilia').removeAttr('readonly');
                        $('#medida').removeAttr('readonly');
                    }
                }
            });
        });
        $('#aggLoteprod').on('click', function() {
            var codigo = $('#codigo').val();
            var producto = $('#producto').val();
            var medida = $('#medida').val();            
            var stock = $('#stock').val();
            var cantidad = $('#cantidad').val();
            var precio = $('#precio').val();

            let fila =
                '<tr><td>' + codigo + '</td><td>' + producto + '</td><td>' +
                medida + '</td><td>' + stock + '</td><td>' + cantidad + '</td><td>' + precio +
                '</td><td><button type="button" class="btn btn-danger">Eliminar</button></td></tr>'

            var datosFila = {};
            datosFila.codigo = codigo;
            datosFila.producto = producto;
            datosFila.medida = medida;
            datosFila.stock = stock;
            datosFila.cantidad = cantidad;
            datosFila.precio = precio;


            loteProductos.push(datosFila);
            console.log(datosFila);

            $('.lote-productos tbody').append(fila);

            $('#codigo').val('');
            $('#producto').val('');
            $('#tipo').val('');
            $('#familia').val('');
            $('#subfamilia').val('');
            $('#medida').val('');
            $('#stock').val('');
            $('#cantidad').val('');
            $('#precio').val('');
            console.log(loteProductos);
        });
        var dt_basic = $('.lote-productos');

        // $('.lote-productos tbody').on('click', '.delete-item', function(){
        //     $(this).parents('tr').remove();
        //     loteProductos.length=0;
        //     console.log(loteProductos);
        // });

        $('#enviarorden').on('click', function() {
            let lote = JSON.stringify(loteProductos);
            $('#productos').val(lote);
            $('#aggOrden').submit();
        });
    });
    function checkRut(rut) {
            // Despejar Puntos
            var valor = rut.value.replace('.', '');
            // Despejar Guión
            valor = valor.replace('-', '');
            // Aislar Cuerpo y Dígito Verificador
            cuerpo = valor.slice(0, -1);
            dv = valor.slice(-1).toUpperCase();
            // Formatear RUN
            rut.value = cuerpo + '-' + dv
            // Si no cumple con el mínimo ej. (n.nnn.nnn)
            // if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
            // Calcular Dígito Verificador
            suma = 0;
            multiplo = 2;
            // Para cada dígito del Cuerpo
            for (i = 1; i <= cuerpo.length; i++) {
                // Obtener su Producto con el Múltiplo Correspondiente
                index = multiplo * valor.charAt(cuerpo.length - i);
                // Sumar al Contador General
                suma = suma + index;
                // Consolidar Múltiplo dentro del rango [2,7]
                if (multiplo < 7) {
                    multiplo = multiplo + 1;
                } else {
                    multiplo = 2;
                }
            }
            // Calcular Dígito Verificador en base al Módulo 11
            dvEsperado = 11 - (suma % 11);
            // Casos Especiales (0 y K)
            dv = (dv == 'K') ? 10 : dv;
            dv = (dv == 0) ? 11 : dv;
        }
</script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?> 

