
<!-- Validacion de sesión va aqui  -->

<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->

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
    <div class="content-body"><!-- Kick start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ingreso de Factura</h4>
                        </div>
                        <div class="card-body">
                            <form id="aggfacturaform" class="form needs-validation " action="../../controladores/Facturas/CreatefacturaController.php" method="POST">
                                <div id="proveedor" class="row needs-validation">
                                    <div class="col-md-12 col-12 mb-1">
                                        <h5>Proveedor</h5>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="area-total">Rut Proveedor:</label>
                                            <input type="text" id="rut_proveedor" name="rut" oninput="checkRut(this)"  class="form-control" placeholder="00000000-0">
                                            <div class="msgproveedor invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="cantidad_cc">Nombre:</label>
                                            <input type="text" id="nombrep" name="proveedor"  class="form-control" placeholder="Alejandro Venales" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <div class="form-group">
                                            <label for="promedio_cc">Direccion:</label>
                                            <input type="text" id="direccion" name="direccion" class="form-control"  placeholder="Ejm: Quilicura" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="area-total">Razon social:</label>
                                            <input type="text" id="razon_social" name="razon_social"  class="form-control" placeholder="Ejm: Empresa Farma" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="cantidad_cc">Telefono:</label>
                                            <input type="text"id="telefono" name="telefono" class="form-control" placeholder="Ejm: +00 000 000 00" readonly>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-12 col-12 mb-1">
                                        <h5>Buscar Producto</h5>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="area-total">Codigo del Producto:</label>
                                            <input type="text" id="codproducto" class="form-control" placeholder="00000000-0">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 mt-2">
                                        <button type="button" id="buscarproducto" class="btn btn-primary">
                                            <i class="fas fa-search"></i> Buscar
                                        </button>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <div class="form-group">
                                            <label for="promedio_cc">Precio Total de Compra:</label>
                                            <input type="text" name="monto_compra" class="form-control" >
                                        </div>
                                    </div>
                                </div>

                                 <div class="row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                        <label for="">Codigo del Producto:</label>
                                        <input type="text" id="codigo" name="cod_producto"  class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <div class="form-group">
                                            <label for="">Descripcion:</label>
                                            <input type="text"id="producto" name="producto"  class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="">Tipo:</label>
                                            <input type="text" id="tipo" name="tipo" class="form-control"  readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="">Familia:</label>
                                            <input type="text" id="familia" name="familia" class="form-control"  readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="">Sub-Familia:</label>
                                            <input type="text" id="subfamilia" name="subfamilia" class="form-control"  readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="">Medida:</label>
                                            <input type="text"  id="medida" name="medida"  class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="">Cantidad:</label>
                                            <input type="text" id="cantidad" name="cantidad" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="lote">Lote:</label>
                                            <input type="text" id="lote" name="lote" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="">Precio de compra:</label>
                                            <input type="text" id="precio" name="precio" class="form-control"  >
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12 mt-2">
                                        <button type="button" id="aggLote" class="btn btn-primary btn">
                                            <i class="fas fa-file"></i> Agregar Dato a la Tabla
                                        </button>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-12 col-12 mb-1">
                                        <h4>Listado de productos para la orden de compra</h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <table class="lote-productos table table-condensed table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Lote</th>
                                                    <th>Codigo</th>
                                                    <th>Descripción</th>
                                                    <th>Tipo</th>
                                                    <th>Familia</th>
                                                    <th>Subfamilia</th>
                                                    <th>Medida</th> 
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Acciones</th>
                                                </tr>
                                             </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-right mt-3">
                                        <input id="productos" type="hidden" name="loteproductos">
                                        <button id="enviar" type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Guardar</button>
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

<?php include '../layouts/footer.php'; ?>
<?php include '../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->

<!-- Fin scripts en caso de ser necesario  -->
<?php include '../layouts/finbody.php'; ?> 
