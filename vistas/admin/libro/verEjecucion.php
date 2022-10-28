<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<?php
include "../../../modelos/conn.php";

date_default_timezone_set('America/Santiago');

$id = $_GET["ID"];

$valorProd =0;
$valorHerr =0;

$consultaEjecucion = sqlsrv_query($conn,("SELECT * FROM Presupuesto WHERE id_presupuesto = '$id'" ));
while ($fila = sqlsrv_fetch_array($consultaEjecucion, SQLSRV_FETCH_ASSOC)) {
    $labor = $fila['labor'];
    $aplicacion = $fila['lugarAplicacion'];
    $campo = $fila['campo'];
    $cc = $fila['centroCosto'];
    $cantMetros = $fila['CantidadMetrosHileraTotal'];
    $cantHilera = $fila['cantidadHileraTotal']; 
    $cantArboles = $fila['cantidadArbolesTotal']; 
    $cantidadPersona = $fila['cantidadPersona'];
    $precioPersona = $fila['precioPersona'];
    $valorFinalPersonal = $fila['valorFinalPersonal'];
    $fechaInicio = date_format($fila['fechaInicio'], 'd/m/Y');
    $fechaTermino = date_format($fila['fechaTermino'], 'd/m/Y');
    $fechaIngreso =  date_format($fila['fechaIngreso'], 'd/m/Y');
}

$consultaProductoEjecucion = sqlsrv_query($conn,("SELECT * FROM ProductoEjecucion  WHERE id_ejecucion = '$id'" ));
$consultaMaquinariaEjecucion = sqlsrv_query($conn,("SELECT * FROM HerramientaEjecucion WHERE id_ejecucion = '$id'" ));

$consultaMaquinaria = sqlsrv_query($conn,("SELECT * FROM Tipo_maquinaria" ));

$consultaImplemento = sqlsrv_query($conn,("SELECT * FROM Tipo_implemeto" ));

$consultaProductos = sqlsrv_query($conn,("SELECT * FROM item" ));

$c = sqlsrv_query($conn,("SELECT SUM(CAST(hileras_trabajadas AS int)) as total FROM laborEjecucion WHERE id_presupuesto = '$id'"));
$fila = sqlsrv_fetch_array($c, SQLSRV_FETCH_ASSOC);
$record = $fila['total'];
if($record != NULL){
    $total = $fila['total'];
}else{
    $total = 0;
}

