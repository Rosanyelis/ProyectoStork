
<!-- Validacion de sesión va aqui  -->

<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../controladores/Campos/ShowcampoController.php'; ?>
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
                    <h2 class="content-header-title float-left mb-0">Campos</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class=" breadcrumb-right">
                <a href="campos.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
            </div>
        </div>
    </div>
    <div class="content-body"><!-- Kick start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Campo <strong><?php echo $data['data']->nombre ?></strong></h4>
                        </div>
                        <div class="card-body">
                            <form class="form">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nombre-campo">Nombre de Campo</label>
                                            <input type="text" id="nombre-campo" class="form-control" value="<?php echo $data['data']->nombre ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="area-total">Área Total</label>
                                            <input type="text" id="area-total" class="form-control" value="<?php echo $data['data']->area_total ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="cantidad_cc">Cantidad de Centro de Costos</label>
                                            <input type="text" id="cantidad_cc" class="form-control" value="<?php echo $data['data']->cantidad_cc ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="promedio_cc">Promedio de Centro de Costos</label>
                                            <input type="text" id="promedio_cc" class="form-control"  value="<?php echo $data['data']->promedio_cc ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive mt-4">
                                <h4 class="card-title">Listado de Centros de Costos</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="10px">Nro.</th>
                                            <th>Nombre</th>
                                            <th width="10px">Area</th>
                                            <th width="10px">Nro. Hileras</th>
                                            <th width="10px">Nro. Calle</th>
                                            <th>Especie</th>
                                            <th>Variedad</th>
                                            <th>Combinación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['centros'] as $item) { ?>
                                        <tr>
                                            <td><?php echo $item->id_CC ?></td>
                                            <td><?php echo $item->nombre ?></td>
                                            <td><?php echo $item->area_cc ?></td>
                                            <td><?php echo $item->cantidad_hilera ?></td>
                                            <td><?php echo $item->cantidad_calle ?></td>
                                            <td><?php echo $item->nombre_especie ?></td>
                                            <td><?php echo $item->nombre_variedad ?></td>
                                            <td><?php echo $item->nombre_combinacion ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--/ Kick start -->

</div>
<!-- END: Content-->

<?php include '../layouts/footer.php'; ?>
<?php include '../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->

<!-- Fin scripts en caso de ser necesario  -->
<?php include '../layouts/finbody.php'; ?> 

