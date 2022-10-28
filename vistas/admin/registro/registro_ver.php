<?php

include("../conn.php");

date_default_timezone_set("America/Santiago");


$num_rotr = $_POST['num_rotr'];

$consultarotr = sqlsrv_query($conn,("SELECT * FROM Registro_ot WHERE N_rotr = '$num_rotr'" ));
while ($fila = sqlsrv_fetch_array($consultarotr,SQLSRV_FETCH_ASSOC)) {
    $num_ot = $fila['N_ot'];
    $num_aot = $fila['N_aot'];
    $fecha_rotr = $fila['Fecha_rotr']->format('d/m/Y');
}


$consultaAOT = sqlsrv_query($conn,("SELECT * FROM Asignacion_ot WHERE N_aot = '$num_aot'" ));
while ($fila = sqlsrv_fetch_array($consultaAOT,SQLSRV_FETCH_ASSOC)) {
    $fecha_aot = $fila['Fecha_aot']->format('d/m/Y');
    $colaborador1 =$fila['colaborador_1'];
    $maquinaria1 =$fila['maquinaria_1'];
    $implemento1 =$fila['implemento_1'];
    $colaborador2 =$fila['colaborador_2'];
    $maquinaria2 =$fila['maquinaria_2'];
    $implemento2 =$fila['implemento_2'];
    $colaborador3 =$fila['colaborador_3'];
    $maquinaria3 =$fila['maquinaria_3'];
    $implemento3 =$fila['implemento_3'];
    $colaborador4 =$fila['colaborador_4'];
    $maquinaria4 =$fila['maquinaria_4'];
    $implemento4 =$fila['implemento_4'];
}


$consultaVac1 = sqlsrv_query($conn,("SELECT * FROM Vaciado_1 WHERE N_ot = '$num_ot'" ));
while ($fila = sqlsrv_fetch_array($consultaVac1,SQLSRV_FETCH_ASSOC)) {
    $codIntItem1 = $fila['Cod_int_item_1'];
    $codIntItem2 = $fila['Cod_int_item_2'];
    $codIntItem3 = $fila['Cod_int_item_3'];
    $codIntItem4 = $fila['Cod_int_item_4'];
    $codIntItem5 = $fila['Cod_int_item_5'];
    $codIntItem6 = $fila['Cod_int_item_6'];
}

$consultaItem1 = sqlsrv_query($conn,("SELECT * FROM item WHERE cod_int_item = '$codIntItem1'" ));
while ($fila = sqlsrv_fetch_array($consultaItem1,SQLSRV_FETCH_ASSOC)) {
    $descripcionItem1 = $fila['n_item'];
    $codItem1 = $fila['c_item'];
    $unidItem1 = $fila['n_unidad'];
}
$consultaItem2 = sqlsrv_query($conn,("SELECT * FROM item WHERE cod_int_item = '$codIntItem2'" ));
while ($fila = sqlsrv_fetch_array($consultaItem2,SQLSRV_FETCH_ASSOC)) {
    $descripcionItem2 = $fila['n_item'];
    $codItem2 = $fila['c_item'];
    $unidItem2 = $fila['n_unidad'];
}
$consultaItem3 = sqlsrv_query($conn,("SELECT * FROM item WHERE cod_int_item = '$codIntItem3'" ));
while ($fila = sqlsrv_fetch_array($consultaItem3,SQLSRV_FETCH_ASSOC)) {
    $descripcionItem3 = $fila['n_item'];
    $codItem3 = $fila['c_item'];
    $unidItem3 = $fila['n_unidad'];
}
$consultaItem4 = sqlsrv_query($conn,("SELECT * FROM item WHERE cod_int_item = '$codIntItem4'" ));
while ($fila = sqlsrv_fetch_array($consultaItem4,SQLSRV_FETCH_ASSOC)) {
    $descripcionItem4 = $fila['n_item'];
    $codItem4 = $fila['c_item'];
    $unidItem4 = $fila['n_unidad'];
}
$consultaItem5 = sqlsrv_query($conn,("SELECT * FROM item WHERE cod_int_item = '$codIntItem5'" ));
while ($fila = sqlsrv_fetch_array($consultaItem5,SQLSRV_FETCH_ASSOC)) {
    $descripcionItem5 = $fila['n_item'];
    $codItem5 = $fila['c_item'];
    $unidItem5 = $fila['n_unidad'];
}
$consultaItem6 = sqlsrv_query($conn,("SELECT * FROM item WHERE cod_int_item = '$codIntItem6'" ));
while ($fila = sqlsrv_fetch_array($consultaItem6,SQLSRV_FETCH_ASSOC)) {
    $descripcionItem6 = $fila['n_item'];
    $codItem6 = $fila['c_item'];
    $unidItem6 = $fila['n_unidad'];
}


