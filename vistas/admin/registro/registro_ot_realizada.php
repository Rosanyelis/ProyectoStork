<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<?php

include("../../../modelos/conn.php");

date_default_timezone_set("America/Santiago");

$ID =$_GET['ID'];




$consultaAOT = sqlsrv_query($conn,("SELECT * FROM AsignacionTrabajo WHERE n_aot = '$ID'" ));
while ($fila = sqlsrv_fetch_array($consultaAOT,SQLSRV_FETCH_ASSOC)) {
    $n_aot = $fila['n_aot'];
    $n_ot = $fila['n_ot'];
    $fecha_aot = $fila['fecha_aot']->format('Y-m-d');
    $fechaOt = $fila['fechaOt']->format('Y-m-d');
    $responsable =$fila['responsable'];
    $hilerasDisponibles =$fila['hilerasDisponibles'];
}

$consultaVac1 = sqlsrv_query($conn,("SELECT * FROM Ejecucion WHERE id_ejecucion = '$ID'" ));
while ($fila = sqlsrv_fetch_array($consultaVac1,SQLSRV_FETCH_ASSOC)) {
   
    $labor = $fila['labor'];
    $centroCosto = $fila['centroCosto'];
    $cantMetros = $fila['CantidadMetrosHileraTotal'];
    $cantHilera = $fila['cantidadHileraTotal'];
}

$consulta2 = sqlsrv_query($conn,("SELECT * FROM CentroCosto WHERE nombre = '$centroCosto'" ));
while ($fila = sqlsrv_fetch_array($consulta2,SQLSRV_FETCH_ASSOC)) {
    $nombre_especie = $fila['nombre_especie'];
    $nombre_variedad = $fila['nombre_variedad'];
    $nombre_combinacion = $fila['nombre_combinacion'];
}

$consulta = sqlsrv_query($conn,("SELECT * FROM OrdenTrabajo WHERE numOt = '$ID'" ));
while ($fila = sqlsrv_fetch_array($consulta,SQLSRV_FETCH_ASSOC)) {
    $responsable = $fila['responsable'];
    $fecha = $fila['fecha']->format('Y-m-d');
    $Ef = $fila['Ef'];
    $estado_fen = $fila['estado_fen'];


    $mojamiento =$fila['Mojamiento'];
}

$consultaLabor = sqlsrv_query($conn,("SELECT * FROM Grupo_faena WHERE nombre_labor = '$labor'"));
while ($fila1 = sqlsrv_fetch_array($consultaLabor, SQLSRV_FETCH_ASSOC)) {
    $grupo = $fila1['nombre_grupo'];
    $faena = $fila1['nombre_faena'];
}


$consultaLoteAsignacionTrabajo = sqlsrv_query($conn,("SELECT * FROM LoteAsignacionTrabajo WHERE id_loteAsignacion = '$ID'" ));

