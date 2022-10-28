<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../../controladores/productos/EditproductoAdminController.php'; ?>
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
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Productos</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class=" breadcrumb-right">
                <a href="../orden-trabajo/capturarordentrabajo.php?id=<?php echo $id; ?>" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
            </div>
        </div>
    </div>
    <div class="content-body"><!-- Kick start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Productos a Utilizar </h4>
                        </div>
                        <div class="card-body">
                        <form id="editarProducto" class="row" action="../../../controladores/Productos/AgregarproductoAdminController.php?id=<?php echo $id; ?>" method="POST">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="maquinaria">Productos a Utilizar:</label>
                                        <select class="form-control" id="producto" name="producto">
                                            <option value="">---Seleccione producto---</option>
                                            <?php foreach ($data['consultaProductos'] as $item) { ?>
                                                <option value="<?php echo $item->n_item;?>"><?php echo $item->n_item;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="Unidad">Unidad:</label>
                                        <input type="text" id="unidad_producto" name="unidad_producto" class="form-control" placeholder="" value="" readonly>
                                        <input type="hidden" id="unidad_producto_precio" name="unidad_producto_precio">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="Cantidad">Cantidad:</label>
                                        <input type="text" id="cantidad_producto" name="cantidad_producto" class="form-control"
                                            placeholder="" value="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Valor">Valor:</label>
                                        <input type="text" id="valor_producto" name="valor_producto" class="form-control"
                                            placeholder="" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <button type="button" id="agregarProducto" class="btn btn-primary mt-2">Agregar</button>
                                </div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-12"><h4>Listado Productos</h4></div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-12 col-12">
                                    <!-- <section class="card-datatable"> -->
                                        <table class=" table loteProductos">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Unidad</th>
                                                    <th>Valor Unidad</th>
                                                    <th>Cantidad</th>
                                                    <th>Valor Final</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablita1">
                                            <?php 
                                                foreach ($data['productosEjecucion'] as $item) { ?>
                                                <tr>
                                                    <td><?php echo $item->nombre;?></td>
                                                    <td><?php echo $item->unidad;?></td>
                                                    <td><?php echo $item->valorUnidad;?></td>
                                                    <td><?php echo $item->cantidad;?></td>
                                                    <td><?php echo $item->valorFinal;?></td>
                                                    <td>
                                                    <a class="btn btn-danger" 
                                                            href="../../../controladores/Productos/EliminarProductoAdminController.php?id=<?php echo $item->id_prodEje;?>&idP=<?php echo $id; ?>">
                                                            Eliminar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <!-- </section> -->
                                </div>
                                <div class="w-100 d-none d-md-block mt-4"></div>
                                <div class="col-md-12 text-right">
                                    <input type="hidden" id="lote" name="loteProductos">
                                    <!-- <input type="hidden" id="valorProd" value="<?php echo $valorProd; ?>" name="valorProd"> -->
                                    <button type="button" id="terminar" class="btn float-right btn btn-primary ">Finalizar Edición</button>
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

    var loteProductos = [];

    $('#producto').change(function() {
        var cod = $('#producto').val();
        $.ajax({
            type: 'POST',
            url: '../../../controladores/OrdenTrabajo/SearchItemController.php',
            data: {
                producto: cod,
            },
            dataType: 'json',
            success: function(r) {
                $('#unidad_producto').val(r.data.unidadItem);
                $('#unidad_producto_precio').val(r.data.valor);
                $('#valor_producto').val('');
                $('#cantidad_producto').val('');
                console.log(r);
            },
            error: function(response) {
                $('#unidad_producto').val('');
                $('#valor_producto').val('');
                $('#unidad_producto_precio').val('');
                $('#cantidad_producto').val('');
            }
        });
    });
    
    $('#cantidad_producto').keyup(function() {
        var cant = $('#cantidad_producto').val();
        var val = $('#unidad_producto_precio').val();

        var dato = val * cant;
        $('#valor_producto').val(dato);

    });

    $('#agregarProducto').click(function() {
            var nombre = $('#producto').val();
            var cant = $('#cantidad_producto').val();
            var valorUni = $('#unidad_producto_precio').val();
            var unidad = $('#unidad_producto').val();
            var valorTotal = parseInt($('#valor_producto').val());

            var valor_final_producto = parseInt($('#valor_productos_final').val());

            valor_final_producto = valor_final_producto + valorTotal;

            $('#valor_productos_final').val(valor_final_producto);

            //Pintar la tabla 
            var fila = "<tr><td class='codigoproducto'>" + nombre +
                "</td><td>" + unidad +
                "</td><td>" + valorUni + "</td><td>" + cant +
                "</td><td class='sumaproducto'>" + valorTotal +
                "</td><td><button class='btn btn-danger' id='eliminarproducto'>Eliminar</button></td></tr>";



            var btn = document.createElement("TR");
            btn.innerHTML = fila;
            document.getElementById("tablita1").appendChild(btn);

            var datosFila = {};

            datosFila.nombre = nombre;
            datosFila.unidad = unidad;
            datosFila.valor_unidad = valorUni;
            datosFila.cantidad = cant;
            datosFila.valor_final = valorTotal;


            loteProductos.push(datosFila);
            console.log(datosFila);

            console.log(loteProductos);


            $('#producto').val('');
            $('#unidad_producto').val('');
            $('#valor_producto').val('');
            $('#unidad_producto_precio').val('');
            $('#cantidad_producto').val('');

        });

        $(document).on('click', '#eliminarproducto', function() {
            let codigoT;
            codigoT = $(this).parents('tr').find('.codigoproducto').text();

            let suma;
            suma = parseInt($(this).parents('tr').find('.sumaproducto').text());
            console.log(suma);

            var preciototal = $('#valor_productos_final').val();
            var preciototal = parseInt(preciototal);


            var precio_final = preciototal - suma;
            $('#valor_productos_final').val(precio_final);
            console.log(precio_final);



            $(this).closest('tr').remove();

            loteProductos = loteProductos.filter(materiaprima => materiaprima.nombre !== codigoT);
            console.log(loteProductos);
        });

        $('#terminar').click(function() {
            let loteP = JSON.stringify(loteProductos);
            $('#lote').val(loteP);
            $('#editarProducto').submit();
        });
});
</script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?>  