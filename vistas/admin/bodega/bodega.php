
<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../../controladores/Bodega/ListarbodegaController.php'; ?>
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
                        <h2 class="content-header-title float-left mb-0">Bodega</h2>
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
                                <h4 class="card-title">Listado de Productos</h4>
                                <div class="text-right">
                                    <a href="createbodega.php" class="btn btn-primary" type="button"><span><i data-feather='plus'></i>Nuevo Producto</span></a>
                                </div>
                            </div>
                            <div class="card-datatable">
                                <table class="dt-responsive table">
                                    <thead>
                                        <tr>
                                            <!-- <th width="30px">Nro.</th> -->
                                            <th>Codigo</th>
                                            <th>Producto</th>
                                            <th>Medida</th>
                                            <th>Stock</th>
                                            <th width="30px">Accciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $item) { ?>
                                            <tr>
                                                <!-- <td><?php echo intval($item->cod_int_item) ?></td> -->
                                                <td><?php echo $item->c_item ?></td>
                                                <td><?php echo $item->n_item ?></td>
                                                <td><?php echo $item->n_unidad ?></td>
                                                <td><?php 
                                                        if($item->maneja_stock == '1') {
                                                            echo 'Si';
                                                        }else{
                                                            echo 'No';
                                                        }
                                                    ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown" aria-expanded="false">
                                                        Acciones
                                                        </button>
                                                        <div class="dropdown-menu" style="">
                                                            <a class="dropdown-item" href="showbodega.php?id=<?php echo $item->c_item ?>">
                                                            <i data-feather="eye"></i>
                                                                <span>Ver</span>
                                                            </a>
                                                            <!-- <a class="dropdown-item" href="editbodega.php?id=<?php echo $item->c_item ?>">
                                                                <i data-feather="edit-2"></i>
                                                                <span>Editar</span>
                                                            </a> -->
                                                            <a class="dropdown-item" href="../../../controladores/Bodega/DeletebodegaController.php?id=<?php echo $item->c_item ?>">
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
                                            <!-- <th width="30px">Nro.</th> -->
                                            <th>Codigo</th>
                                            <th>Producto</th>
                                            <th>Medida</th>
                                            <th>Stock</th>
                                            <th width="30px">Accciones</th>
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

