<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../../controladores/Bodega/ShowbodegaController.php'; ?>
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
                    <h2 class="content-header-title float-left mb-0">Bodega</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class=" breadcrumb-right">
                <a href="bodega.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
            </div>
        </div>
    </div>
    <div class="content-body"><!-- Kick start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ver Producto</h4>
                        </div>
                        <div class="card-body">
                            <div class="form">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="nombre-producto">Nombre de Producto</label>
                                            <input type="text" id="nombre-producto" class="form-control" value="<?php echo $data['data']->n_item ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="codigo-producto">Código Producto</label>
                                            <input type="text" id="codigo-producto" class="form-control" value="<?php echo $data['data']->c_item ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="tipo">Tipo</label>
                                            <input type="text" id="tipo" class="form-control" value="<?php echo $data['data']->tipo_item ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="familia">Familia</label>
                                            <input type="text" id="familia" class="form-control" value="<?php echo $data['data']->n_familia ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="SubFamilia">SubFamilia</label>
                                            <input type="text" id="SubFamilia" class="form-control" value="<?php echo $data['data']->n_subfamilia ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="Medida">Medida</label>
                                            <input type="text" id="Medida" class="form-control" value="<?php echo $data['data']->n_unidad ?>" readonly>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="text" id="stock" class="form-control" value="<?php echo $data['data']->stock ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="preciocompra_unidad">Precio Compra x Unidad</label>
                                            <input type="text" id="preciocompra_unidad" class="form-control" value="<?php echo $data['data']->preciocompra_unidad ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="preciocompra_total">Precio Compra Total</label>
                                            <input type="text" id="preciocompra_total" class="form-control" value="<?php echo $data['data']->preciocompra_total ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="preciovalor_p">Precio Valor Ponderado</label>
                                            <input type="text" id="preciovalor_p" class="form-control" value="<?php echo $data['data']->preciovalor_p ?>" readonly>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="preciocosto_r">Precio Costo Reposicion</label>
                                            <input type="text" id="preciocosto_r" class="form-control" value="<?php echo $data['data']->preciocosto_r ?>" readonly>
                                        </div>
                                    </div> -->
                                </div>
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

<?php include '../../layouts/footer.php'; ?>
<?php include '../../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->

<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?>   

