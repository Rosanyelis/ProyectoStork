
<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../../controladores/OrdenTrabajo/VerRegistroOrdenTrabajoController.php' ?>
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
                    <h2 class="content-header-title float-left mb-0">Ordenes de Trabajo</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class=" breadcrumb-right">
                <a href="orden-trabajo.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
            </div>
        </div>
    </div>
    <div class="content-body"><!-- Kick start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Orden de Trabajo N°: <span id="nOT"><?php echo $id?></span></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-12 ">
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title"><strong>Labor:</strong> <span id="nombre_labor"> <?php echo $data['orden']->labor;?></span></p>
                                        <p class="invoice-date-title"><strong>Faena:</strong> <span id="nombre_faena"> <?php echo $data['labor']->nombre_faena;?></span></p>
                                        <p class="invoice-date-title"><strong>Grupo:</strong> <span id="nombre_grupo"> <?php echo $data['labor']->nombre_grupo;?></span></p>
                                        <p class="invoice-date-title"><strong>Lugar de Aplicación:</strong> <span id="lugarApl"> <?php echo $data['areaAplicacion']->Lugar;?></span></p>
                                        <p class="invoice-date-title"><strong>Campo:</strong> <span id="campo"> <?php echo $data['orden']->campo;?></span></p>
                                        <p class="invoice-date-title"><strong>Centro Costo:</strong> <span id="cc"> <?php echo $data['orden']->centroCosto;?></span></p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 ">
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title"><strong>Especie:</strong> <span></span></p>
                                        <p class="invoice-date-title"><strong>Variedad(*):</strong> <span></span></p>
                                        <p class="invoice-date-title"><strong>Combinación:</strong> <span></span></p>
                                        <p class="invoice-date-title"><strong>Hás Afectadas:</strong> <span id="has_afect"><?php echo $data['orden']->CantidadMetrosHileraTotal;?>  MT2</span></p>
                                        <p class="invoice-date-title"><strong>N° Total de Hileras:</strong> <span id="n_hilera"> <?php echo $data['orden']->cantidadHileraTotal;?></span></p>
                                        <p class="invoice-date-title"><strong>N° Hileras Trabajadas:</strong> <span id="n_hilera"> <?php echo $data['laborEjecucion']->hileras_trabajadas;?></span></p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 ">
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title"><strong>Estado Fenealogico:</strong> <span><?php echo $data['orden']->estado_fenealogico; ?></span></p>
                                        <p class="invoice-date-title"><strong>Responsable de Labor:</strong> <span><?php echo $data['responsable']->nombre;?> <?php echo $data['responsable']->apellido;?></span></p>
                                        <p class="invoice-date-title"><strong>Fecha Actual:</strong> <span><?php echo $data['laborEjecucion']->fecha; ?></span></p>
                                    </div>
                                </div>
                                <!-- <div class="w-100 d-none d-md-block mt-2"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Personal en Implementado</h4>
                        </div>
                        <div class="card-body">
                            <table class="dt-responsive table">
                                <thead>
                                    <tr>
                                        <th colspan="3">Tipo de Personal: <?php echo $data['laborEjecucion']->tipo_personal; ?></th>
                                        <th colspan="2">Cant. de Personal: <?php echo $data['laborEjecucion']->cantidad_personal; ?></th>
                                    </tr>
                                    <tr>
                                        <th>Personal</th>
                                        <th>Maquinaria</th>
                                        <th>Implemento</th>
                                        <th>Mojamiento</th>
                                        <th>Litraje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data['personal_maquinaria'] as $item) { ?>
                                    <tr>
                                        <td><?php echo $item->rut_personal;?></td>
                                        <td><?php echo $item->maquinaria;?></td>
                                        <td><?php echo $item->implemento;?></td>
                                        <td><?php echo $item->mojamiento;?></td>
                                        <td><?php echo $item->litraje;?></td>
                                    </tr>
                                <?php } ?>
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Mojamiento</h4>
                        </div>
                        <div class="card-body">
                            <table class="dt-responsive table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Tipo de Personal: Colaborador</th>
                                        <th>Cantidad de Personal: 30</th>
                                    </tr>
                                    <tr>
                                        <th>Personal</th>
                                        <th>Maquinaria</th>
                                        <th>Implemento</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
    </div>
    <!--/ Kick start -->

</div>
<!-- END: Content-->

<?php include '../../layouts/footer.php'; ?>
<?php include '../../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->
<script>

</script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?>  