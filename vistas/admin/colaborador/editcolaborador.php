<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../../controladores/Colaborador/EditColaboradorController.php' ?>
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
                            <h4 class="card-title">Editar Colaborador</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" action="../../../controladores/Colaborador/UpdateColaboradorController.php?id=<?php echo $id; ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="r_trabajador">Rut</label>
                                            <input type="text" id="r_trabajador" class="form-control" 
                                            placeholder="Ejem: 123456789-9" name="r_trabajador"
                                            value="<?php echo $data->r_trabajador; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nombres">Nombres </label>
                                            <input type="text" id="nombres" class="form-control" 
                                            placeholder="ejemplo: El Pacífico" name="nombres"
                                            value="<?php echo $data->nombres; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Apellido_paterno">Apellido Paterno</label>
                                            <input type="text" id="Apellido_paterno" class="form-control" 
                                            placeholder="Ejem: Quilicura" name="Apellido_paterno"
                                            value="<?php echo $data->Apellido_paterno; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Apellido_materno">Apellido Materno</label>
                                            <input type="text" id="Apellido_materno" class="form-control" 
                                            name="Apellido_materno" placeholder="Ejem: Explotación Agrícola"
                                            value="<?php echo $data->Apellido_materno; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Fecha_Nacimiento">Fecha de Nacimiento</label>
                                            <input type="date" id="Fecha_Nacimiento" class="form-control" 
                                            name="Fecha_Nacimiento" value="<?php echo date("Y-m-d", strtotime($data->Fecha_Nacimiento)); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Sexo">Sexo</label>
                                            <select class="form-control" id="Sexo" name="sexo">
                                                <option value="">---Seleccione el Sexo ---</option>
                                                <option value="FEMENINO" <?php if ('FEMENINO' == $data->sexo) { echo 'selected'; } ?>>FEMENINO</option>
                                                <option value="MASCULINO" <?php if ('MASCULINO' == $data->sexo) { echo 'selected'; } ?>>MASCULINO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="n_cuadrilla">Cuadrilla</label>
                                            <select class="form-control" id="n_cuadrilla" name="n_cuadrilla">
                                                <option value="">---Seleccione la Cuadrilla ---</option>
                                                <option value="CUADRILLA VITACURA" <?php if ('CUADRILLA VITACURA' == $data->n_cuadrillas) { echo 'selected'; } ?>>CUADRILLA VITACURA</option>
                                                <option value="CUADRILLA NAGUILAN" <?php if ('CUADRILLA NAGUILAN' == $data->n_cuadrillas) { echo 'selected'; } ?>>CUADRILLA NAGUILAN</option>
                                                <option value="CUADRILLA TORCA" <?php if ('CUADRILLA TORCA' == $data->n_cuadrillas) { echo 'selected'; } ?>>CUADRILLA TORCA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="contrato">Contrato Laboral</label>
                                            <select class="form-control" id="contrato" name="contrato">
                                                <option value="">---Seleccione el Contrato Laboral ---</option>
                                                <option value="CONTRATO INDEFINIDO SUELDO MENSUAL" <?php if ('CONTRATO INDEFINIDO SUELDO MENSUAL' == $data->n_contrato) { echo 'selected'; } ?>>CONTRATO INDEFINIDO SUELDO MENSUAL</option>
                                                <option value="CONTRATO INDEFINIDO SUELDO DIARIO" <?php if ('CONTRATO INDEFINIDO SUELDO DIARIO' == $data->n_contrato) { echo 'selected'; } ?>>CONTRATO INDEFINIDO SUELDO DIARIO</option>
                                                <option value="CONTRATO PLAZO FIJO DIARIO" <?php if ('CONTRATO PLAZO FIJO DIARIO' == $data->n_contrato) { echo 'selected'; } ?>>CONTRATO PLAZO FIJO DIARIO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="n_labor_vigencia">Labor</label>
                                            <select class="form-control" id="n_labor_vigencia" name="n_labor_vigencia">
                                                <option value="">---Seleccione la Labor ---</option>
                                                <option value="ENCARGADO DE CAMPO" <?php if ('ENCARGADO DE CAMPO' == $data->n_labor_vigencia) { echo 'selected'; } ?>>ENCARGADO DE CAMPO</option>
                                                <option value="OPERADOR MAQUINARIA AGRICOLA Y TRABAJADOR AGRICOLA POLIFUNCIONAL" UNCI<?php if ('OPERADOR MAQUINARIA AGRICOLA Y TRABAJADOR AGRICOLA POLIFUNCIONAL' == $data->n_labor_vigencia) { echo 'selected'; } ?>>OPERADOR MAQUINARIA AGRICOLA Y TRABAJADOR AGRICOLA POLIFONAL</option>
                                                <option value="AYUDANTE DE RIEGO Y TRABAJADOR AGRICOLA POLIFUNCIONAL" <?php if ('AYUDANTE DE RIEGO Y TRABAJADOR AGRICOLA POLIFUNCIONAL' == $data->n_labor_vigencia) { echo 'selected'; } ?>>AYUDANTE DE RIEGO Y TRABAJADOR AGRICOLA POLIFUNCIONAL</option>
                                                <option value="TRABAJADOR AGRICOLA MULTIFUNCIÓN" <?php if ('TRABAJADOR AGRICOLA MULTIFUNCIÓN' == $data->n_labor_vigencia) { echo 'selected'; } ?>>TRABAJADOR AGRICOLA MULTIFUNCIÓN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Actualizar</button>
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
<script>
$(window).on('load', function() {
    'use strict';

});
</script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?>
