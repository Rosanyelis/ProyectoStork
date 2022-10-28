
<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->

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
                                <h4 class="card-title">Nuevo Producto</h4>
                            </div>
                            <div class="card-body">
                                <form class="form" action="../../../controladores/Bodega/CreatebodegaController.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="nombre-producto">Nombre de Producto</label>
                                                <input type="text" id="nombre-producto" class="form-control" placeholder="Ejem: Vitacura" name="descripcion">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="codigo-producto">Código Producto</label>
                                                <input type="text" id="codigo-producto" class="form-control" placeholder="ejemplo: 900" name="CodigoProducto">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="custom-select">Tipo</label>
                                                <select class="custom-select" id="customSelect" name="Tipo">
                                                    <option value="">---Seleccione Tipo---</option>
                                                    <option value="LLL1">LLL1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="promedio_cc">Familia</label>
                                                <select class="custom-select" id="customSelect" name="Familia">
                                                    <option value="">---Seleccione familia---</option>
                                                    <option value="L1">L1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="promedio_cc">SubFamilia</label>
                                                <select class="custom-select" id="customSelect" name="SubFamilia">
                                                    <option value="">---Seleccione SubFamilia---</option>
                                                    <option value="LL1">LL1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="promedio_cc">Medida</label>
                                                <select class="custom-select" id="customSelect" name="medida">
                                                    <option value="">---Seleccione Medida---</option>
                                                    <option value="Litro">Litros</option>
                                                    <option value="Kilo">Kilos</option>
                                                    <option value="Unidad">Unidad</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="stock">Stock</label>
                                                <input type="text" id="stock" class="form-control" name="stock" placeholder="Ejem: 300">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="preciocompra_unidad">Precio Compra x Unidad</label>
                                                <input type="text" id="preciocompra_unidad" class="form-control" name="preciocompra_unidad" placeholder="Ejem: 300">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="preciocompra_total">Precio Compra Total</label>
                                                <input type="text" id="preciocompra_total" class="form-control" name="preciocompra_total" placeholder="Ejem: 300">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="preciovalor_p">Precio Valor Ponderado</label>
                                                <input type="text" id="preciovalor_p" class="form-control" name="preciovalor_p" placeholder="Ejem: 300">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="preciocosto_r">Precio Costo Reposicion</label>
                                                <input type="text" id="preciocosto_r" class="form-control" name="preciocosto_r" placeholder="Ejem: 300">
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

