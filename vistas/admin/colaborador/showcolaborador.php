<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../../controladores/Colaborador/ShowColaboradoresController.php' ?>
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
                        <h2 class="content-header-title float-left mb-0">Colaboradores</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class=" breadcrumb-right">
                    <a href="colaborador.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
                </div>
            </div>
        </div>
    <div class="content-body"><!-- Kick start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ver Colaborador</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" action="javascript:void();" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="r_trabajador">Rut</label>
                                            <input type="text" id="r_trabajador" class="form-control" 
                                            value="<?php echo $data->r_trabajador; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nombres">Nombres </label>
                                            <input type="text" id="nombres" class="form-control" 
                                            value="<?php echo $data->nombres; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Apellido_paterno">Apellido Paterno</label>
                                            <input type="text" id="Apellido_paterno" class="form-control" 
                                            value="<?php echo $data->Apellido_paterno; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Apellido_materno">Apellido Materno</label>
                                            <input type="text" id="Apellido_materno" class="form-control" 
                                            value="<?php echo $data->Apellido_materno; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Fecha_Nacimiento">Fecha de Nacimiento</label>
                                            <input type="text" id="Fecha_Nacimiento" class="form-control" 
                                            value="<?php echo date("d/m/Y", strtotime($data->Fecha_Nacimiento)); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Sexo">Sexo</label>
                                            <input type="text" id="Apellido_materno" class="form-control" 
                                            value="<?php echo $data->sexo; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="n_cuadrilla">Cuadrilla</label>
                                            <input type="text" id="Apellido_materno" class="form-control" 
                                            value="<?php echo $data->n_cuadrillas; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="contrato">Contrato Laboral</label>
                                            <input type="text" id="Apellido_materno" class="form-control" 
                                            value="<?php echo $data->n_contrato; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="n_labor_vigencia">Labor</label>
                                            <input type="text" id="Apellido_materno" class="form-control" 
                                            value="<?php echo $data->n_labor_vigencia; ?>" readonly>
                                        </div>
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
<script>
$(window).on('load', function() {
    'use strict';

});
</script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?>
