
<!-- Validacion de sesión va aqui  -->

<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../controladores/Presupuesto/ListarpresupuestoController.php'; ?>
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
                        <h2 class="content-header-title float-left mb-0">Presupuesto</h2>
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
                                <h4 class="card-title">Listado de Presupuestos</h4>
                                <div class="text-right">
                                    <a href="createpresupuesto.php" class="btn btn-primary" type="button"><span><i data-feather='plus'></i>Nuevo Presupuesto</span></a>
                                </div>
                            </div>
                            <div class="card-datatable">
                                <table class="dt-responsive table">
                                    <thead>
                                        <tr>
                                            <th>Fecha Ingreso</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Término</th>
                                            <th>Campo</th>
                                            <th>Centro de Costo</th>
                                            <th>Labor</th>
                                            <th>Valor Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $valor=0; 
                                            foreach ($data as $item) { ?>
                                            <tr>
                                                <td><?php echo date('d/m/Y', strtotime($item->fechaIngreso)); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($item->fechaInicio)); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($item->fechaTermino)); ?></td>
                                                <td><?php echo utf8_decode($item->campo) ?></td>
                                                <td><?php echo utf8_decode($item->centroCosto) ?></td>
                                                <td><?php echo utf8_decode($item->labor) ?></td>
                                                <td><?php echo number_format($item->valorFinal) ?></td>
                                                
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown" aria-expanded="false">
                                                        Acciones
                                                        </button>
                                                        <div class="dropdown-menu" style="">
                                                            <a class="dropdown-item" href="Showpresupuesto.php?id=<?php echo $item->id_presupuesto ?>">
                                                            <i data-feather="eye"></i>
                                                                <span>Ver</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $valor = $valor + $item->valorFinal;?>
                                            <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Fecha Ingreso</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Término</th>
                                            <th>Campo</th>
                                            <th>Centro de Costo</th>
                                            <th>Labor</th>
                                            <th>Valor Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                        <tr>
                                            <th colspan="6" class="text-right">Valor Final</th>
                                            <th colspan="2"><?php echo number_format($valor); ?></th>
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

<?php include '../layouts/footer.php'; ?>
<?php include '../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->

<!-- Fin scripts en caso de ser necesario  -->
<?php include '../layouts/finbody.php'; ?>   

