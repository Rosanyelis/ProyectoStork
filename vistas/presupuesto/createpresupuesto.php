
<!-- Validacion de sesión va aqui  -->

<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../controladores/Presupuesto/ListargrupospresupuestoController.php'; ?>
<!-- Fin de Controlador de listado  -->

<?php include '../layouts/cabecera.php'; ?>
<?php include '../layouts/estilos.php'; ?>

<!-- Incluir estilos css en caso de ser necesario  -->

<?php include '../layouts/fincabecera.php'; ?>
<?php include '../layouts/body.php'; ?>
<?php include '../layouts/navigation.php'; ?>

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
                            <h4 class="card-title">Nuevo Presupuesto</h4>
                        </div>
                        <div class="card-body">
                            <form id="aggfacturaform" class="form needs-validation " action="../../controladores/Facturas/CreatefacturaController.php" method="POST">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="implemento">Fecha Inicio:</label>
                                            <input type="date" id="fechaInicio" name="fechaInicio" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="implemento">Fecha Término:</label>
                                            <input type="date" id="fechaTermino" name="fechaTermino" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="w-100 d-none d-md-block mt-2"></div>
                                    <div class="col-md-12 col-12"><h5>Tomar Labor y Centro Costo</h5></div>
                                    <div class="w-100 d-none d-md-block mt-2"></div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="area-total">Seleccionar Campo:</label>
                                            <select class="form-control" id="Campo" name="Campo">
                                                <option value="">---Seleccione Campo---</option>
                                                <?php foreach ($data['campos'] as $item) {?>
                                                <option value="<?php echo $item->id_Campo; ?>">
                                                    <?php echo utf8_decode($item->nombre) ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="cantidad_cc">Seleccionar Centro Costo:</label>
                                            <select class="form-control" id="centrocosto" name="centrocosto">
                                                <option value="">---Seleccione Centro Costo---</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="promedio_cc">Grupo:</label>
                                            <select class="form-control" id="grupo" name="grupo">
                                                <option value="">---Seleccione Grupo---</option>
                                                <?php foreach ($data['grupos'] as $item) {?>
                                                <option value="<?php echo $item->id_Grupo; ?>">
                                                    <?php echo utf8_decode($item->nombre) ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="area-total">Seleccionar Labor:</label>
                                            <select class="form-control" id="labor" name="labor">
                                                <option value="">---Seleccione Labor---</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-100 d-none d-md-block mt-2"></div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="aplicacion">Lugar Aplicación:</label>
                                            <select class="form-control" id="aplicacion" name="aplicacion">
                                                <option value="4">---Seleccione Lugar---</option>
                                                <option value="1">Camellón</option>
                                                <option value="2">Calle</option>
                                                <option value="3">Area Total</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="hileraAfectada">Hil Afectadas:</label>
                                            <input type="text" id="hileraAfectada" name="hileraAfectada" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="metroHilera">Metros x Hil:</label>
                                            <input type="text" id="metroHilera" name="metroHilera" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="arbolHilera">Arboles x Hil:</label>
                                            <input type="text" id="arbolHilera" name="arbolHilera" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>

                                    <div class="w-100 d-none d-md-block mt-4"></div>
                                    <div class="col-md-12"><h4>Herramientas a Utilizar</h4></div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="maquinaria">Tipo Maquinaria:</label>
                                            <select class="form-control" id="maquinaria" name="maquinaria">
                                                <option value="">---Seleccione Maquinaria---</option>
                                                <?php foreach ($data['maquinaria'] as $item) { ?>
                                                    <option value="<?php echo $item->n_maquinaria;?>"><?php echo $item->n_maquinaria;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="implemento">Tipo Implemento:</label>
                                            <select class="form-control" id="implemento" name="implemento">
                                                <option value="">---Seleccione Implemento ---</option>
                                                <?php foreach ($data['implementos'] as $item) { ?>
                                                    <option value="<?php echo $item->n_maquinaria;?>"><?php echo $item->n_maquinaria;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="km">KM/H:</label>
                                            <input type="text" id="km" name="km" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="valor">Valor:</label>
                                            <input type="text" id="valor" name="valor" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="total">Total:</label>
                                            <input type="text" id="total" name="total" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <button type="button" id="agregarHerramientas" class="btn btn-primary mt-2">Agregar</button>
                                    </div>
                                    <div class="w-100 d-none d-md-block mt-2"></div>
                                    <div class="col-md-12"><h4>Listado de Herramientas</h4></div>
                                    <div class="w-100 d-none d-md-block mt-2"></div>
                                    <div class="col-md-12 col-12">
                                        <!-- <section class="card-datatable"> -->
                                            <table class="table loteProductos">
                                                <thead>
                                                    <tr>
                                                        <th>Maquinaria</th>
                                                        <th>Implemento</th>
                                                        <th>KM/H</th>
                                                        <th>Valor</th>
                                                        <th>Valor Final</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablita">
                                                </tbody>
                                            </table>
                                        <!-- </section> -->
                                    </div>
                                    <div class="w-100 d-none d-md-block mt-4"></div>
                                    <div class="col-md-12"><h4>Productos a Utilizar</h4></div>
                                    <div class="col-md-5">
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
                                            <input type="hidden" id="unidad_producto_precio" name="unidad_producto_precio" class="form-control" placeholder="" value="0" readonly>
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
                                                
                                                </tbody>
                                            </table>
                                        <!-- </section> -->
                                    </div> 

                                    <div class="w-100 d-none d-md-block mt-4"></div>
                                    <div class="col-md-12"><h4>Contratista</h4></div>
                                    <div class="w-100 d-none d-md-block mt-2"></div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Valor">Cantidad Personas:</label>
                                            <input type="number" id="c_personas" name="c_personas" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Valor">Valor Personas:</label>
                                            <input type="number" id="v_personas" name="v_personas" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Valor">Valor Final Personas:</label>
                                            <input type="number" id="vf_personas" name="vf_personas" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="w-100 d-none d-md-block mt-4"></div>
                                    <div class="col-md-12"><h4>SubTotales</h4></div>
                                    <div class="w-100 d-none d-md-block mt-2"></div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="validationServer01">Valor Maquinaria:</label>
                                            <input type="number" id="valor_herramientas_final" name="valor_herramientas_final"
                                                class="form-control" placeholder="" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="validationServer01">Valor Productos:</label>
                                            <input type="number" id="valor_productos_final" name="valor_productos_final"
                                                class="form-control" placeholder="" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="validationServer01">Valor Contratista:</label>
                                            <input type="number" id="valor_personas_final" name="valor_personas_final"
                                                class="form-control" placeholder="" value="0">
                                        </div>
                                    </div>
                                    <div class="w-100 d-none d-md-block mt-4"></div>
                                    <div class="col-md-12"><h4>Valorizado</h4></div>
                                    <div class="w-100 d-none d-md-block mt-2"></div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="validationServer01">Valor Total:</label>
                                            <input type="number" id="valorFinish" name="valorFinish" class="form-control"
                                                placeholder="" value="0">
                                        </div>
                                    </div>
                                    <div class="col-12 text-right mt-3">
                                        <input id="productos" type="hidden" name="loteproductos">
                                        <button type="button" id="terminar" class="btn btn-primary">Terminar Presupuesto</button>
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

<?php include '../layouts/footer.php'; ?>
<?php include '../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->
<script>
$(window).on('load', function() {
    'use strict';

    var loteProductos = [];
    var loteHerramientas = [];
        
    $('#Campo').change(function() {
        var campo = $('#Campo').val();
        $.ajax({
            type: 'POST',
            url: '../../controladores/presupuesto/SearchCentroCostoController.php',
            data: {
                campo: campo,
            },
            dataType: 'json',
            success: function(r) {
                $('#centrocosto').html(r.data);
            },
            error: function(response) {
                console.log(response);
            }
        });
    });

    $('#grupo').change(function() {
        var grupo = $('#grupo').val();
        $.ajax({
            type: 'POST',
            url: '../../controladores/presupuesto/SearchLaborController.php',
            data: {
                grupo: grupo,
            },
            dataType: 'json',
            success: function(r) {
                $('#labor').html(r.data);
            },
            error: function(response) {
                console.log(response);
            }
        });
    });

    $('#producto').change(function() {
        var cod = $('#producto').val();
        $.ajax({
            type: 'POST',
            url: '../../controladores/productos/SearchitemController.php',
            data: {
                producto: cod,
            },
            dataType: 'json',
            success: function(r) {
                $('#unidad_producto').val(r.data.unidad);
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

        var dato = cant * val;
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

        $('#agregarHerramientas').click(function() {
            var maquinaria = $('#maquinaria').val();
            var implemento = $('#implemento').val();
            var km = $('#km').val();
            var valor = $('#valor').val();
            var valorTotal = parseInt($('#total').val());

            var valor_final_producto = parseInt($('#valor_herramientas_final').val());

            valor_final_producto = valor_final_producto + valorTotal;

            $('#valor_herramientas_final').val(valor_final_producto);

            //Pintar la tabla 
            var fila = "<tr><td class='codigoherramienta'>" + maquinaria +
                "</td><td>" + implemento +
                "</td><td>" + km + "</td><td>" + valor +
                "</td><td class='sumaherramienta'>" + valorTotal +
                "</td><td><button class='btn btn-danger' id='eliminarherramienta'>Eliminar</button></td></tr>";



            var btn = document.createElement("TR");
            btn.innerHTML = fila;
            document.getElementById("tablita").appendChild(btn);

            var datosFilas = {};

            datosFilas.maquinaria = maquinaria;
            datosFilas.implemento = implemento;
            datosFilas.km = km;
            datosFilas.valor = valor;
            datosFilas.valorTotal = valorTotal;


            loteHerramientas.push(datosFilas);
            console.log(datosFilas);

            console.log(loteHerramientas);


            $('#maquinaria').val('');
            $('#implemento').val('');
            $('#km').val('');
            $('#valor').val('');
            $('#total').val('');

        });
        $(document).on('click', '#eliminarherramienta', function() {
            let codigoT;
            codigoT = $(this).parents('tr').find('.codigoherramienta').text();

            let suma;
            suma = parseInt($(this).parents('tr').find('.sumaherramienta').text());
            console.log(suma);

            var preciototal = $('#valor_herramientas_final').val();
            var preciototal = parseInt(preciototal);


            var precio_final = preciototal - suma;
            $('#valor_herramientas_final').val(precio_final);
            console.log(precio_final);



            $(this).closest('tr').remove();

            loteProductos = loteProductos.filter(materiaprima => materiaprima.maquinaria !==
                codigoT);
            console.log(loteProductos);
        });
        $('#v_personas').keyup(function() {
        var cant = $('#c_personas').val();
        var val = $('#v_personas').val();

        var dato = cant * val;
        $('#vf_personas').val(dato);

        $('#valor_personas_final').val(dato);

    })

    //actualizar precio final

    function PrecioFinal() {
        var p = parseInt($('#valor_personas_final').val());
        var h = parseInt($('#valor_herramientas_final').val());
        var pro = parseInt($('#valor_productos_final').val());

        var r = p + h + pro;
        $('#valorFinish').val(r);
    }


    //actualizar precio final cada 1 segundo
    setInterval(PrecioFinal, 1000);


    //area aplicacion
    $('#aplicacion').change(function() {
        var cod = $('#aplicacion').val();
        var metros = $('#cantidadMetros').val();
        var hileras = $('#cantidadHilera').val();
        var arboles = $('#cantidadArboles').val();
        if (cod == 4) {
            $('#arbolHilera').val('');
            $('#metroHilera').val('');
            $('#hileraAfectada').val('');
        } else {
            if (cod == 2) {
                $('#arbolHilera').val(0);
                $('#metroHilera').val(0);
                $('#hileraAfectada').val(0);
            } else {

                $('#arbolHilera').val(arboles);
                $('#metroHilera').val(metros);
                $('#hileraAfectada').val(hileras);
            }
        }

    })

    
    $('#enviar').on('click', function() {
        let lote = JSON.stringify(loteProductos);
        $('#productos').val(lote);
        $('#aggfacturaform').submit();
        
    });
});
</script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../layouts/finbody.php'; ?> 
