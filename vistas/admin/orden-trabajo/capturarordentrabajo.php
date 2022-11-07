
<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../../controladores/OrdenTrabajo/VerordentrabajoController.php'; ?>
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
                    <h2 class="content-header-title float-left mb-0">Ordenes de Trabajo - Asignación de Trabajo Diario</h2>
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
                            <form id="capturaOrden" class="row" action="../../../controladores/OrdenTrabajo/AgregarOrdenTrabajoController.php?id=<?php echo $id?>" method="POST">
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
                                        <p class="invoice-date-title"><strong>HásAfect:</strong> <span id="has_afect"><?php echo $data['orden']->cantidadAreaTotal;?> MT2</span></p>
                                        <p class="invoice-date-title"><strong>N° Hileras:</strong> <span id="n_hilera"><?php echo $data['orden']->cantidadHileraTotal;?></span></p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 ">
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title"><strong>Responsable de Labor:</strong> <span><?php echo $data['responsable']->nombre;?> <?php echo $data['responsable']->apellido;?></span></p>
                                        <p class="invoice-date-title"><strong>Fecha Actual:</strong> <span><?php date_default_timezone_set('America/Santiago'); echo date("Y-m-d")?></span></p>
                                        
                                    </div>
                                </div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="area-total">Notas</label>
                                        <textarea type="text" id="nota" name="nota" class="form-control" placeholder="Ingrece Aqui Sus Notas" required></textarea>
                                    </div>
                                </div>
                                
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <?php if (!$data['orden']->estado_fenealogico) { ?>
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
                                <?php }  ?>
                                <?php if ($data['orden']->estado_fenealogico) { ?>
                                    <input type="hidden" name="estado_fen" value="">
                                <?php }  ?>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="area-total">Hileras Totales por Trabajar</label>
                                        <input type="text" id="hileras_totales" name="hileras_totales" class="form-control" placeholder="" value="<?php echo $data['orden']->cantidadHileraTotal - $data['total'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="area-total">Hileras a Trabajar</label>
                                        <input type="text" id="hileras_trabajadas" name="hileras_trabajadas" class="form-control" value="0" required>
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="area-total">Mojamiento</label>
                                        <input type="text" id="mojamiento" name="mojamiento" class="form-control" value="0" required>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="area-total">VolMin Boquillas</label>
                                        <input type="text" id="VolMinBoquillas" name="volminboquillas" class="form-control" value="0">
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="area-total">Velo Sugerido</label>
                                        <input type="text" id="VeloSugerido" name="VeloSugerido" class="form-control" value="0">
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="area-total">Ef</label>
                                        <input type="text" id="Ef" name="Ef" class="form-control" value="0">
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="area-total">Hileras Estimadas</label>
                                        <input type="text" id="HilerasEstimadas" name="HilerasEstimadas" class="form-control" value="0">
                                    </div>
                                </div> 
                                <div class="col-md-2 col-6">
                                    <button type="button" class="btn btn-primary mt-2 btn-block" id="aggLote">Agregar</button>
                                </div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-12 col-12">
                                    <!-- <section class="card-datatable"> -->
                                        <table class=" table loteProductos table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Unidad</th>
                                                    <th>Dilución/ 100ltrs</th>
                                                    <th>Dosis/ Há</th>
                                                    <th>Total</th>
                                                    <th>Saldo Stock</th>
                                                    <th>Moj.</th>
                                                    <th>Vol.Min Boq.</th>
                                                    <th>Velo Sug.</th>
                                                    <th>Ef</th>
                                                    <th>Hil. Est.</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    <!-- </section> -->
                                </div>
                                <div class="w-100 d-none d-md-block mt-4"></div>
                                
                                <!-- <div class="w-100 d-none d-md-block mt-2"></div> -->

                                <div class="col-md-12"><h3>Personal</h3></div>
                                <div class="w-100 d-none d-md-block mt-2"></div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="validationServer01">Tipo Personal:</label>
                                        <select class="form-control" id="tipoPersonal" name="tipo_personal">
                                            <option value="">---Seleccione Tipo Personal---</option>
                                            <option value="colaborador">Colaborador</option>
                                            <option value="contratista">Contratista</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="validationServer01">Cantidad de Personal:</label>
                                        <input type="text" id="cant_personal" name="cantidad_personal" class="form-control">
                                    </div>
                                </div> 
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-12"><h3>Asignación de Maquinaria a Personal</h3></div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="validationServer01">Nombre Personal</label>
                                        <select class="form-control" id="Personal">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4" id="divTrato">
                                    <div class="form-group">
                                        <label for="validationServer01">Tipo de Trato</label>
                                        <select class="form-control" id="trato">
                                            
                                        </select>
                                    </div>
                                </div>   
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="validationServer01">Tipo de Jornada</label>
                                        <select class="form-control" id="tipo_jornada">
                                            <option>Seleccione la Jornada</option>
                                            <option value="Completa">Completa</option>
                                            <option value="Parcial">Parcial</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-4" id="divHorario">
                                    <div class="form-group">
                                        <label for="validationServer01">Horario</label>
                                        <input type="text" id="horario_parcial" name="horario_parcial" class="form-control"
                                        placeholder="8:00 AM a 12:00 PM">
                                    </div>
                                </div>
                                <div class="col-md-4" id="divCantHora">
                                    <div class="form-group">
                                        <label for="validationServer01">Total de Horas</label>
                                        <input type="text" id="cant_h" name="cant_h" class="form-control"
                                        placeholder="4">
                                    </div>
                                </div>  
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="validationServer01">¿Utiliza Maquinárias/Implemento?</label>
                                        <div class="demo-inline-spacing mt-0 pt-0">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
                                                <label class="custom-control-label" for="customRadio1">Si</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-md-4" id="selectMaquinaria">
                                    <div class="form-group">
                                        <label for="validationServer01">Maquinaria</label>
                                        <select class="form-control" id="Maquinaria">
                                            <option value="">---Seleccione Maquinaria---</option>
                                            <?php foreach ($data['tipoMaquinaria'] as $item) { ?>
                                                <option value="<?php echo $item->n_maquinaria;?>"><?php echo $item->n_maquinaria;?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="text" id="MaquinariaInput"  class="form-control" value="N/A" readonly>
                                    </div>
                                </div> 
                                <div class="col-md-4" id="selectImplemento">
                                    <div class="form-group">
                                        <label for="validationServer01">Implemento</label>
                                        <select class="form-control" id="Implemento">
                                            <option value="">---Seleccione Implemento ---</option>
                                            <?php foreach ($data['implementos'] as $item) { ?>
                                                <option value="<?php echo $item->c_implemento;?> - <?php echo $item->n_implemento;?>"><?php echo $item->c_implemento;?> - <?php echo $item->n_implemento;?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="text" id="ImplementoInput"  class="form-control" value="N/A" readonly>
                                    </div>
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="validationServer01">Mojamiento</label>
                                        <input type="text" id="mojamientom" name="mojamientom" class="form-control" placeholder="Mojamiento">
                                    </div>
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="validationServer01">Litraje</label>
                                        <input type="text" id="Litraje" name="Litraje" class="form-control" placeholder="Litraje">
                                    </div>
                                </div> 
                                <div class="col-md-4">
                                    <button type="button" id="aggPersonal" class="btn btn-primary mt-2">Agregar</button>
                                </div> 
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-12 col-12">
                                    <!-- <section class="card-datatable"> -->
                                        <table class=" table table-responsive lotePersonalMaquinaria">
                                            <thead>
                                                <tr>
                                                    <th>Personal / Contratista</th>
                                                    <th>Trato</th>
                                                    <th>Tipo Jornada</th>
                                                    <th>Horario</th>
                                                    <th>Cant.H</th>
                                                    <th>Maquinaria</th>
                                                    <th>Implemento</th>
                                                    <th>Mojamiento</th>
                                                    <th>Litraje</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    <!-- </section> -->
                                </div>

                                <div class="w-100 d-none d-md-block mt-4"></div>
                                <div class="col-md-12 text-right">
                                    <input type="hidden" id="productos" name="lotenew">
                                    <input type="hidden" id="lotepersonal" name="personal">
                                    <button type="button" id="terminar" class="btn float-right btn btn-primary ">Finalizar</button>
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
    
    var lote = [];
    var personalMaquinaria = [];


    $('#MaquinariaInput').hide(); 
    $('#ImplementoInput').hide();
    $('#divHorario').hide();
    $('#divTrato').hide();

    $('#aggLote').on('click', function() {

        var descripcionProducto     = $('#descripcionProducto').val();
        var unidad                  = $('#unidad').val();
        var disolucion              = $('#disolucion').val();
        var totalProd               = $('#totalProd').val();
        var dosis                   = $('#dosis').val();
        var saldoStock              = $('#saldoStock').val();
        var mojamiento              = $('#mojamiento').val();
        var VolMinBoquillas         = $('#VolMinBoquillas').val();
        var VeloSugerido            = $('#VeloSugerido').val();
        var Ef                      = $('#Ef').val();
        var HilerasEstimadas        = $('#HilerasEstimadas').val();

        let fila = "<tr><td class='codigoherramienta'>" + descripcionProducto + "</td><td>" + unidad + "</td><td>" 
                        + disolucion + "</td><td>" + dosis + "</td><td class='sumaherramienta'>" + totalProd + "</td><td> " + saldoStock +
                "</td><td>"+ mojamiento + "</td><td>" + VolMinBoquillas + "</td><td>" + VeloSugerido + "</td><td>" + Ef + "</td><td>"
                + HilerasEstimadas + "<td><button class='btn btn-danger' id='eliminarherramienta'>Eliminar</button></td></tr>";

        $('.loteProductos tbody').append(fila);

        var datosFilas = {};
        datosFilas.descripcionProducto = descripcionProducto;
        datosFilas.unidad = unidad;
        datosFilas.disolucion = disolucion;
        datosFilas.totalProd = totalProd;
        datosFilas.dosis = dosis;
        datosFilas.saldoStock = saldoStock;
        datosFilas.mojamiento = mojamiento;
        datosFilas.VolMinBoquillas = VolMinBoquillas;
        datosFilas.VeloSugerido = VeloSugerido;
        datosFilas.Ef = Ef;
        datosFilas.HilerasEstimadas = HilerasEstimadas;

        lote.push(datosFilas);
        console.log(datosFilas);

        console.log(lote);

        $('#descripcionProducto').val('');
        $('#unidad').val('');
        $('#disolucion').val('');
        $('#totalProd').val('0');
        $('#dosis').val('');
        $('#saldoStock').val('0');
        $('#mojamiento').val('');
        $('#VolMinBoquillas').val('');
        $('#VeloSugerido').val('');
        $('#Ef').val('');
        $('#HilerasEstimadas').val('');
    });

    $('#descripcionProducto').change(function() {
        var producto = $('#descripcionProducto').val();
        $.ajax({
            type: 'POST',
            url: '../../../controladores/OrdenTrabajo/SearchItemController.php',
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
    $('#tipoPersonal').change(function() {
        var personal = $('#tipoPersonal').val();
        if (personal == 'colaborador') {
            // $("#tipoPersonalB").empty().append("<option>Seleccione ...</option><option>Juan</option><option>Pedro</option><option>Diego</option>");
            
            $.ajax({
                type: 'POST',
                url: '../../../controladores/OrdenTrabajo/SearchColaboradorController.php',
                data: {},
                dataType: 'json',
                success: function(response) {
                    $("#Personal").empty().append(response.data);
                    $('#divTrato').hide();
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
        if (personal == 'contratista') {
            $.ajax({
                type: 'POST',
                url: '../../../controladores/OrdenTrabajo/SearchContratistaController.php',
                data: {},
                dataType: 'json',
                success: function(response) {
                    $("#Personal").empty().append(response.data);
                    $('#divTrato').show();
                    $.ajax({
                        type: 'POST',
                        url: '../../../controladores/OrdenTrabajo/SearchTratosController.php',
                        data: {},
                        dataType: 'json',
                        success: function(response) {
                            $("#trato").empty().append(response.data);
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                    
                },
                error: function(response) {
                    console.log(response);
                }
            });
            
        }
    });
    $('#tipo_jornada').change(function() {
        var jornada = $('#tipo_jornada').val();
        if (jornada == 'Completa') {
            $('#divHorario').hide();
            $('#divCantHora').show();
        }
        if (jornada == 'Parcial' ) {
            $('#divHorario').show();
            $('#divCantHora').show();
        }
    });   

    $('#customRadio1').on('click', function() {
        if($("#customRadio1").is(':checked')) {  
            $('#Maquinaria').show(); 
            $('#Implemento').show();
            $('#MaquinariaInput').hide(); 
            $('#ImplementoInput').hide(); 
            $('#mojamientom').val('').attr('readonly', false); 
            $('#Litraje').val('').attr('readonly', false);
        }
    });

    $('#customRadio2').on('click', function() {
        if($("#customRadio2").is(':checked')) {
            $('#Maquinaria').hide(); 
            $('#Implemento').hide(); 
            $('#MaquinariaInput').show(); 
            $('#ImplementoInput').show();
            $('#mojamientom').val('0').attr('readonly', true); 
            $('#Litraje').val('0').attr('readonly', true);
        }
    });

    $('#aggPersonal').on('click', function() {

        var Personal        = $('#Personal').val();
        var trato           = $('#trato').val();
        var tipo_jornada    = $('#tipo_jornada').val();
        var cant_h          = $('#cant_h').val();
        var mojamientom     = $('#mojamientom').val();
        var Litraje         = $('#Litraje').val();
        var horario         = $('#horario_parcial').val();
        var Maquinaria      = $('#Maquinaria').val();
        var Implemento      = $('#Implemento').val();

        if (horario == 'Seleccione Horario') { horario  = '8:00am a 6:00pm'; }
        if (!trato) { trato  = 'N/A'; }
        if (!Maquinaria) { Maquinaria  = $('#MaquinariaInput').val(); }
        if (!Implemento) { Implemento  = $('#ImplementoInput').val(); }
        
        let fila = "<tr><td>" + Personal + "</td><td>" + trato + "</td><td>" + tipo_jornada + "</td><td>" + horario + "</td><td>" + cant_h +"</td><td>" + Maquinaria + "</td><td>" + Implemento + "</td><td>" + mojamientom +
                "</td><td>" + Litraje + "</td></td><td><button class='btn btn-danger' id='eliminarPersonal'>Eliminar</button></td></tr>";

        $('.lotePersonalMaquinaria tbody').append(fila);


        var datosFilas = {};
        datosFilas.Personal     = Personal;
        datosFilas.trato        = trato;
        datosFilas.tipo_jornada = tipo_jornada;
        datosFilas.cant_h       = cant_h;
        datosFilas.horario      = horario;
        datosFilas.Maquinaria   = Maquinaria;
        datosFilas.Implemento   = Implemento;
        datosFilas.mojamientom  = mojamientom;
        datosFilas.Litraje      = Litraje;

        personalMaquinaria.push(datosFilas);
        console.log(datosFilas);

        console.log(personalMaquinaria);


        $('#Personal').val('');
        $('#trato').hide().val('');
        $('#Maquinaria').show().val('');
        $('#Implemento').show().val('');
        $('#MaquinariaInput').hide(); 
        $('#ImplementoInput').hide(); 
        $('#tipo_jornada').val('');
        $('#divHorario').hide();
        $('#horario_parcial').val('');
        $('#mojamientom').val('').attr('readonly', false);
        $('#Litraje').val('').attr('readonly', false);
    });

    $('#terminar').click(function() {
        let lotenew = JSON.stringify(lote);
        let lotePersonal = JSON.stringify(personalMaquinaria);
        $('#productos').val(lotenew);
        $('#lotepersonal').val(lotePersonal);
        $('#capturaOrden').submit();
    });

});
</script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?>  