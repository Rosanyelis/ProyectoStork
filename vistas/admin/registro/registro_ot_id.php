<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<?php

include("../../../modelos/conn.php");


$estado = 'registro';
$estado1 = 'en curso';

$consultaPresupuesto1 = sqlsrv_query($conn,("SELECT * FROM Ejecucion WHERE estado = '$estado1'" ));

$consultaPresupuesto = sqlsrv_query($conn,("SELECT * FROM Ejecucion WHERE estado = '$estado'" ));

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
                        <h2 class="content-header-title float-left mb-0">Orden de Trabajo - Registro De Trabajo</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                    <a href="../orden-trabajo/orden-trabajo.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <!-- Kick start -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listado Registro De Trabajo</h4>
            </div>
            <div class="card-datatable">
                <table class="dt-responsive table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha Ingreso</th>
                            <th>Campo</th>
                            <th>Centro Costo</th>
                            <th>Labor</th>
                            <th>Valor Total</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Termino</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = sqlsrv_fetch_array($consultaPresupuesto1, SQLSRV_FETCH_ASSOC)) : ?>
                        <tr>
                            <td><?php echo utf8_decode($fila['id_ejecucion']) ?></td>
                            <td><?php echo date_format($fila['fechaIngreso'], 'd/m/Y'); ?></td>
                            <td><?php echo utf8_decode($fila['campo']) ?></td>
                            <td><?php echo utf8_decode($fila['centroCosto']) ?></td>
                            <td><?php echo utf8_decode($fila['labor']) ?></td>
                            <td><?php echo number_format($fila['valorFinal']) ?></td>
                            <td><?php echo date_format($fila['fechaInicio'], 'd/m/Y'); ?></td>
                            <td><?php echo date_format($fila['fechaTermino'], 'd/m/Y'); ?></td>
                            <td><?php echo utf8_decode($fila['estado']); ?></td>
                            <td><a class="btn btn-primary" name="<?php echo $fila['id_ejecucion']; ?>"
                                    id="<?php echo $fila['id_ejecucion']; ?>"
                                    href="registro_ot_realizada.php?ID=<?php echo $fila['id_ejecucion']; ?>"
                                    role="button">Actualizar Jornada</a>

                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php while ($fila = sqlsrv_fetch_array($consultaPresupuesto, SQLSRV_FETCH_ASSOC)) : ?>
                        <tr>
                            <td><?php echo utf8_decode($fila['id_ejecucion']) ?></td>
                            <td><?php echo date_format($fila['fechaIngreso'], 'd/m/Y'); ?></td>
                            <td><?php echo utf8_decode($fila['campo']) ?></td>
                            <td><?php echo utf8_decode($fila['centroCosto']) ?></td>
                            <td><?php echo utf8_decode($fila['labor']) ?></td>
                            <td><?php echo utf8_decode($fila['valorFinal']) ?></td>
                            <td><?php echo date_format($fila['fechaInicio'], 'd/m/Y'); ?></td>
                            <td><?php echo date_format($fila['fechaTermino'], 'd/m/Y'); ?></td>
                            <td><?php echo utf8_decode($fila['estado']); ?></td>
                            <td><a class="btn btn-primary" name="<?php echo $fila['id_ejecucion']; ?>"
                                    id="<?php echo $fila['id_ejecucion']; ?>"
                                    href="registro_ot_realizada.php?ID=<?php echo $fila['id_ejecucion']; ?>"
                                    role="button">Actualizar Jornada</a>

                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Fecha Ingreso</th>
                            <th>Campo</th>
                            <th>Centro Costo</th>
                            <th>Labor</th>
                            <th>Valor Total</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Termino</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!--/ Kick start -->

    </div>
    <!-- END: Content-->
</div>
    
<?php include '../../layouts/footer.php'; ?>
<?php include '../../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->

<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?>