
<!-- Validacion de sesión va aqui  -->

<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../controladores/Facturas/ShowfacturaController.php'; ?>
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
                    <h2 class="content-header-title float-left mb-0">Facturas</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class=" breadcrumb-right">
                <a href="facturas.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
            </div>
        </div>
    </div>

    <div class="content-body"><!-- Kick start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Factura #<?php echo $data['data']->numerof; ?> </h4>
                        </div>
                        <div class="card-body invoice-padding">
                            <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                <div>
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title"><strong>Proveedor:</strong> <?php echo $data['data']->nombre; ?></p>
                                        <p class="invoice-date-title"><strong>Rut:</strong> <?php echo $data['data']->rut_proveedor; ?></p>
                                        <p class="invoice-date-title"><strong>Razón Social:</strong> <?php echo $data['data']->razon_social; ?></p>
                                        <p class="invoice-date-title"><strong>Dirección:</strong> <?php echo $data['data']->direccion; ?></p>
                                        <p class="invoice-date-title"><strong>Teléfono:</strong> <?php echo $data['data']->telefono; ?></p>
                                    </div>
                                </div>
                                <div class="mt-md-0 mt-2">
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title"><strong>Fecha de Creación:</strong> <?php echo date('d F Y', strtotime($data['data']->fecha)); ?></p>
                                        <p class="invoice-date-title"><strong>Monto Total:</strong> <?php echo $data['data']->monto_compra; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive mt-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Lote</th>
                                            <th>Codigo</th>
                                            <th>Producto</th>
                                            <th>Tipo</th>
                                            <th>Familia</th>
                                            <th>Subfamilia</th>
                                            <th>Medida</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Fecha Creación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['lotes'] as $item) { ?>
                                        <tr>
                                            <td><?php echo $item->codigo_lote ?></td>
                                            <td><?php echo $item->codproducto ?></td>
                                            <td><?php echo $item->producto ?></td>
                                            <td><?php echo $item->tipo ?></td>
                                            <td><?php echo $item->familia ?></td>
                                            <td><?php echo $item->sub_familia ?></td>
                                            <td><?php echo $item->cantidad ?></td>
                                            <td><?php echo $item->unidad ?></td>
                                            <td><?php echo $item->precio ?></td>
                                            <td><?php echo date('d F Y', strtotime($item->fecha_creacion)); ?></td>
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