<?php include '../../../controladores/validarSesionController.php' ?>
<?php
include "../../../modelos/conn.php";

date_default_timezone_set('America/Santiago');



$labor = $_POST['labor'];
$campo = $_POST['Campo'];
$CC = $_POST['centrocosto'];
$grupo = $_POST['grupo'];

$consultaLabor = sqlsrv_query($conn,("SELECT * FROM Labor WHERE id_Labor = '$labor'" ));
while ($fila2 = sqlsrv_fetch_array($consultaLabor,SQLSRV_FETCH_ASSOC)) {
    $nombreLabor =$fila2['nombre'];
}


$metros = 0;
$arboles = 0;
if ($CC == "Todos Los Centro Costos") {
    $nombreCC = 'Todos Los Centros De Costos';
    $query = sqlsrv_query($conn,("SELECT SUM(area_cc) as area, SUM(cantidad_hilera) as hileras, SUM(cantidad_calle) as calles
                                            FROM CentroCosto WHERE id_Campo = '$campo'" ));
    while ($fila = sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC)) {
        $areaHil = $fila['area'];
        $cantHilera = $fila['hileras'];
        $cantCalle = $fila['calles'];
    }

    
    // $areaHil = 0;
    // $cantHilera = 0;
    // $cantCalle = 0;
} else {
    $consultaCC = sqlsrv_query($conn,("SELECT * FROM CentroCosto WHERE id_CC= '$CC'" ));
    while ($fila3 = sqlsrv_fetch_array($consultaCC,SQLSRV_FETCH_ASSOC)) {
        $nombreCC = $fila3['nombre'];
        $areaHil = $fila3['area_cc'];
        $cantHilera = $fila3['cantidad_hilera'];
        $cantCalle = $fila3['cantidad_calle'];
    }

    $consultaArbolesYMetros = sqlsrv_query($conn,("SELECT SUM(largo_hilera) as largo_hilera, SUM(plantas_vivas) as plantas FROM Hilera_cc WHERE id_CC = $CC AND id_campo = $campo" ));
    while ($fila5 = sqlsrv_fetch_array($consultaArbolesYMetros,SQLSRV_FETCH_ASSOC)) {
        $metros = $fila5['largo_hilera'];
        $arboles = $fila5['plantas'];
    }
}







$consultaCampo = sqlsrv_query($conn,("SELECT * FROM Campo WHERE id_Campo = '$campo'" ));
while ($fila = sqlsrv_fetch_array($consultaCampo,SQLSRV_FETCH_ASSOC)) {
    $nombreCampo =$fila['nombre'];
}








$consultaGrupo = sqlsrv_query($conn,("SELECT * FROM Grupo WHERE id_Grupo = '$grupo'" ));
while ($fila1 = sqlsrv_fetch_array($consultaGrupo,SQLSRV_FETCH_ASSOC)) {
    $nombreGrupo=trim($fila1['nombre']);
}

$consultaMaquinaria = sqlsrv_query($conn,("SELECT * FROM maquinaria WHERE campo_id = '$campo' OR campo_id = NULL" ));

$consultaImplemento = sqlsrv_query($conn,("SELECT * FROM implementos WHERE campo_id = '$campo'" ));

$consultaProductos = sqlsrv_query($conn,("SELECT * FROM item WHERE n_familia = '$nombreGrupo'" ));


?>

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
                    <h2 class="content-header-title float-left mb-0">Agregar Presupuesto</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class=" breadcrumb-right">
                <!-- <a href="campos.php" class="btn btn-dark" ><span><i data-feather='arrow-left'></i>Regresar</span></a> -->
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Kick start -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"></h4>
            </div>
            <div class="card-body">



                <div class="container-fluid" id="campo">
                    <div class="row col-md-12 " id="bg">
                        <div class="col-md-3 mb-3">
                            <br> <br>
                            <label for="validationServer01">Fecha Inicio:</label>
                            <input type="date" id="fechaInicio" name="fechaInicio" class="form-control" placeholder="">
                            <br>
                        </div>
                        <div class="col-md-3 mb-3">
                            <br> <br>
                            <label for="validationServer01">Fecha Termino:</label>
                            <input type="date" id="fechaTermino" name="fechaTermino" class="form-control"
                                placeholder="">
                            <br>
                        </div>
                        <div class="col-md-4 mb-3">

                        </div>
                        <div class="col-md-2">
                            <br> <br>
                            <label for="validationServer01">Fecha:</label>
                            <input type="text" id="fecha" name="fecha" class="form-control" placeholder=""
                                value="<?php echo date("Y-m-d")?>" readonly>
                            <br>
                        </div>
                    </div>
                    <div class="row col-md-12" id="bg">
                        <input type="hidden" id="cantidadMetros" name="cantidadMetros" class="form-control"
                            value="<?php echo $metros; ?>">
                        <input type="hidden" id="cantidadHilera" name="cantidadHilera" class="form-control"
                            value="<?php echo $cantHilera; ?>">
                        <input type="hidden" id="cantidadArboles" name="cantidadArboles" class="form-control"
                            value="<?php echo $arboles; ?>">
                        <div class="col-md-4 mb-3">
                            <br>
                            <br>
                            <label for="validationServer01">Campo:</label>
                            <input type="text" id="Ncampo" name="Ncampo" class="form-control" placeholder=""
                                value="<?php echo $nombreCampo; ?>">
                            <br>
                            <br>
                        </div>
                        <div class="col-md-4 mb-3">
                            <br>
                            <br>
                            <label for="validationServer01">Centro Costo:</label>
                            <input type="text" id="centroCosto" name="centroCosto" class="form-control" placeholder=""
                                value="<?php echo $nombreCC; ?>">
                            <br>
                            <br>
                        </div>
                        <div class="col-md-4 mb-3">
                            <br>
                            <br>
                            <label for="validationServer01">Labor:</label>
                            <input type="text" id="labor" name="labor" class="form-control" placeholder=""
                                value="<?php echo $nombreLabor; ?>">
                            <br>
                            <br>
                        </div>

                    </div>

                    <div class="row col-md-12 " id="bg">
                        <div class="col-md-3 mb-3">
                            <br>
                            <label for="validationServer01">Lugar Aplicaci??n:</label>
                            <select class="form-control" id="aplicacion" name="aplicacion">
                                <option value="4">---Seleccione Lugar---</option>
                                <option value="1">Camell??n</option>
                                <option value="2">Calle</option>
                                <option value="3">Area Total</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <br>
                            <label for="validationServer01">Hil Afectadas:</label>
                            <input type="text" id="hileraAfectada" name="hileraAfectada" class="form-control"
                                placeholder="" value="">
                        </div>
                        <div class="col-md-3 mb-3">
                            <br>
                            <label for="validationServer01">Metros x Hil:</label>
                            <input type="text" id="metroHilera" name="metroHilera" class="form-control" placeholder=""
                                value="">
                            <br>
                        </div>
                        <div class="col-md-3 mb-3">
                            <br>
                            <label for="validationServer01">Arboles x Hil:</label>
                            <input type="text" id="arbolHilera" name="arbolHilera" class="form-control" placeholder=""
                                value="">
                        </div>
                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-3 mb-3">
                                <h3 style="text-align:left">Maquinaria a Utilizar</h3>
                            </div>
                        </div>
                        <div class="row col-md-12 " id="bg">

                            <div class="col-md-3 mb-3">
                                <br>
                                <label for="validationServer01">Tipo Maquinaria:</label>
                                <select class="form-control" id="maquinaria" name="maquinaria">
                                    <option value="">---Seleccione Maquinaria---</option>
                                    <?php while ($fila = sqlsrv_fetch_array($consultaMaquinaria, SQLSRV_FETCH_ASSOC)) : ?>
                                    <option value="<?php echo trim($fila['c_maquinaria']); ?> - <?php echo utf8_decode($fila['n_maquinaria']) ?>">
                                    <?php echo trim($fila['c_maquinaria']); ?> - <?php echo utf8_decode($fila['n_maquinaria']) ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <br>
                                <label for="validationServer01">Tipo Implemento:</label>
                                <select class="form-control" id="implemento" name="implemento">
                                    <option value="">---Seleccione Implemento---</option>
                                    <?php while ($fila = sqlsrv_fetch_array($consultaImplemento, SQLSRV_FETCH_ASSOC)) : ?>
                                    <option value="<?php echo trim($fila['c_implemento']); ?> - <?php echo utf8_decode($fila['n_implemento']); ?>">
                                        <?php echo trim($fila['c_implemento']); ?> - <?php echo utf8_decode($fila['n_implemento']); ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-md-1 mb-3">
                                <br>
                                <label for="validationServer01">KM/H:</label>
                                <input type="text" id="km" name="km" class="form-control" placeholder="" value="">
                                <br>
                            </div>
                            <div class="col-md-2 mb-3">
                                <br>
                                <label for="validationServer01">Valor:</label>
                                <input type="text" id="valor" name="valor" class="form-control" placeholder="" value="">
                            </div>
                            <div class="col-md-2 mb-3">
                                <br>
                                <label for="validationServer01">Total:</label>
                                <input type="text" id="total" name="total" class="form-control" placeholder="" value="">
                            </div>
                            <div class="col-md-1 mb-3">
                                <br><br>
                                <button type="submit" id="agregarHerramientas" class="btn btn-primary">Agregar</button>
                            </div>

                        </div>
                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-4 mb-3">
                                <h3 style="text-align:left">Listado Maquinaria a Utilizar</h3>
                            </div>
                        </div>
                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-12 ">
                                <br>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="">Maquinaria</th>
                                            <th scope="col" class="table-light">Implemento</th>
                                            <th scope="col" class="table-light">KM/H</th>
                                            <th scope="col" class="table-light">Valor</th>
                                            <th scope="col" class="table-light">Valor Final</th>
                                            <th scope="col" class="table-light">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablita1">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-3 mb-3">
                            <br>
                            <br>
                                <h3 style="text-align:left">Productos a Utilizar</h3>
                            </div>
                        </div>
                        <div class="row col-md-12 " id="bg">

                            <div class="col-md-5 mb-3">
                                <br>
                                <label for="validationServer01">Productos a Utilizar:</label>
                                <select class="form-control" id="producto" name="producto">
                                    <option value="">---Seleccione Productos---</option>
                                    <?php while ($fila = sqlsrv_fetch_array($consultaProductos, SQLSRV_FETCH_ASSOC)) : ?>
                                    <option value="<?php echo $fila['n_item']; ?>">
                                        <?php echo utf8_decode($fila['n_item']) ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <br>
                                <label for="validationServer01">Unidad:</label>
                                <input type="text" id="unidad_producto" name="unidad_producto" class="form-control"
                                    placeholder="" value="">
                                <input type="hidden" id="unidad_producto_precio" name="unidad_producto_precio"
                                    class="form-control" placeholder="" value="0">
                                <br>
                            </div>
                            <div class="col-md-2 mb-3">
                                <br>
                                <label for="validationServer01">Cantidad:</label>
                                <input type="text" id="cantidad_producto" name="cantidad_producto" class="form-control"
                                    placeholder="" value="">
                            </div>
                            <div class="col-md-2 mb-3">
                                <br>
                                <label for="validationServer01">Valor:</label>
                                <input type="text" id="valor_producto" name="valor_producto" class="form-control"
                                    placeholder="" value="">
                            </div>
                            <div class="col-md-1 mb-3">
                                <br><br>
                                <button type="submit" id="agregarProducto" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                        <div class="row col-md-12 mb-3">
                            <div class="col-md-4 mb-3">
                                <h3 style="text-align:left">Listado Productos a Utilizar</h3>
                            </div>
                        </div>
                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-12 ">
                                <br>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="">Nombre</th>
                                            <th scope="col" class="table-light">Unidad</th>
                                            <th scope="col" class="table-light">Valor Unidad</th>
                                            <th scope="col" class="table-light">Cantidad</th>
                                            <th scope="col" class="table-light">Valor Final</th>
                                            <th scope="col" class="table-light">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablita">


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-2 mb-3">
                            <br>
                            <br>
                                <h3 style="text-align:left">Contratista</h3>
                            </div>
                        </div>
                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-3 mb-3">
                                <br>
                                <label for="validationServer01">Cantidad Personas:</label>
                                <input type="number" id="c_personas" name="c_personas" class="form-control"
                                    placeholder="" value="">
                            </div>
                            <div class="col-md-3 mb-3">
                                <br>
                                <label for="validationServer01">Valor Personas:</label>
                                <input type="number" id="v_personas" name="v_personas" class="form-control"
                                    placeholder="" value="">
                            </div>
                            <div class="col-md-3 mb-3">
                                <br>
                                <label for="validationServer01">Valor Final Personas:</label>
                                <input type="number" id="vf_personas" name="vf_personas" class="form-control"
                                    placeholder="" value="">
                            </div>
                        </div>

                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-2 mb-3">
                                <br>
                                <h3 style="text-align:left">SubTotales</h3>
                            </div>
                        </div>
                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-3 mb-3">
                                <br>
                                <label for="validationServer01">Valor Maquinaria:</label>
                                <input type="number" id="valor_herramientas_final" name="valor_herramientas_final"
                                    class="form-control" placeholder="" value="0">
                            </div>
                            <div class="col-md-3 mb-3">
                                <br>
                                <label for="validationServer01">Valor Productos:</label>
                                <input type="number" id="valor_productos_final" name="valor_productos_final"
                                    class="form-control" placeholder="" value="0">
                            </div>
                            <div class="col-md-3 mb-3">
                                <br>
                                <label for="validationServer01">Valor Contratista:</label>
                                <input type="number" id="valor_personas_final" name="valor_personas_final"
                                    class="form-control" placeholder="" value="0">
                            </div>
                        </div>
                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-2 mb-3">
                                <br>
                                <h3 style="text-align:left">Valorizado</h3>
                            </div>
                        </div>
                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-3 mb-3">
                                <br>
                                <label for="validationServer01">Valor Total:</label>
                                <input type="number" id="valorFinish" name="valorFinish" class="form-control"
                                    placeholder="" value="0">
                            </div>
                        </div>
                    </div>


                    <div class="row col-md-12 " id="bg">
                        <div class="row col-md-12 " id="bg">
                            <div class="col-md-5 mb-3">
                                <br>
                            </div>
                            <div class="col-md-3 mb-3">
                                <br><br>
                                <input type="hidden" id="cantidadAreaTotal" name="cantidadAreaTotal" value="<?php echo $areaHil; ?>">
                                <button type="button" id="terminar" class="btn btn-primary btn-block">Terminar </button>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include '../../layouts/footer.php'; ?>
<?php include '../../layouts/scripts.php'; ?>   
<!-- Incluir scripts en caso de ser necesario  -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {



            var loteProductos = [];
            var loteHerramientas = [];
            //productos
            $('#producto').change(function() {
                var cod = $('#producto').val();
                $.ajax({
                    type: 'POST',
                    url: '../../../controladores/OrdenTrabajo/SearchitemController.php',
                    data: {
                        producto: cod,
                    },
                    dataType: 'json',
                    success: function(r) {
                        console.log(r);
                        $('#unidad_producto').val(r.data.unidadItem);
                        $('#unidad_producto_precio').val(r.data.valor);
                        $('#valor_producto').val('');
                        $('#cantidad_producto').val('');
                        
                    },
                    error: function(response) {
                        console.log(response);
                        $('#unidad_producto').val('');
                        $('#valor_producto').val('');
                        $('#unidad_producto_precio').val('');
                        $('#cantidad_producto').val('');
                    }
                });
            })

            $('#cantidad_producto').keyup(function() {
                var cant = $('#cantidad_producto').val();
                var val = $('#unidad_producto_precio').val();

                var dato = cant * val;
                $('#valor_producto').val(dato);

            })

            $('#agregarProducto').click(function() {
                var nombre = $('#producto').val();
                var cant = $('#cantidad_producto').val();
                var valorUni = $('#unidad_producto_precio').val();
                var unidad = $('#unidad_producto').val();
                var valorTotal = parseInt($('#valor_producto').val());

                var valor_final_producto = parseInt($('#valor_productos_final').val());

                valor_final_producto = valor_final_producto + valorTotal;

                $('#valor_productos_final').val(valor_final_producto);

                //Pintar la tabla 
                var fila = "<tr><td class='codigoproducto'>" + nombre +
                    "</td><td>" + unidad +
                    "</td><td>" + valorUni + "</td><td>" + cant +
                    "</td><td class='sumaproducto'>" + valorTotal +
                    "</td><td><button class='btn btn-danger' id='eliminarproducto'>Eliminar</button></td></tr>";



                var btn = document.createElement("TR");
                btn.innerHTML = fila;
                document.getElementById("tablita").appendChild(btn);

                var datosFila = {};

                datosFila.nombre = nombre;
                datosFila.unidad = unidad;
                datosFila.valor_unidad = valorUni;
                datosFila.cantidad = cant;
                datosFila.valor_final = valorTotal;


                loteProductos.push(datosFila);
                console.log(datosFila);

                console.log(loteProductos);


                $('#producto').val('');
                $('#unidad_producto').val('');
                $('#valor_producto').val('');
                $('#unidad_producto_precio').val('');
                $('#cantidad_producto').val('');

            });

            $(document).on('click', '#eliminarproducto', function() {
                let codigoT;
                codigoT = $(this).parents('tr').find('.codigoproducto').text();

                let suma;
                suma = parseInt($(this).parents('tr').find('.sumaproducto').text());
                console.log(suma);

                var preciototal = $('#valor_productos_final').val();
                var preciototal = parseInt(preciototal);


                var precio_final = preciototal - suma;
                $('#valor_productos_final').val(precio_final);
                console.log(precio_final);



                $(this).closest('tr').remove();

                loteProductos = loteProductos.filter(materiaprima => materiaprima.nombre !==
                    codigoT);
                console.log(loteProductos);
            });

            //herramientas 
            $('#agregarHerramientas').click(function() {
                var maquinaria = $('#maquinaria').val();
                var implemento = $('#implemento').val();
                var km = $('#km').val();
                var valor = $('#valor').val();
                var valorTotal = parseInt($('#total').val());

                var valor_final_producto = parseInt($('#valor_herramientas_final').val());

                valor_final_producto = valor_final_producto + valorTotal;

                $('#valor_herramientas_final').val(valor_final_producto);

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

                let suma;
                suma = parseInt($(this).parents('tr').find('.sumaherramienta').text());
                console.log(suma);

                var preciototal = $('#valor_herramientas_final').val();
                var preciototal = parseInt(preciototal);


                var precio_final = preciototal - suma;
                $('#valor_herramientas_final').val(precio_final);
                console.log(precio_final);



                $(this).closest('tr').remove();

                loteProductos = loteProductos.filter(materiaprima => materiaprima.maquinaria !==
                    codigoT);
                console.log(loteProductos);
            });

            //maquinaria
            $('#valor').keyup(function() {
                var cant = $('#km').val();
                var val = $('#valor').val();

                var dato = cant * val;
                $('#total').val(dato);

            })

            //personas
            $('#v_personas').keyup(function() {
                var cant = $('#c_personas').val();
                var val = $('#v_personas').val();

                var dato = cant * val;
                $('#vf_personas').val(dato);

                $('#valor_personas_final').val(dato);

            });

            //actualizar precio final

            function PrecioFinal() {
                var p = parseInt($('#valor_personas_final').val());
                var h = parseInt($('#valor_herramientas_final').val());
                var pro = parseInt($('#valor_productos_final').val());

                var r = p + h + pro;
                $('#valorFinish').val(r);
            }


            //actualizar precio final cada 1 segundo
            setInterval(PrecioFinal, 1000);


            //area aplicacion
            $('#aplicacion').change(function() {
                var cod = $('#aplicacion').val();
                var metros = $('#cantidadMetros').val();
                var hileras = $('#cantidadHilera').val();
                var arboles = $('#cantidadArboles').val();
                if (cod == 4) {
                    $('#arbolHilera').val('');
                    $('#metroHilera').val('');
                    $('#hileraAfectada').val('');
                } else {
                    if (cod == 2) {
                        $('#arbolHilera').val(0);
                        $('#metroHilera').val(0);
                        $('#hileraAfectada').val(0);
                    } else {

                        $('#arbolHilera').val(arboles);
                        $('#metroHilera').val(metros);
                        $('#hileraAfectada').val(hileras);
                    }
                }

            })

            //terminar
            $('#terminar').click(function() {

                let fechaInicio = $('#fechaInicio').val();
                let fechaTermino = $('#fechaTermino').val();
                let fechaActual = $('#fecha').val();
                let Ncampo = $('#Ncampo').val();
                let centroCosto = $('#centroCosto').val();
                let labor = $('#labor').val();
                let lugarAplicacion = $('#aplicacion').val();
                let cantidadAreaTotal = $('#cantidadAreaTotal').val();
                let cantidadHileraTotal = $('#hileraAfectada').val();
                let cantidadArbolesTotal = $('#arbolHilera').val();
                let CantidadMetrosHileraTotal = $('#metroHilera').val();
                let cantidadPersona = $('#c_personas').val();
                let precioPersona = $('#v_personas').val();
                let valorFinalHerramienta = $('#valor_herramientas_final').val();
                let valorFinalProducto = $('#valor_productos_final').val();
                let valorFinalPersonal = $('#valor_personas_final').val();
                let valorFinal = $('#valorFinish').val();
                let loteProductoNew = JSON.stringify(loteProductos);
                let loteHerramientasNew = JSON.stringify(loteHerramientas);
                console.log(Ncampo);

                $.ajax({
                    url: 'agregar_presupuesto.php',
                    method: 'POST',
                    data: {
                        fechaInicio: fechaInicio,
                        fechaTermino: fechaTermino,
                        fechaActual: fechaActual,
                        Ncampo: Ncampo,
                        centroCosto: centroCosto,
                        labor: labor,
                        lugarAplicacion: lugarAplicacion,
                        cantidadAreaTotal: cantidadAreaTotal,
                        cantidadHileraTotal: cantidadHileraTotal,
                        cantidadArbolesTotal: cantidadArbolesTotal,
                        CantidadMetrosHileraTotal: CantidadMetrosHileraTotal,
                        cantidadPersona: cantidadPersona,
                        precioPersona: precioPersona,
                        valorFinalHerramienta: valorFinalHerramienta,
                        valorFinalProducto: valorFinalProducto,
                        valorFinalPersonal: valorFinalPersonal,
                        valorFinal: valorFinal,
                        loteProductoNew: loteProductoNew,
                        loteHerramientasNew: loteHerramientasNew,
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'El Registro ha sido creado exitosamente!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        //location.reload();
                        setTimeout(function() {
                            location.reload(1);
                        }, 1550);
                        window.location='../presupuesto/presupuesto.php';
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            });

        })
    </script>
<!-- Fin scripts en caso de ser necesario  -->
<?php include '../../layouts/finbody.php'; ?>  