?>
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
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Orden de Trabajo - Libro</h2>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <a href="listado.php" class="btn btn-primary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- Kick start -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ejecución</h4>
                </div>
                <div class="card-body">
                    <div class="container-fluid" id="campo">
                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-3 mb-3">
                                <label for="validationServer01">Fecha Inicio:</label>
                                <input type="text" id="fecha" name="fecha" class="form-control" placeholder=""
                                    value="<?php echo $fechaInicio; ?>" readonly> 
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationServer01">Fecha Termino:</label>
                                <input type="text" id="fecha" name="fecha" class="form-control" placeholder=""
                                    value="<?php echo $fechaTermino; ?>" readonly>
                            </div>
                            <div class="col-md-4 mb-3">

                            </div>
                            <div class="col-md-2">
                                <label for="validationServer01">Fecha Ingreso:</label>
                                <input type="text" id="fecha" name="fecha" class="form-control" placeholder=""
                                    value="<?php echo $fechaIngreso; ?>" readonly>
                            
                            </div>
                        </div>
                        <div class="row col-md-12" id="bg">
                            <input type="hidden" id="cantidadMetros" name="cantidadMetros" class="form-control"
                                placeholder="" value="<?php echo $metros; ?>" readonly>
                            <input type="hidden" id="cantidadHilera" name="cantidadHilera" class="form-control"
                                placeholder="" value="<?php echo $cantHilera; ?>" readonly>
                            <input type="hidden" id="cantidadArboles" name="cantidadArboles" class="form-control"
                                placeholder="" value="<?php echo $arboles; ?>" readonly>
                            <div class="col-md-4 mb-3">
                                <label for="validationServer01">Campo:</label>
                                <input type="text" id="Ncampo" name="Ncampo" class="form-control" placeholder=""
                                    value="<?php echo $campo; ?>" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServer01">Centro Costo:</label>
                                <input type="text" id="centroCosto" name="centroCosto" class="form-control" placeholder=""
                                    value="<?php echo $cc; ?>" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServer01">Labor:</label>
                                <input type="text" id="labor" name="labor" class="form-control" placeholder=""
                                    value="<?php echo $labor; ?>" readonly>
                            </div>

                        </div>

                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-3 mb-3">
                                <label for="validationServer01">Lugar Aplicación:</label>
                                <select class="form-control" id="aplicacion" name="aplicacion" readonly>
                                    <?php   
                                        if ($aplicacion == 1) {
                                            ?><option value="1">Camellón</option><?php
                                        }
                                        ?>
                                                    <?php   
                                        if ($aplicacion == 2) {
                                            ?><option value="2">Calle</option><?php
                                        }
                                        ?>
                                                    <?php   
                                        if ($aplicacion == 3) {
                                            ?>
                                                    <option value="3">Area Total</option><?php
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationServer01">Hil Afectadas:</label>
                                <input type="text" id="hileraAfectada" name="hileraAfectada" class="form-control"
                                    placeholder="" value="<?php echo $cantHilera; ?>" readonly>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationServer01">Hil Trabajadas:</label>
                                <input type="text" id="hileraAfectada" name="hileraAfectada" class="form-control"
                                    placeholder="" value="<?php echo $total;?>" readonly>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationServer01">Hil Restantes por Trabajar:</label>
                                <input type="text" id="hileraAfectada" name="hileraAfectada" class="form-control"
                                    placeholder="" value="<?php echo $cantHilera - $total;?>" readonly>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationServer01">Metros x Hil:</label>
                                <input type="text" id="metroHilera" name="metroHilera" class="form-control" placeholder=""
                                    value="<?php echo $cantMetros; ?>" readonly>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationServer01">Arboles x Hil:</label>
                                <input type="text" id="arbolHilera" name="arbolHilera" class="form-control" placeholder=""
                                    value="<?php echo $cantArboles; ?>" readonly>
                            </div>

                            <div class="row col-md-12 " id="bg">
                                <div class="col-md-4 mb-3">
                                    <h3 style="text-align:left">Listado Herramientas a Utilizar</h3>
                                </div>
                            </div>
                            <div class="row col-md-12 " id="bg">
                                <div class="col-md-12 mb-3">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="">Maquinaria</th>
                                                <th scope="col" class="table-light">Implemento</th>
                                                <th scope="col" class="table-light">KM/H</th>
                                                <th scope="col" class="table-light">Valor</th>
                                                <th scope="col" class="table-light">Valor Final</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablita1">
                                            <?php while ($fila = sqlsrv_fetch_array($consultaMaquinariaEjecucion, SQLSRV_FETCH_ASSOC)) : ?>
                                            <tr>
                                                <td scope="col"><?php echo utf8_decode($fila['maquinaria']) ?></td>
                                                <td><?php echo utf8_decode($fila['implemento']) ?></td>
                                                <td><?php echo utf8_decode($fila['kmH']) ?></td>
                                                <td><?php echo utf8_decode($fila['valor']) ?></td>
                                                <td><?php echo utf8_decode($fila['valorFinal']) ?></td>
                                            </tr>
                                            <?php 
                                    $val = $fila['valorFinal'];
                                    $valorHerr = $valorHerr + $val;
                                ?>

                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row col-md-12 mb-3">
                                <div class="col-md-4 mb-3">
                                    <h3 style="text-align:left">Listado Productos a Utilizar</h3>
                                </div>
                            </div>
                            <div class="row col-md-12 " id="bg">
                                <div class="col-md-12 mb-3">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="">Nombre</th>
                                                <th scope="col" class="table-light">Unidad</th>
                                                <th scope="col" class="table-light">Valor Unidad</th>
                                                <th scope="col" class="table-light">Cantidad</th>
                                                <th scope="col" class="table-light">Valor Final</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablita">
                                            <?php while ($fila = sqlsrv_fetch_array($consultaProductoEjecucion, SQLSRV_FETCH_ASSOC)) : ?>
                                            <tr>
                                                <td scope="col"><?php echo utf8_decode($fila['nombre']) ?></td>
                                                <td><?php echo utf8_decode($fila['unidad']) ?></td>
                                                <td><?php echo utf8_decode($fila['valorUnidad']) ?></td>
                                                <td><?php echo utf8_decode($fila['cantidad']) ?></td>
                                                <td><?php echo utf8_decode($fila['valorFinal']) ?></td>
                                            </tr>
                                            <?php 
                                    $val = $fila['valorFinal'];
                                    $valorProd = $valorProd + $val;
                                ?>

                                            <?php 
                                    endwhile; 
                                ?>
                                            <input type="hidden" id="valorProd" value="<?php echo $valorProd; ?>"
                                                name="valorProd">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row col-md-12 " id="bg">
                                <div class="col-md-2 mb-3">
                                    <h3 style="text-align:left">Colaboradores</h3>
                                </div>
                            </div>
                            <div class="row col-md-12 " id="bg">
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer01">Cantidad Personas:</label>
                                    <input type="number" id="c_personas" name="c_personas" class="form-control"
                                        placeholder="" value="<?php echo $cantidadPersona; ?>" readonly="true">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer01">Valor Personas:</label>
                                    <input type="number" id="v_personas" name="v_personas" class="form-control"
                                        placeholder="" value="<?php echo $precioPersona; ?>" readonly="true">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer01">Valor Final Personas:</label>
                                    <input type="number" id="vf_personas" name="vf_personas" class="form-control"
                                        placeholder="" value="<?php echo $valorFinalPersonal; ?>" readonly="true">
                                </div>
                            </div>

                            <div class="row col-md-12 " id="bg">
                                <div class="col-md-2 mb-3">
                                    <h3 style="text-align:left">SubTotales</h3>
                                </div>
                            </div>
                            <div class="row col-md-12 " id="bg">
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer01">Valor Herramientas:</label>
                                    <input type="number" id="valor_herramientas_final" name="valor_herramientas_final"
                                        class="form-control" placeholder="" value="<?php echo $valorHerr; ?>"
                                        readonly="true">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer01">Valor Productos:</label>
                                    <input type="number" id="valor_productos_final" name="valor_productos_final"
                                        class="form-control" placeholder="" value="<?php echo $valorProd; ?>"
                                        readonly="true">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer01">Valor Personas:</label>
                                    <input type="number" id="valor_personas_final" name="valor_personas_final"
                                        class="form-control" placeholder="" value="<?php echo $valorFinalPersonal; ?>"
                                        readonly="true">
                                </div>
                            </div>
                            <div class="row col-md-12 " id="bg">
                                <div class="col-md-2 mb-3">
                                    <h3 style="text-align:left">Valorizado</h3>
                                </div>
                            </div>
                            <div class="row col-md-12 " id="bg">
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer01">Valor Total:</label>
                                    <input type="number" id="valorFinish" name="valorFinish" class="form-control"
                                        placeholder="" value="<?php echo $valorFinal; ?>" readonly="true">
                                </div>
                            </div>
                        </div>


                        <div class="row col-md-12 " id="bg">
                            <div class="row col-md-12 " id="bg">
                                <div class="col-md-5 mb-3">
                                    <br>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <br><br>
                                    <a href="listado.php" class="btn btn-primary btn-block">Volver</a>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--/ Kick start -->

        </div>
        
    </div>
    <!-- END: Content-->

<?php include '../../layouts/footer.php'; ?>
<?php include '../../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->
<script>
    $(document).ready(function() {
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

    });
</script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?> 