$consultaLoteRegistro = sqlsrv_query($conn,("SELECT * FROM LoteRegistroEjecucion WHERE id_ejecucion = '$ID'" ));

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
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Orden de Trabajo - Registro De Trabajo</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                <a href="registro_ot_id.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <!-- Kick start -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Registro</h4>
            </div>
            <div class="card-body">

                <div class="container-fluid" id="campo">
                    <p><br><br></p>


                    <div class="row col-md-12 ">
                        <div class="col-md-1 mb-3">
                            <label for="validationServer01">NºOT:</label>
                            <input type="text" id="nOT" name="nOT" class="form-control" placeholder=""
                                value="<?php echo $n_ot?>" readonly>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Fecha:</label>
                            <input type="text" id="responsable" name="responsable" class="form-control" placeholder=""
                                value="<?php echo $fechaOt?>" readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Responsable:</label>
                            <input type="text" id="responsable" name="responsable" class="form-control" placeholder=""
                                value="<?php echo $responsable?>" readonly>
                        </div>
                        <div class="col-md-1 mb-3">
                            <label for="validationServer01">NºAOT:</label>
                            <input type="text" id="n_aot" name="n_aot" class="form-control" placeholder=""
                                value="<?php echo $n_aot?>" readonly>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Fecha AOT:</label>
                            <input type="text" id="responsable" name="responsable" class="form-control" placeholder=""
                                value="<?php echo $fecha_aot?>" readonly>
                        </div>
                        <div class="col-md-1 mb-3">
                            <label for="validationServer01">NºROTR:</label>
                            <input type="text" id="responsable" name="responsable" class="form-control" placeholder=""
                                value="<?php echo $ID?>" readonly>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Fecha ROTR:</label>
                            <input type="text" id="fecha_rotr" name="fecha_rotr" class="form-control" placeholder="e"
                                value="<?php echo date("Y-m-d")?>" readonly>
                        </div>

                        <div class="col-md-12 mb-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Labor</th>
                                        <th>Estado Fenológico</th>
                                        <th>Nombre Especie</th>
                                        <th>Nombre Variedad(*)</th>
                                        <th>Nombre Combinación</th>
                                        <th>Faena</th>
                                        <th>Grupo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th><?php echo $labor?></th>
                                        <td><?php echo $estado_fen?></td>
                                        <td><?php echo $nombre_especie?></td>
                                        <td><?php echo $nombre_variedad?></td>
                                        <td><?php echo $nombre_combinacion?></td>
                                        <td><?php echo $faena?></td>
                                        <td><?php echo $grupo?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row col-md-12 ">
                            <div class="col-md-6 mb-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Colaboradores</th>
                                            <th>Maquinaria</th>
                                            <th>Implemento</th>
                                    </thead>
                                    <tbody>
                                        <?php while ($fila = sqlsrv_fetch_array($consultaLoteAsignacionTrabajo, SQLSRV_FETCH_ASSOC)) : ?>
                                        <tr>
                                            <th><?php echo utf8_decode($fila['colaborador']) ?></th>
                                            <th><?php echo utf8_decode($fila['maquinaria']) ?></th>
                                            <th><?php echo utf8_decode($fila['implemento']) ?></th>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-6 mb-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Mojamiento</th>
                                            <th>Litros</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>mojamiento 01</th>
                                            <th>2,000</th>
                                        </tr>
                                        <tr>
                                            <th>mojamiento 02</th>
                                            <th>2,000</th>
                                        </tr>
                                        <tr>
                                            <th>mojamiento 03</th>
                                            <th>2,000</th>
                                        </tr>
                                        <tr>
                                            <th>mojamiento 04</th>
                                            <th>2,000</th>
                                        </tr>
                                        <tr>
                                            <th>mojamiento 05</th>
                                            <th>2,000</th>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 mb-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Mojamiento</th>
                                            <th class="table-light">Litros</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>mojamiento 06</th>
                                            <th>2,000</th>
                                        </tr>
                                        <tr>
                                            <th>mojamiento 07</th>
                                            <th>2,000</th>
                                        </tr>
                                        <tr>
                                            <th>mojamiento 08</th>
                                            <th>2,000</th>
                                        </tr>
                                        <tr>
                                            <th>mojamiento 09</th>
                                            <th>2,000</th>
                                        </tr>
                                        <tr>
                                            <th>mojamiento 10</th>
                                            <th>2,000</th>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 mb-3">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>hás Trabajadas</th>
                                            <th>17.9</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Total Mojamiento</th>
                                            <th>4.000</th>
                                        </tr>
                                        <tr>
                                            <th>Mojamiento por há</th>
                                            <th>223</th>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <form action="agregar_registro_ejecucion.php" method="post">
                            <div class="row col-md-12 ">
                                <div class="col-md-4 mb-3">
                                    <h3>Actualizar Ejecución</h3>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2 mb-3">
                                    <label for="validationServer01">Fecha Ejecución:</label>
                                    <input type="text" id="FechaEjecucion" name="FechaEjecucion" class="form-control"
                                        placeholder="" value="<?php echo date("Y-m-d")?>" readonly>
                                    <input type="hidden" id="nOT" name="nOT" class="form-control" placeholder=""
                                        value="<?php echo $n_ot?>" readonly>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationServer01">Nombre Responsable:</label>
                                    <input type="text" id="Responsable" name="Responsable" class="form-control"
                                        placeholder="" value="">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationServer01">Hileras Pendientes:</label>
                                    <input type="text" id="Pendientes" name="Pendientes" class="form-control"
                                        placeholder="" value="<?php echo $hilerasDisponibles; ?>" readonly>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationServer01">Hileras Ejecutadas:</label>
                                    <input type="text" id="Ejecutadas" name="Ejecutadas" class="form-control"
                                        placeholder="" value="">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <br>
                                    <input type="submit" value="Agregar Registro"
                                        class="btn float-right btn btn-success">
                                </div>
                            </div>

                        </form>


                        <div class="col-md-12 mb-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Fecha Ejecución</th>
                                        <th>Responsable</th>
                                        <th>Hileras En Stock</th>
                                        <th>Hileras Ejecutadas</th>
                                </thead>
                                <tbody>
                                    <?php while ($fila = sqlsrv_fetch_array($consultaLoteRegistro, SQLSRV_FETCH_ASSOC)) : ?>
                                    <tr>
                                        <th><?php echo utf8_decode($fila['id_ejecucion']) ?></th>
                                        <th><?php echo $fila['fechaAvance']->format('Y-m-d'); ?>
                                        </th>
                                        <th><?php echo utf8_decode($fila['responsable']) ?></th>
                                        <th><?php echo utf8_decode($fila['pendientes']) ?></th>
                                        <th><?php echo utf8_decode($fila['ejecutadas']) ?></th>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>


                        <!-- <div class="col-md-12">
                    <br><br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="table-light">Nº OT</th>
                                <th scope="col" class="table-light">Cod Int</th>
                                <th scope="col" class="table-light">Descripción Item</th>
                                <th scope="col" class="table-light">Cód Item</th>
                                <th scope="col" class="table-light">Unidad Item</th>
                                <th scope="col" class="table-light">Dilución cada 100 lts</th>
                                <th scope="col" class="table-light">Dosis por Há</th>
                                <th scope="col" class="table-light">TotalProd.</th>
                                <th scope="col" class="table-light">Saldo Stock</th>
                                <th scope="col" class="table-light">Mojamiento</th>
                                <th scope="col" class="table-light">Hileras seleccionadas</th>
                                <th scope="col" class="table-light">Hás</th>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="table-light"></th>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
                        <div class="row col-md-12 ">
                            <br>
                            <a href="registro_ot_id.php" class="btn float-right btn btn-primary btn-lg">Volver A
                                Registrar</a>
                            <p><br></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--/ Kick start -->

    </div>


<?php include '../../layouts/footer.php'; ?>
<?php include '../../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->

<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?>