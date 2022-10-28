
<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../../controladores/OrdenTrabajo/ListarordentrabajoController.php'; ?>
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
                        <h2 class="content-header-title float-left mb-0">Orden de Trabajo</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class=" breadcrumb-right">
                    <!-- <a href="campos.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a> -->
                </div>
            </div>
        </div>

        <div class="content-body"><!-- Kick start -->
            <!-- Responsive Datatable -->
            <section id="responsive-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Listado de Ordenes de Trabajo</h4>
                                <div class="text-right">
                                    <a href="../libro/listado.php" class="btn btn-info" type="button"><span>Libro</span></a>
                                </div>
                            </div>
                            <div class="card-datatable">
                                <table class="dt-responsive table" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th>Completado</th>
                                            <th>Fecha Ingreso</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Término</th>
                                            <th>Campo</th>
                                            <th>Centro Costo</th>
                                            <th>Labor</th>
                                            <th>Hil. Afec.</th>
                                            <th>Ha. Afec.</th>
                                            <th>Valor Total</th>
                                            <th>Estatus</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $item) { ?>
                                            <tr>
                                                <td><span class="badge badge-success"><?php echo $item->porcentaje_completado ?> <i data-feather='percent'></i></span></td>
                                                <td><?php echo date('d/m/Y', strtotime($item->fechaIngreso)); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($item->fechaInicio)); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($item->fechaTermino)); ?></td>
                                                <td><?php echo utf8_decode($item->campo) ?></td>
                                                <td><?php echo utf8_decode($item->centroCosto) ?></td>
                                                <td><?php echo utf8_decode($item->labor) ?></td>
                                                <td><?php echo $item->cantidadHileraTotal ?></td>
                                                <td><?php echo $item->cantidadAreaTotal ?></td>
                                                <td><?php echo number_format($item->valorFinal) ?></td>
                                                <td>
                                                <?php  if ($item->estatus == 'Por Confirmar') { ?>
                                                    <span class="badge badge-warning"><?php echo $item->estatus ?></span></td>
                                                <?php } ?>
                                                <?php  if ($item->estatus == 'Aprobada') { ?>
                                                    <span class="badge badge-primary"><?php echo $item->estatus ?></span></td>
                                                <?php } ?>
                                                <?php  if ($item->estatus == 'En Ejecucion') { ?>
                                                    <span class="badge badge-info"><?php echo $item->estatus ?></span></td>
                                                <?php } ?>
                                                <td>
                                                
                                                    <div class="dropdown">
                                                    
                                                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown" aria-expanded="false">
                                                        Acciones
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <?php  if ($item->estatus == 'Por Confirmar') { ?>
                                                            <a class="dropdown-item" href="../../../controladores/OrdenTrabajo/AprobarordentrabajoController.php?id=<?php echo $item->id_presupuesto ?>">
                                                                <i data-feather='check'></i>
                                                                <span>Aprobar Orden</span>
                                                            </a>
                                                            <?php } ?>

                                                            <?php  if ($item->estatus == 'Aprobada' || $item->estatus == 'En Ejecucion') { ?>
                                                            <a class="dropdown-item" href="capturarordentrabajo.php?id=<?php echo $item->id_presupuesto ?>">
                                                            <i data-feather="eye"></i>
                                                                <span>Capturar</span>
                                                            </a>
                                                            <?php } ?>

                                                            <?php  if ($item->estatus == 'Por Confirmar') { ?>
                                                                <a class="dropdown-item" href="orden_trabajo_modificar.php?id=<?php echo $item->id_presupuesto ?>">
                                                                    <i data-feather="edit-2"></i>
                                                                    <span>Editar</span>
                                                                </a>
                                                            <?php } ?>
                                                            <!-- <?php  if ($item->estatus == 'En Ejecucion') { ?>
                                                            <a class="dropdown-item" href="registro-orden-trabajo.php?id=<?php echo $item->id_presupuesto ?>">
                                                                <i data-feather="edit-2"></i>
                                                                <span>Ver Registro de Actividades</span>
                                                            </a>
                                                            <?php } ?> -->
                                                    </div>
                                                    
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Completado</th>
                                            <th>Fecha Ingreso</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Término</th>
                                            <th>Campo</th>
                                            <th>Centro Costo</th>
                                            <th>Labor</th>
                                            <th>Hil. Afec.</th>
                                            <th>Ha. Afec.</th>
                                            <th>Valor Total</th>
                                            <th>Estatus</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Responsive Datatable -->
        </div>
        <!--/ Kick start -->

    </div>
    <!-- END: Content-->

<?php include '../../layouts/footer.php'; ?>
<?php include '../../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->

<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?>   