$consultaVac = sqlsrv_query($conn,("SELECT * FROM Vaciado_1 WHERE N_ot = '$num_ot'" ));
$consultaOT = sqlsrv_query($conn,("SELECT * FROM Vaciado WHERE N_ot = '$num_ot'" ));

while ($fila = sqlsrv_fetch_array($consultaOT,SQLSRV_FETCH_ASSOC)) {
    $responsable = $fila['Responsable'];
    $Fecha = $fila['Fecha']->format('d/m/Y');
    $Rut = $fila['Rut'];
    $notas = $fila['Notas'];
    $Cod_labor = $fila['Cod_labor'];
    $lugar_aplicacion = $fila['Lugar_aplicacion'];
    $nombre_especie = $fila['Nombre_especie'];
    $nombre_variedad = $fila['Nombre_variedad'];
    $nombre_combinacion = $fila['Nombre_combinacion'];
    $nombre_campo = $fila['Nombre_campo'];
    $nombre_cc = $fila['Nombre_cc'];
    $Has_afectadas = $fila['Has_afectadas'];
    $n_hileras = $fila['N_hileras'];
    $hilera_apl = $fila['Hileras_aplicar'];
    $nombre_maquinaria = $fila['Nombre_tipo_maquinaria'];
    $nombre_implemento = $fila['Nombre_tipo_implemento'];
    $capacidadMaquinaria = $fila['Capacidad_maquinaria'];
    $hil_pot = $fila['Hil_pot'];
    $estado_fenologico = $fila['Estado_fenologico'];
    $mojamiento = $fila['Mojamiento'];
    $vol_boquillas = $fila['Vol_boquillas'];
    $veloSug = $fila['Velo_sug'];
    $ef = $fila['Ef'];
    $hilera_estimada = $fila['Hilera_estimada'];
}

$consultaLabor = sqlsrv_query($conn,("SELECT * FROM Grupo_faena WHERE cod_labor = '$Cod_labor'" ));
while ($fila = sqlsrv_fetch_array($consultaLabor,SQLSRV_FETCH_ASSOC)) {
    $nombre_labor = $fila['nombre_labor'];
    $nombre_faena = $fila['nombre_faena'];
    $nombre_grupo = $fila['nombre_grupo'];
}

