
<!-- Validacion de sesión va aqui  -->

<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../controladores/OrdenTrabajo/CapturarordentrabajoController.php'; ?>
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
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Ordenes de Trabajo</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class=" breadcrumb-right">
                <a href="orden-trabajo.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
            </div>
        </div>
    </div>
    <div class="content-body"><!-- Kick start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Orden de Trabajo N°: <span id="nOT"><?php echo $id?> </span></h4>
                        </div>
                        <div class="card-body">
                            <form id="capturaOrden" class="row" action="../../controladores/OrdenTrabajo/CreateordentrabajoController.php" method="POST">
                                <div class="col-md-4 col-12 ">
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title"><strong>Labor:</strong> <span id="nombre_labor"><?php echo $data['orden']->labor;?></span></p>
                                        <p class="invoice-date-title"><strong>Faena:</strong> <span id="nombre_faena"><?php echo $data['labor']->nombre_faena;?></span></p>
                                        <p class="invoice-date-title"><strong>Grupo:</strong> <span id="nombre_grupo"><?php echo $data['labor']->nombre_grupo;?></span></p>
                                        <p class="invoice-date-title"><strong>Lugar de Aplicación:</strong> <span id="lugarApl"><?php echo $data['areaAplicacion']->Lugar;?></span></p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 ">
                                    <div class="invoice-date-wrapper">
                                        <!-- <p class="invoice-date-title"><strong>Especie:</strong> <span></span></p>
                                        <p class="invoice-date-title"><strong>Variedad(*):</strong> <span></span></p>
                                        <p class="invoice-date-title"><strong>Combinación:</strong> <span></span></p> -->
                                        <p class="invoice-date-title"><strong>Campo:</strong> <span id="campo"><?php echo $data['orden']->campo;?></span></p>
                                        <p class="invoice-date-title"><strong>Centro Costo:</strong> <span id="cc"><?php echo $data['orden']->centroCosto;?></span></p>
                                        <p class="invoice-date-title"><strong>HásAfect:</strong> <span id="has_afect"><?php echo $data['orden']->CantidadMetrosHileraTotal;?> MT2</span></p>
                                        <p class="invoice-date-title"><strong>N° Hileras:</strong> <span id="n_hilera"><?php echo $data['orden']->cantidadHileraTotal;?></span></p>
                                    </div>
                                </div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-2 col-6">
                                    <div class="form-group">
                                        <label for="area-total">RUT</label>
                                        <input type="text" id="rut" name="rut" class="form-control" placeholder="Rut" required>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="area-total">Responsable</label>
                                        <input type="text" id="responsable" name="responsable" class="form-control" placeholder="Nombre Responsable" required>
                                    </div>
                                </div>
                                <div class="col-md-2 col-6 offset-md-5">
                                    <div class="form-group">
                                        <label for="area-total">Fecha</label>
                                        <input type="text" id="fecha" name="fecha" class="form-control" placeholder="Fecha" value="<?php echo date("Y-m-d")?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="area-total">Notas</label>
                                        <textarea type="text" id="nota" name="nota" class="form-control" placeholder="Ingrece Aqui Sus Notas" required></textarea>
                                    </div>
                                </div>
                                
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-5 col-6">
                                    <div class="form-group">
                                        <label for="area-total">Estado Fenológico</label>
                                        <select class="form-control" id="estado_fen" name="estado_fen">
                                            <option value="">---Seleccione Estado Fenológico---</option>
                                            <?php foreach ($data['estadoFenealogico'] as $item) { ?>
                                                <option value="<?php echo $item->nombre_estado;?>"><?php echo $item->nombre_estado;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-100 d-none d-md-block mt-2"></div>

                                <div class="col-md-9"><h3>Maquinárias</h3></div>
                                <div class="col-md-3 text-right">
                                    <a class="btn btn-success" href="../maquinaria/editmaquinaria.php?id=<?php echo $id; ?>" role="button">Modificar Maquinaria</a>
                                </div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-12 col-12">
                                    <section class="card-datatable">
                                        <table class="dt-responsive table">
                                            <thead>
                                                <tr>
                                                    <th>Máquinaria</th>
                                                    <th>Implemento</th>
                                                    <th>Capacidad Máquinaria</th>
                                                    <th>Hil Pot</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($data['maquinaria'] as $item) { ?>
                                                <tr>
                                                    <td><?php echo $item->maquinaria;?></td>
                                                    <td><?php echo $item->implemento;?></td>
                                                    <td><?php echo utf8_decode($item->valor) ?></td>
                                                    <td><?php echo utf8_decode($item->valorFinal) ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Máquinaria</th>
                                                    <th>Implemento</th>
                                                    <th>Capacidad Máquinaria</th>
                                                    <th>Hil Pot</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </section>
                                </div>

                                <div class="w-100 d-none d-md-block mt-2"></div>

                                <div class="col-md-9"><h3>Productos</h3></div>
                                <div class="col-md-3 text-right">
                                    <a class="btn btn-success" href="../productos/editproductos.php?id=<?php echo $id; ?>" role="button">Modificar Productos</a>
                                </div>
                                <div class="w-100 d-none d-md-block mt-3"></div>
                                
                                <div class="col-md-4 col-6">
                                    <div class="form-group">
                                        <label for="area-total">Descripción Producto</label>
                                        <select class="form-control" id="descripcionProducto" name="descripcionProducto">
                                            <option value="">---Seleccione Producto---</option>
                                            <?php foreach ($data['productosEje'] as $item) { ?>
                                                <option value="<?php echo $item->nombre;?>"><?php echo $item->nombre;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1 col-6">
                                    <div class="form-group">
                                        <label for="unidad">Unidad</label>
                                        <input type="text" id="unidad" name="unidad" class="form-control" placeholder="" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2 col-6">
                                    <div class="form-group">
                                        <label for="area-total">Dilución cada 100 ltrs</label>
                                        <input type="text" id="disolucion" name="disolucion" class="form-control" placeholder="" value="0">
                                    </div>
                                </div>
                                <div class="col-md-1 col-6">
                                    <div class="form-group">
                                        <label for="area-total">Dosis por Há</label>
                                        <input type="text" id="dosis" name="dosis" class="form-control" placeholder="" value="0">
                                    </div>
                                </div>
                                <div class="col-md-1 col-6">
                                    <div class="form-group">
                                        <label for="area-total">TotalProd</label>
                                        <input type="text" id="totalProd" name="totalProd" class="form-control" placeholder="" value="0" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1 col-6">
                                    <div class="form-group">
                                        <label for="area-total">Saldo Stock</label>
                                        <input type="text" id="saldoStock" name="saldoStock" class="form-control" placeholder="" value="0" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2 col-6">
                                    <button type="button" class="btn btn-primary mt-2 btn-block" id="aggLote">Agregar</button>
                                </div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-12 col-12">
                                    <!-- <section class="card-datatable"> -->
                                        <table class=" table loteProductos">
                                            <thead>
                                                <tr>
                                                    <th>Descripción Producto</th>
                                                    <th>Unidad</th>
                                                    <th>Dilución cada 100 ltrs</th>
                                                    <th>Dosis por Há</th>
                                                    <th>TotalProd</th>
                                                    <th>Saldo Stock</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    <!-- </section> -->
                                </div>
                                <div class="w-100 d-none d-md-block mt-2"></div>

                                <div class="col-md-12"><h3>Mojamiento</h3></div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="area-total">Mojamiento</label>
                                        <input type="text" id="mojamiento" name="mojamiento" class="form-control" value="0" required>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="area-total">VolMin Boquillas</label>
                                        <input type="text" id="VolMinBoquillas" name="volminboquillas" class="form-control" value="0" required>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="area-total">Velo Sugerido</label>
                                        <input type="text" id="VeloSugerido" name="VeloSugerido" class="form-control" value="0" required>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="area-total">Ef</label>
                                        <input type="text" id="Ef" name="Ef" class="form-control" value="0" required>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="area-total">Hileras Estimadas</label>
                                        <input type="text" id="HilerasEstimadas" name="HilerasEstimadas" class="form-control" value="0" required>
                                    </div>
                                </div> 
                                
                                <div class="w-100 d-none d-md-block mt-2"></div>

                                <div class="col-md-12"><h3>Personal</h3></div>
                                <div class="w-100 d-none d-md-block mt-2"></div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="validationServer01">Tipo Personal:</label>
                                        <select class="form-control" id="" name="">
                                            <option value="">---Seleccione Tipo Personal---</option>
                                            <option value="">Colaborador</option>
                                            <option value="">Contratista</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="validationServer01">Nombre:</label>
                                        <select class="form-control" id="" name="">
                                            <option value="">---Seleccione---</option>
                                            <option value="">Juan</option>
                                            <option value="">Pedro</option>
                                            <option value="">Diego</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="validationServer01">NN:</label>
                                        <select class="form-control" id="" name="">
                                            <option value="">---Seleccione Tipo Personal---</option>
                                            <option value="">Faena Otoño Invierno</option>
                                            <option value="">Control Malesas Primavera Verano</option>
                                            <option value="">No Aplica</option>
                                        </select>
                                    </div>
                                </div> 

                                <div class="w-100 d-none d-md-block mt-4"></div>
                                <div class="col-md-12 text-right">
                                    <input type="hidden" name="nOT" value="<?php echo $id?>">
                                    <input type="hidden" id="productos" name="lotenew">
                                    <button type="button" id="terminar" class="btn float-right btn btn-primary ">Finalizar Captura</button>
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
    
    var lote = [];


    $('#aggLote').on('click', function() {

        var descripcionProducto = $('#descripcionProducto').val();
        var unidad = $('#unidad').val();
        var disolucion = $('#disolucion').val();
        var totalProd = $('#totalProd').val();
        var dosis = $('#dosis').val();
        var saldoStock = $('#saldoStock').val();

        let fila = "<tr><td class='codigoherramienta'>" + descripcionProducto +
                "</td><td>" + unidad +
                "</td><td>" + disolucion + "</td><td>" + dosis +
                "</td><td class='sumaherramienta'>" + totalProd + "</td><td> " + saldoStock +
                "</td><td><button class='btn btn-danger' id='eliminarherramienta'>Eliminar</button></td></tr>";

        $('.loteProductos tbody').append(fila);


        var datosFilas = {};
        datosFilas.descripcionProducto = descripcionProducto;
        datosFilas.unidad = unidad;
        datosFilas.disolucion = disolucion;
        datosFilas.totalProd = totalProd;
        datosFilas.dosis = dosis;
        datosFilas.saldoStock = saldoStock;

        lote.push(datosFilas);
        console.log(datosFilas);

        console.log(lote);


        $('#descripcionProducto').val('');
        $('#unidad').val('');
        $('#disolucion').val('');
        $('#totalProd').val('0');
        $('#dosis').val('');
        $('#saldoStock').val('0');
    });

    $('#descripcionProducto').change(function() {
        var producto = $('#descripcionProducto').val();
        $.ajax({
            type: 'POST',
            url: '../../controladores/OrdenTrabajo/SearchItemController.php',
            data: {
                producto: producto
            },
            dataType: 'json',
            success: function(response) {
                console.log(response.data);
                $('#unidad').val(response.data.unidadItem);
            },
            error: function(response) {
                console.log(response);
                $('#unidad').val('');
            }
        });
    });

    $('#terminar').click(function() {
        let lotenew = JSON.stringify(lote);
        $('#productos').val(lotenew);
        $('#capturaOrden').submit();
    });

});
</script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../layouts/finbody.php'; ?>  