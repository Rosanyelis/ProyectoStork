<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>
<!-- Fin de validacion de sesion -->
<!-- Controlador de listado  -->
<?php include '../../../controladores/Maquinaria/EditmaquinariaController.php'; ?>
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
                    <h2 class="content-header-title float-left mb-0">Maquinaria</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class=" breadcrumb-right">
                <a href="../orden-trabajo/verordentrabajo.php?id=<?php echo $id; ?>" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a>
            </div>
        </div>
    </div>
    <div class="content-body"><!-- Kick start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Herramientas a Utilizar</h4>
                        </div>
                        <div class="card-body">
                            <form id="editarMaquinaria" class="row" action="../../../controladores/Maquinaria/AgregarMaquinariaController.php?id=<?php echo $id; ?>" method="POST">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="maquinaria">Tipo Maquinaria:</label>
                                        <select class="form-control" id="maquinaria" name="maquinaria">
                                            <option value="">---Seleccione Maquinaria---</option>
                                            <?php foreach ($data['maquinaria'] as $item) { ?>
                                                <option value="<?php echo $item->n_maquinaria;?>"><?php echo $item->n_maquinaria;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="implemento">Tipo Implemento:</label>
                                        <select class="form-control" id="implemento" name="implemento">
                                            <option value="">---Seleccione Implemento ---</option>
                                            <?php foreach ($data['implementos'] as $item) { ?>
                                                <option value="<?php echo $item->n_maquinaria;?>"><?php echo $item->n_maquinaria;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="km">KM/H:</label>
                                        <input type="text" id="km" name="km" class="form-control" placeholder="" value="">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="valor">Valor:</label>
                                        <input type="text" id="valor" name="valor" class="form-control" placeholder="" value="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="total">Total:</label>
                                        <input type="text" id="total" name="total" class="form-control" placeholder="" value="">
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <button type="button" id="agregarHerramientas" class="btn btn-primary mt-2">Agregar</button>
                                </div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-12"><h4>Listado de Herramientas</h4></div>
                                <div class="w-100 d-none d-md-block mt-2"></div>
                                <div class="col-md-12 col-12">
                                    <!-- <section class="card-datatable"> -->
                                        <table class=" table loteProductos">
                                            <thead>
                                                <tr>
                                                    <th>Maquinaria</th>
                                                    <th>Implemento</th>
                                                    <th>KM/H</th>
                                                    <th>Valor</th>
                                                    <th>Valor Final</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablita1">
                                            <?php 
                                                $valorHerr =0;
                                                foreach ($data['maquinariaEjecucion'] as $item) { ?>
                                                <tr>
                                                    <td><?php echo $item->maquinaria;?></td>
                                                    <td><?php echo $item->implemento;?></td>
                                                    <td><?php echo $item->kmH;?></td>
                                                    <td><?php echo $item->valor;?></td>
                                                    <td><?php echo $item->valorFinal;?></td>
                                                    <td>
                                                        <a class="btn btn-danger" href="../../../controladores/Maquinaria/EliminarMaquinariaController.php?id=<?php echo $item->id_herrPres;?>&idP=<?php echo $id; ?>">Eliminar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <!-- </section> -->
                                </div>
                                <div class="w-100 d-none d-md-block mt-4"></div>
                                <div class="col-md-12 text-right">
                                    <input type="hidden" id="lote" name="loteHerramientas">
                                    <button type="button" id="terminar" class="btn float-right btn btn-primary ">Finalizar Edición</button>
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

    var loteHerramientas = [];

    $('#agregarHerramientas').click(function() {
        var maquinaria = $('#maquinaria').val();
        var implemento = $('#implemento').val();
        var km = $('#km').val();
        var valor = $('#valor').val();
        var valorTotal = parseInt($('#total').val());

        //Pintar la tabla 
        var fila = "<tr><td class='codigoherramienta'>" + maquinaria +
            "</td><td>" + implemento +
            "</td><td>" + km + "</td><td>" + valor +
            "</td><td class='sumaherramienta'>" + valorTotal +
            "</td><td><button class='btn btn-danger' id='eliminarherramienta'>Eliminar</button></td></tr>";

        var btn = document.createElement("TR");
        btn.innerHTML = fila;
        document.getElementById("tablita1").appendChild(btn);

        var datosFilas = {};

        datosFilas.maquinaria = maquinaria;
        datosFilas.implemento = implemento;
        datosFilas.km = km;
        datosFilas.valor = valor;
        datosFilas.valorTotal = valorTotal;


        loteHerramientas.push(datosFilas);
        console.log(datosFilas);

        console.log(loteHerramientas);


        $('#maquinaria').val('');
        $('#implemento').val('');
        $('#km').val('');
        $('#valor').val('');
        $('#total').val('');

    });
    $(document).on('click', '#eliminarherramienta', function() {
        let codigoT;
        codigoT = $(this).parents('tr').find('.codigoherramienta').text();

        $(this).closest('tr').remove();

        loteHerramientas = loteHerramientas.filter(materiaprima => materiaprima.maquinaria !== codigoT);
        console.log(loteHerramientas);
    });


    $('#terminar').click(function() {
        let loteH = JSON.stringify(loteHerramientas);
        $('#lote').val(loteH);
        $('#editarMaquinaria').submit();
    });
    
});
</script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?>  