$consultaMaquinaria1 = sqlsrv_query($conn,("SELECT * FROM Tipo_maquinaria" ));
$consultaMaquinaria2 = sqlsrv_query($conn,("SELECT * FROM Tipo_maquinaria" ));
$consultaMaquinaria3 = sqlsrv_query($conn,("SELECT * FROM Tipo_maquinaria" ));
$consultaMaquinaria4 = sqlsrv_query($conn,("SELECT * FROM Tipo_maquinaria" ));
$consultaImplemento1 = sqlsrv_query($conn,("SELECT * FROM Tipo_implemeto" ));
$consultaImplemento2 = sqlsrv_query($conn,("SELECT * FROM Tipo_implemeto" ));
$consultaImplemento3 = sqlsrv_query($conn,("SELECT * FROM Tipo_implemeto" ));
$consultaImplemento4 = sqlsrv_query($conn,("SELECT * FROM Tipo_implemeto" ));


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
    * {
        margin: 0px;
        padding: 0px;
    }

    #header {
        margin: auto;
        width: 600px;
        font-family: Arial, Helvetica, sans-serif;
    }

    ul,
    ol {
        list-style: none;
    }

    .nav>li {
        float: left;
    }

    .nav li a {
        background-color: transparent;
        color: #fff;
        text-decoration: none;
        padding: 10px 12px;
        display: block;
    }

    .nav li a:hover {
        background-color: #434343;
        color: black;
    }

    .nav li ul {
        display: none;
        position: absolute;
        min-width: 140px;
    }

    .nav li:hover>ul {
        display: block;
    }

    .nav li ul li {
        position: relative;
    }

    .nav li ul li ul {
        right: -140px;
        top: 0px;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPC Agro</title>
    <link rel="stylesheet" href="../../build/css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <header class="header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="../../menu.php">
                    <img src="" alt="Logo">
                </a>

                <div class="mobile-menu">
                    <img src="../../build/img/barras.svg" alt="icono menu responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="../../build/img/dark-mode.svg">
                    <div id="header">
                        <ul class="nav">
                            <li>
                                <a href="../ODEN/orden_de_trabajo.php">Orden De Trabajo</a>
                            </li>
                            <li>
                                <a href="../ASIGNACION/asignacion_ot_id.php">Asignación OT</a>
                            </li>
                            <li>
                                <a href="registro_ot_id.php">Registro De OT Realizada</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <center>
        <h1><b>Registro De OT Realizada</b></h1>
        <div class="container-fluid" id="campo">
            <p><br><br></p>
            <form action="registro_back.php" method="post">

                <div class="row col-md-12 " id="bg">
                    <div class="col-md-1 mb-3">
                        <br>
                        <label for="validationServer01">NºOT:</label>
                        <input type="text" id="nOT" name="nOT" class="form-control" placeholder=""
                            value="<?php echo $num_ot?>" readonly>
                    </div>
                    <div class="col-md-2 mb-3">
                        <br>
                        <label for="validationServer01">Fecha:</label>
                        <input type="text" id="responsable" name="responsable" class="form-control" placeholder=""
                            value="<?php echo $Fecha?>" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <br>
                        <label for="validationServer01">Responsable:</label>
                        <input type="text" id="responsable" name="responsable" class="form-control" placeholder=""
                            value="<?php echo $responsable?>" readonly>
                    </div>
                    <div class="col-md-1 mb-3">
                        <br>
                        <label for="validationServer01">NºAOT:</label>
                        <input type="text" id="n_aot" name="n_aot" class="form-control" placeholder=""
                            value="<?php echo $num_aot?>" readonly>
                    </div>
                    <div class="col-md-2 mb-3">
                        <br>
                        <label for="validationServer01">Fecha AOT:</label>
                        <input type="text" id="responsable" name="responsable" class="form-control" placeholder=""
                            value="<?php echo $fecha_aot?>" readonly>
                    </div>
                    <div class="col-md-1 mb-3">
                        <br>
                        <label for="validationServer01">NºROTR:</label>
                        <input type="text" id="responsable" name="responsable" class="form-control" placeholder=""
                            value="<?php echo $num_rotr?>" readonly>
                    </div>
                    <div class="col-md-2 mb-3">
                        <br>
                        <label for="validationServer01">Fecha ROTR:</label>
                        <input type="text" id="fecha_rotr" name="fecha_rotr" class="form-control" placeholder="e"
                            value="<?php echo $fecha_rotr?>" readonly>
                    </div>

                    <div class="col-md-12 ">
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="table-light">Labor</th>
                                    <th scope="col" class="table-light">Estado Fenológico</th>
                                    <th scope="col" class="table-light">Nombre Especie</th>
                                    <th scope="col" class="table-light">Nombre Variedad(*)</th>
                                    <th scope="col" class="table-light">Nombre Combinación</th>
                                    <th scope="col" class="table-light">Faena</th>
                                    <th scope="col" class="table-light">Grupo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="table-light"><?php echo $nombre_labor?></th>
                                    <td class="table-light"><?php echo $estado_fenologico?></td>
                                    <td class="table-light"><?php echo $nombre_especie?></td>
                                    <td class="table-light"><?php echo $nombre_variedad?></td>
                                    <td class="table-light"><?php echo $nombre_combinacion?></td>
                                    <td class="table-light"><?php echo $nombre_faena?></td>
                                    <td class="table-light"><?php echo $nombre_grupo?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row col-md-12 ">
                        <div class="col-md-6">
                            <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="table-light">Colaboradores</th>
                                        <th scope="col" class="table-light">Maquinaria</th>
                                        <th scope="col" class="table-light">Implemento</th>
                                </thead>
                                <tbody>
                                    <?php if($colaborador1 != null) { ?>
                                    <tr>
                                        <th class="table-light"><?php echo $colaborador1?>

                                        </th>
                                        <th class="table-light"><?php echo $maquinaria1?>

                                        </th>
                                        <th class="table-light"><?php echo $implemento1?>

                                        </th>

                                    </tr>
                                    <?php } ?>

                                    <?php if($colaborador2 != null) { ?>
                                    <tr>
                                        <th class="table-light"><?php echo $colaborador2?>

                                        </th>
                                        <th class="table-light"><?php echo $maquinaria2?>

                                        </th>
                                        <th class="table-light"><?php echo $implemento2?>

                                        </th>
                                    </tr>
                                    <?php } ?>

                                    <?php if($colaborador3 != null) { ?>
                                    <tr>
                                        <th class="table-light"><?php echo $colaborador3?>

                                        </th>
                                        <th class="table-light"><?php echo $maquinaria3?>

                                        </th>
                                        <th class="table-light"><?php echo $implemento3?>

                                        </th>
                                    </tr>
                                    <?php } ?>

                                    <?php if($colaborador4 != null) { ?>
                                    <tr>
                                        <th class="table-light"><?php echo $colaborador4?>

                                        </th>
                                        <th class="table-light"><?php echo $maquinaria4?>

                                        </th>
                                        <th class="table-light"><?php echo $implemento4?>

                                        </th>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-2 ">
                            <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="table-light">Mojamiento</th>
                                        <th scope="col" class="table-light">Litros</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="table-light">mojamiento 01</th>
                                        <th class="table-light">2,000</th>
                                    </tr>
                                    <tr>
                                        <th class="table-light">mojamiento 02</th>
                                        <th class="table-light">2,000</th>
                                    </tr>
                                    <tr>
                                        <th class="table-light">mojamiento 03</th>
                                        <th class="table-light">2,000</th>
                                    </tr>
                                    <tr>
                                        <th class="table-light">mojamiento 04</th>
                                        <th class="table-light">2,000</th>
                                    </tr>
                                    <tr>
                                        <th class="table-light">mojamiento 05</th>
                                        <th class="table-light">2,000</th>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="table-light">Mojamiento</th>
                                        <th scope="col" class="table-light">Litros</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="table-light">mojamiento 06</th>
                                        <th class="table-light">2,000</th>
                                    </tr>
                                    <tr>
                                        <th class="table-light">mojamiento 07</th>
                                        <th class="table-light">2,000</th>
                                    </tr>
                                    <tr>
                                        <th class="table-light">mojamiento 08</th>
                                        <th class="table-light">2,000</th>
                                    </tr>
                                    <tr>
                                        <th class="table-light">mojamiento 09</th>
                                        <th class="table-light">2,000</th>
                                    </tr>
                                    <tr>
                                        <th class="table-light">mojamiento 10</th>
                                        <th class="table-light">2,000</th>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <table class="table table-bordered">
                                <br><br>
                                <thead>
                                    <tr>
                                        <th scope="col" class="table-light">hás Trabajadas</th>
                                        <th class="table-light">17.9</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="col" class="table-light">Total Mojamiento</th>
                                        <th class="table-light">4.000</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="table-light">Mojamiento por há</th>
                                        <th class="table-light">223</th>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="table-light">Nº OT</th>
                                    <th scope="col" class="table-light">Cod Int</th>
                                    <th scope="col" class="table-light">Descripción Item</th>
                                    <th scope="col" class="table-light">Cód Item</th>
                                    <th scope="col" class="table-light">Unidad Item</th>
                                    <th scope="col" class="table-light">Dilución cada 100 lts</th>
                                    <th scope="col" class="table-light">Dosis por Há</th>
                                    <th scope="col" class="table-light">TotalProd.</th>
                                    <th scope="col" class="table-light">Saldo Stock</th>
                                    <th scope="col" class="table-light">Mojamiento</th>
                                    <th scope="col" class="table-light">Hileras seleccionadas</th>
                                    <th scope="col" class="table-light">Hás</th>
                                    <th scope="col" class="table-light">Hileras OK</th>
                            </thead>
                            <tbody>
                                <?php while ($fila = sqlsrv_fetch_array($consultaVac, SQLSRV_FETCH_ASSOC)) : ?>
                                <?php if($fila['Cod_int_item_1'] > 0) { ?>
                                <tr>
                                    <th class="table-light"><?php echo $fila['N_ot'];?></th>
                                    <th class="table-light"><?php echo $fila['Cod_int_item_1'];?></th>
                                    <th class="table-light"><?php echo $descripcionItem1?></th>
                                    <th class="table-light"><?php echo $codItem1?></th>
                                    <th class="table-light"><?php echo $unidItem1?></th>
                                    <th class="table-light"><?php echo $fila['Disolucion_1'];?></th>
                                    <th class="table-light"><?php echo $fila['Dosis_1'];?></th>
                                    <th class="table-light"><?php echo $fila['Total_prod_1'];?></th>
                                    <th class="table-light"><?php echo $fila['Stock_1'];?></th>
                                    <th class="table-light"><?php echo $mojamiento?></th>
                                    <th class="table-light">1</th>
                                    <th class="table-light">2000</th>
                                    <th class="table-light"><input type="date" name="" id=""></th>

                                </tr>
                                <?php } ?>
                                <?php if($fila['Cod_int_item_2'] > 0) { ?>
                                <tr>
                                    <th class="table-light"><?php echo $fila['N_ot'];?></th>
                                    <th class="table-light"><?php echo $fila['Cod_int_item_2'];?></th>
                                    <th class="table-light"><?php echo $descripcionItem2?></th>
                                    <th class="table-light"><?php echo $codItem2?></th>
                                    <th class="table-light"><?php echo $unidItem2?></th>
                                    <th class="table-light"><?php echo $fila['Disolucion_2'];?></th>
                                    <th class="table-light"><?php echo $fila['Dosis_2'];?></th>
                                    <th class="table-light"><?php echo $fila['Total_prod_2'];?></th>
                                    <th class="table-light"><?php echo $fila['Stock_2'];?></th>
                                    <th class="table-light"><?php echo $mojamiento?></th>
                                    <th class="table-light">1</th>
                                    <th class="table-light">2000</th>
                                    <th class="table-light"><input type="date" name="" id=""></th>

                                </tr>
                                <?php } ?>
                                <?php if($fila['Cod_int_item_3'] > 0) { ?>
                                <tr>
                                    <th class="table-light"><?php echo $fila['N_ot'];?></th>
                                    <th class="table-light"><?php echo $fila['Cod_int_item_3'];?></th>
                                    <th class="table-light"><?php echo $descripcionItem3?></th>
                                    <th class="table-light"><?php echo $codItem3?></th>
                                    <th class="table-light"><?php echo $unidItem3?></th>
                                    <th class="table-light"><?php echo $fila['Disolucion_3'];?></th>
                                    <th class="table-light"><?php echo $fila['Dosis_3'];?></th>
                                    <th class="table-light"><?php echo $fila['Total_prod_3'];?></th>
                                    <th class="table-light"><?php echo $fila['Stock_3'];?></th>
                                    <th class="table-light"><?php echo $mojamiento?></th>
                                    <th class="table-light">1</th>
                                    <th class="table-light">2000</th>
                                    <th class="table-light"><input type="date" name="" id=""></th>

                                </tr>
                                <?php } ?>
                                <?php if($fila['Cod_int_item_4'] > 0) { ?>
                                <tr>
                                    <th class="table-light"><?php echo $fila['N_ot'];?></th>
                                    <th class="table-light"><?php echo $fila['Cod_int_item_4'];?></th>
                                    <th class="table-light"><?php echo $descripcionItem4?></th>
                                    <th class="table-light"><?php echo $codItem4?></th>
                                    <th class="table-light"><?php echo $unidItem4?></th>
                                    <th class="table-light"><?php echo $fila['Disolucion_4'];?></th>
                                    <th class="table-light"><?php echo $fila['Dosis_4'];?></th>
                                    <th class="table-light"><?php echo $fila['Total_prod_4'];?></th>
                                    <th class="table-light"><?php echo $fila['Stock_4'];?></th>
                                    <th class="table-light"><?php echo $mojamiento?></th>
                                    <th class="table-light">1</th>
                                    <th class="table-light">2000</th>
                                    <th class="table-light"><input type="date" name="" id=""></th>

                                </tr>
                                <?php } ?>
                                <?php if($fila['Cod_int_item_5'] > 0) { ?>
                                <tr>
                                    <th class="table-light"><?php echo $fila['N_ot'];?></th>
                                    <th class="table-light"><?php echo $fila['Cod_int_item_5'];?></th>
                                    <th class="table-light"><?php echo $descripcionItem5?></th>
                                    <th class="table-light"><?php echo $codItem5?></th>
                                    <th class="table-light"><?php echo $unidItem5?></th>
                                    <th class="table-light"><?php echo $fila['Disolucion_5'];?></th>
                                    <th class="table-light"><?php echo $fila['Dosis_5'];?></th>
                                    <th class="table-light"><?php echo $fila['Total_prod_5'];?></th>
                                    <th class="table-light"><?php echo $fila['Stock_5'];?></th>
                                    <th class="table-light"><?php echo $mojamiento?></th>
                                    <th class="table-light">1</th>
                                    <th class="table-light">2000</th>
                                    <th class="table-light"><input type="date" name="" id=""></th>

                                </tr>
                                <?php } ?>
                                <?php if($fila['Cod_int_item_6'] > 0) { ?>
                                <tr>
                                    <th class="table-light"><?php echo $fila['N_ot'];?></th>
                                    <th class="table-light"><?php echo $fila['Cod_int_item_6'];?></th>
                                    <th class="table-light"><?php echo $descripcionItem6?></th>
                                    <th class="table-light"><?php echo $codItem6?></th>
                                    <th class="table-light"><?php echo $unidItem6?></th>
                                    <th class="table-light"><?php echo $fila['Disolucion_6'];?></th>
                                    <th class="table-light"><?php echo $fila['Dosis_6'];?></th>
                                    <th class="table-light"><?php echo $fila['Total_prod_6'];?></th>
                                    <th class="table-light"><?php echo $fila['Stock_6'];?></th>
                                    <th class="table-light"><?php echo $mojamiento?></th>
                                    <th class="table-light">1</th>
                                    <th class="table-light">2000</th>
                                    <th class="table-light"><input type="date" name="" id=""></th>

                                </tr>
                                <?php } ?>

                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row col-md-12 ">
                        <br>
                        <a href="registro_ot_id.php" class="btn float-right btn btn-primary btn-lg">Volver</a>
                        <p><br></p>
                    </div>
                </div>
            </form>
        </div>
        <br><br><br>
        <footer class="footer seccion">
            <div class="contenedor contenedor-footer">

            </div>

            <p class="copyright">Todos los derechos reservados <?php echo date('Y')?></p>
        </footer>

        <script src="../../build/js/bundle.min.js"></script>

</body>

</html>

<style>
#bg {
    border: 1px solid black;
    box-sizing: border-box;
    background: #D5DBDB;
}

#campo {
    margin-left: 2%;
}
</style>