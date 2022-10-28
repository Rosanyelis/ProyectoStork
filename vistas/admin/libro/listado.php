<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<?php
include "../../../modelos/conn.php";

date_default_timezone_set('America/Santiago');
$estado = 'terminado';

$consultaEjecucion = sqlsrv_query($conn,("SELECT * FROM Presupuesto WHERE estatus = 'En Ejecucion' OR estatus = 'Terminado'"));
$consultaPresupuesto = sqlsrv_query($conn,("SELECT * FROM Presupuesto"));

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
                        <h2 class="content-header-title float-left mb-0">Orden de Trabajo - Libro - Ejecucion vs Presupuesto</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="breadcrumb-right">
                    <a href="../orden-trabajo/orden-trabajo.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <!-- Kick start -->
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Labores en Ejecución</h4>
                    </div>
                    <div class="card-body">
                        <table class="dt-responsive table" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Complet.</th>    
                                    <th>Fecha Ing.</th>
                                    <th>Centro Costo</th>
                                    <th>Labor</th>
                                    <th>Valor Total</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($fila = sqlsrv_fetch_array($consultaEjecucion, SQLSRV_FETCH_ASSOC)) : ?>
                                <tr>
                                    
                                    <td><?php echo utf8_decode($fila['id_presupuesto']) ?></td>
                                    <td><span class="badge badge-success"><?php echo $fila['porcentaje_completado']; ?> <i data-feather='percent'></i></span></td>
                                    <td><?php echo date_format($fila['fechaIngreso'], 'd/m/Y'); ?></td>
                                    <td><?php echo utf8_decode($fila['centroCosto']) ?></td>
                                    <td><?php echo utf8_decode($fila['labor']) ?></td>
                                    <td><?php echo number_format($fila['valorFinalEjecucion']) ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="verEjecucion.php?ID=<?php echo $fila['id_presupuesto']; ?>">Ver</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody> 
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Presupuestos</h4>
                    </div>
                    <div class="card-body">
                        <table class="dt-responsive table" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha Ing.</th>
                                    <th>Centro Costo</th>
                                    <th>Labor</th>
                                    <th>Valor Total</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($fila = sqlsrv_fetch_array($consultaPresupuesto, SQLSRV_FETCH_ASSOC)) : ?>
                                    <tr>
                                        <td><?php echo $fila['id_presupuesto']; ?></td>
                                        <td><?php echo date_format($fila['fechaIngreso'], 'd/m/Y'); ?></td>
                                        <td><?php echo utf8_decode($fila['centroCosto']) ?></td>
                                        <td><?php echo utf8_decode($fila['labor']) ?></td>
                                        <td><?php echo number_format($fila['valorFinal']) ?></td>
                                        <td><a class="btn btn-primary" name="<?php echo $fila['id_presupuesto']; ?>"
                                                id="<?php echo $fila['id_presupuesto']; ?>"
                                                href="verPresupuesto.php?ID=<?php echo $fila['id_presupuesto']; ?>"
                                                role="button">Ver</a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                            </tbody> 
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!--/ Kick start -->

    </div>
    <!-- END: Content-->

<?php include '../../layouts/footer.php'; ?>
<?php include '../../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->

<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?> 