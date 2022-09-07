
<!-- Validacion de sesión va aqui  -->

<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../controladores/Presupuesto/ShowpresupuestoController.php'; ?>
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
                <a href="presupuesto.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
            </div>
        </div>
    </div>
    <div class="content-body"><!-- Kick start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Presupuesto N°: <span id="nOT"><?php echo $id?> </span></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-12 ">
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title"><strong>Fecha Ingreso:</strong> <?php echo date('d/m/Y', strtotime($data['presupuesto']->fechaIngreso)); ?></p>
                                        <p class="invoice-date-title"><strong>Fecha Inicio:</strong> <?php echo date('d/m/Y', strtotime($data['presupuesto']->fechaInicio)); ?></strong> </p>
                                        <p class="invoice-date-title"><strong>Fecha Termino:</strong> <?php echo date('d/m/Y', strtotime($data['presupuesto']->fechaTermino)); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 ">
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title"><strong>Campo: </strong> <?php echo $data['presupuesto']->campo; ?></p>
                                        <p class="invoice-date-title"><strong>Centro Costo:</strong> <?php echo $data['presupuesto']->centroCosto; ?></p>
                                        <p class="invoice-date-title"><strong>Labor:</strong> <?php echo $data['presupuesto']->labor; ?></p>
                                        <p class="invoice-date-title"><strong>Lugar Aplicación:</strong> 
                                            <?php if ($data['presupuesto']->lugarAplicacion == 1) { ?> Camellón <?php } ?>
                                            <?php if ($data['presupuesto']->lugarAplicacion == 2) { ?> Calle <?php } ?>
                                            <?php if ($data['presupuesto']->lugarAplicacion == 3) { ?>Area Total<?php } ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 ">
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title"><strong>Hileras Afectadas: </strong> <?php echo $data['presupuesto']->cantidadHileraTotal; ?></p>
                                        <p class="invoice-date-title"><strong>Metros x Hileras:</strong> <?php echo $data['presupuesto']->CantidadMetrosHileraTotal; ?></p>
                                        <p class="invoice-date-title"><strong>Arboles x Hileras:</strong> <?php echo $data['presupuesto']->cantidadArbolesTotal; ?></p>
                                    </div>
                                </div>
                                
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-9"><h3>Maquinárias a Utilizar</h3></div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-12 col-12">
                                    <section class="card-datatable">
                                        <table class="dt-responsive table loteProductos">
                                            <thead>
                                                <tr>
                                                    <th>Maquinaria</th>
                                                    <th>Implemento</th>
                                                    <th>KM/H</th>
                                                    <th>Valor</th>
                                                    <th>Valor Final</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablita1">
                                            <?php 
                                                $valorHerr =0;
                                                foreach ($data['maquinaria'] as $item) { ?>
                                                <tr>
                                                    <td><?php echo $item->maquinaria;?></td>
                                                    <td><?php echo $item->implemento;?></td>
                                                    <td><?php echo $item->kmH;?></td>
                                                    <td><?php echo $item->valor;?></td>
                                                    <td><?php echo $item->valorFinal;?></td>
                                                </tr>
                                                <?php 
                                                    $val = $item->valorFinal;
                                                    $valorHerr = $valorHerr + $val;
                                                ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </section> 
                                </div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-9"><h3>Productos a Utilizar</h3></div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-12 col-12">
                                    <section class="card-datatable">
                                        <table class="dt-responsive table loteProductos">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Unidad</th>
                                                    <th>Valor Unidad</th>
                                                    <th>Cantidad</th>
                                                    <th>Valor Final</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody id="tablita1">
                                            <?php 
                                                $valorProd =0;
                                                foreach ($data['productosEje'] as $item) { ?>
                                                <tr>
                                                    <td><?php echo $item->nombre;?></td>
                                                    <td><?php echo $item->unidad;?></td>
                                                    <td><?php echo $item->valorUnidad;?></td>
                                                    <td><?php echo $item->cantidad;?></td>
                                                    <td><?php echo $item->valorFinal;?></td>
                                                </tr>
                                                <?php 
                                                    $val = $item->valorFinal;
                                                    $valorProd = $valorProd + $val;
                                                ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </section>
                                </div>

                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-4">
                                    <h3 class="mb-2">Colaboradores</h3>
                                    <p class="invoice-date-title"><strong>Cantidad Personas:</strong> <?php echo $data['presupuesto']->cantidadPersona; ?></p>
                                    <p class="invoice-date-title"><strong>Valor Personas:</strong> <?php echo $data['presupuesto']->precioPersona; ?></p>
                                    <p class="invoice-date-title"><strong>Valor Final Personas:</strong> <?php echo $data['presupuesto']->valorFinalPersonal; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <h3 class="mb-2">Subtotales</h3>
                                    <p class="invoice-date-title"><strong>Valor Herramientas:</strong> <?php echo $valorHerr; ?></p>
                                    <p class="invoice-date-title"><strong>Valor Productos:</strong> <?php echo $valorProd; ?></p>
                                    <p class="invoice-date-title"><strong>Valor Personas:</strong> <?php echo $data['presupuesto']->valorFinalPersonal; ?></p>
                                </div>

                                <div class="col-md-4">
                                    <h3 class="mb-2">Valorizado</h3>
                                    <p class="invoice-date-title"><strong>Valor Total:</strong> <?php echo $data['presupuesto']->valorFinal; ?></p>
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

<?php include '../layouts/footer.php'; ?>
<?php include '../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->
<script>
$(window).on('load', function() {
    'use strict';


});
</script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../layouts/finbody.php'; ?>  