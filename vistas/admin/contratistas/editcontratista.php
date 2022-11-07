<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../../controladores/Contratistas/SelectcampotratoController.php' ?>
<?php include '../../../controladores/Contratistas/EditContratistaController.php' ?>

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
                        <h2 class="content-header-title float-left mb-0">Contratista</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class=" breadcrumb-right">
                    <a href="contratista.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
                </div>
            </div>
        </div>
    <div class="content-body"><!-- Kick start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Editar Contratista</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" action="../../../controladores/Contratistas/UpdateContratistaController.php?id=<?php echo $id; ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="rut_entidad">Rut</label>
                                            <input type="text" id="rut_entidad" class="form-control" value="<?php echo $data['data']->Rut_Entidad; ?>"
                                            placeholder="Ejem: 123456789-9" name="rut_entidad">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Nombre_Entidad">Nombre Entidad</label>
                                            <input type="text" id="Nombre_Entidad" class="form-control" value="<?php echo $data['data']->Nombre_Entidad; ?>"
                                            placeholder="ejemplo: El Pacífico" name="Nombre_Entidad">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input type="text" id="direccion" class="form-control" value="<?php echo $data['data']->Direccion; ?>"
                                            placeholder="Ejem: Quilicura" name="direccion">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="giro">Giro</label>
                                            <input type="text" id="giro" class="form-control" name="giro" value="<?php echo $data['data']->Giro; ?>"
                                            placeholder="Ejem: Explotación Agrícola">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="campo">Campo</label>
                                            <select class="form-control" id="campo" name="sucursal">
                                                <option value="">---Seleccione Campo ---</option>
                                                <?php foreach ($data['campos'] as $item) { ?>
                                                <option value="<?php echo $item->nombre ?>" <?php if ($item->nombre == $data['data']->Sucursal) {echo 'selected';} ?> ><?php echo $item->nombre ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="campo">Trato</label>
                                            <select class="form-control" id="trato" name="trato">
                                                <option value="">---Seleccione Tipo de Trato---</option>
                                                <?php foreach ($data['tratos'] as $item) { ?>
                                                <option value="<?php echo $item->Trato ?>" <?php if ($item->Trato == $data['data']->trato) {echo 'selected';} ?> ><?php echo $item->Trato ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="valor">Valor($) de Trato</label>
                                            <input type="text" id="valor" class="form-control" name="valor" value="<?php echo $data['data']->valor; ?>" readonly placeholder="0">
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

    $('#trato').change(function() {
        let trato = $('#trato').val();
        $.ajax({
            type: 'POST',
            url: '../../../controladores/Contratistas/SearchTratoController.php',
            data: {
                trato: trato,
            },
            dataType: 'json',
            success: function(response) {
                $('#valor').val('');
                $('#valor').val(parseInt(response.data.valor));
            },
            error: function(response) {
                console.log(response);
            }
        });
    });
});
</script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?>
