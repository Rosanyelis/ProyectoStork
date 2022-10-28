<?php include '../../../controladores/validarSesionController.php' ?>
<?php
include "../../../modelos/conn.php";

date_default_timezone_set('America/Santiago');

$consultaCampo = sqlsrv_query($conn,("SELECT * FROM Campo" ));

$consultaGrupo = sqlsrv_query($conn,("SELECT * FROM Grupo" ));


?>
<!-- Fin de Controlador de listado  -->

<?php include '../../layouts/cabecera.php'; ?>
<?php include '../../layouts/estilos.php'; ?>

<!-- Incluir estilos css en caso de ser necesario  -->

<?php include '../../layouts/fincabecera.php'; ?>
<?php include '../../layouts/body.php'; ?>
<?php include '../../layouts/navigation.php'; ?>

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Tomar Labor y Centro Costo</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class=" breadcrumb-right">
                <!-- <a href="campos.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a> -->
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Kick start -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tomar Labor y Centro Costo</h4>
            </div>
            <div class="card-body">
                <div class="container-fluid" id="campo">
                    <br><br>
                    <form action="crear_presupuesto_cap.php" method="post">
                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-6 mb-3">

                                <label for="validationServer01">Seleccionar Campo:</label>
                                <select class="form-control" id="Campo" name="Campo">
                                    <option value="">---Seleccione Campo---</option>
                                    <?php while ($fila = sqlsrv_fetch_array($consultaCampo, SQLSRV_FETCH_ASSOC)) : ?>
                                    <option value="<?php echo $fila['id_Campo']; ?>">
                                        <?php echo utf8_decode($fila['nombre']) ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">

                                <label for="validationServer01">Seleccionar Centro Costo:</label>
                                <select class="form-control" id="centrocosto" name="centrocosto">
                                    <option value="">---Seleccione Centro Costo---</option>

                                </select>
                            </div>
                        </div>
                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-6 mb-3">
                                <br>
                                <br>
                                <br>
                                <label for="validationServer01">Seleccionar Grupo:</label>
                                <select class="form-control" id="grupo" name="grupo">
                                    <option value="">---Seleccione Grupo---</option>
                                    <?php while ($fila = sqlsrv_fetch_array($consultaGrupo, SQLSRV_FETCH_ASSOC)) : ?>
                                    <option value="<?php echo $fila['id_Grupo']; ?>">
                                        <?php echo utf8_decode($fila['nombre']) ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <br>
                                <br>
                                <br>
                                <label for="validationServer01">Seleccionar Labor:</label>
                                <select class="form-control" id="labor" name="labor">
                                    <option value="">---Seleccione Labor---</option>

                                </select>
                            </div>

                        </div>
                        <div class="row" id="bg">

                            <div class="col-md-5 mb-3">

                            </div>
                            <div class="col-md-4  mb-3">
                                <br>
                                <button type="submit" class=" btn btn-primary btn-lg">Capturar
                                </button>
                                <p><br></p>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

<?php include '../../layouts/footer.php'; ?>
<?php include '../../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->
<script>
    $(document).ready(function() {

        $('#grupo').change(function() {
            var grupo = $('#grupo').val();
            $.ajax({
                type: 'POST',
                url: '../../../controladores/presupuesto/SearchLaborController.php',
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
        })

        $('#Campo').change(function() {
            var campo = $('#Campo').val();
            $.ajax({
                type: 'POST',
                url: '../../../controladores/presupuesto/SearchCentroCostoController.php',
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

    })
</script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?>   

