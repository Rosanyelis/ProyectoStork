<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../../controladores/Colaborador/ListColaboradoresController.php' ?>
<!--  -->
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
                    <h2 class="content-header-title float-left mb-0">Colaboradores</h2>
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
                            <h4 class="card-title">Listado de Colaboradores</h4>
                            <div class="text-right">
                                <a href="createcolaborador.php" class="btn btn-primary" type="button"><span><i data-feather='plus'></i>Nuevo Colaborador</span></a>
                            </div>
                        </div>
                        <div class="card-datatable">
                            <table class="dt-responsive table">
                                <thead>
                                    <tr>
                                        <th>Rut</th>
                                        <th>Nombre y Apellido</th>
                                        <th>Labor</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $item) { ?>
                                        <tr>
                                            <td><?php echo $item->r_trabajador ?></td>
                                            <td><?php echo $item->n_trabajador ?></td>
                                            <td><?php echo $item->n_labor_vigencia ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-dark btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown" aria-expanded="false">
                                                    Acciones
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item" href="showcolaborador.php?id=<?php echo $item->id ?>">
                                                        <i data-feather="eye"></i>
                                                            <span>Ver</span>
                                                        </a>
                                                        <a class="dropdown-item" href="editcolaborador.php?id=<?php echo $item->id ?>">
                                                            <i data-feather="edit-2"></i>
                                                            <span>Editar</span>
                                                        </a>
                                                        <a class="dropdown-item" href="../../../controladores/Colaborador/DeleteColaboradorController.php?id=<?php echo $item->id ?>">
                                                            <i data-feather="trash-2"></i>
                                                            <span>Eliminar</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Rut</th>
                                        <th>Nombre y Apellido</th>
                                        <th>Labor</th>
                                        <th>Acciones</th>
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

