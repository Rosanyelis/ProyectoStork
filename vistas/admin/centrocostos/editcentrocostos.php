<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../../controladores/CentroCosto/EditCentroCostoController.php'; ?>
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
                    <h2 class="content-header-title float-left mb-0">Centro de Costos</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class=" breadcrumb-right">
                <a href="centrocostos.php?id=<?php echo $_REQUEST['id']; ?>" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
            </div>
        </div>
    </div>
    <div class="content-body"><!-- Kick start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Editar Centro de Costo</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" action="../../../controladores/CentroCosto/UpdateCentroCostoController.php?id=<?php echo $_REQUEST['id']; ?>&idcc=<?php echo $_REQUEST['idcc']; ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nombre-cc">Nombre de Centro de Costo</label>
                                            <input type="text" id="nombre-cc" class="form-control" value="<?php echo $data->nombre ?>" name="nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="area_cc">Área de Centro de Costo</label>
                                            <input type="text" id="area_cc" class="form-control" value="<?php echo $data->area_cc ?>" name="area_cc">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="cantidad_hilera">Cantidad de Hileras</label>
                                            <input type="text" id="cantidad_hilera" class="form-control" value="<?php echo $data->cantidad_hilera ?>" name="cantidad_hilera">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="cantidad_calle">Cantidad de Calles</label>
                                            <input type="text" id="cantidad_calle" class="form-control" name="cantidad_calle" value="<?php echo $data->cantidad_calle ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nombre_especie">Nombre de Especie</label>
                                            <input type="text" id="nombre_especie" class="form-control" value="<?php echo $data->nombre_especie ?>" name="nombre_especie">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nombre_variedad">Nombre Variedad</label>
                                            <input type="text" id="nombre_variedad" class="form-control" name="nombre_variedad" value="<?php echo $data->nombre_variedad ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nombre_combinacion">Nombre Combinacion</label>
                                            <input type="text" id="nombre_combinacion" class="form-control" value="<?php echo $data->nombre_combinacion ?>" name="nombre_combinacion">
                                        </div>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Guardar</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect">Limpiar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--/ Kick start -->

</div>
<!-- END: Content-->


<?php include '../../layouts/footer.php'; ?>
<?php include '../../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->

<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?> 

