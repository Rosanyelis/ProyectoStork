<?php 

include("../../modelos/conn.php");


//vaciado
$estado ='Ingresado';
$fechaAvance = $_POST['FechaEjecucion'];
$responsable = $_POST['Responsable'];
$pendientes = $_POST['Pendientes'];
$ejecutadas = $_POST['Ejecutadas'];
$nOT = $_POST['nOT'];

$Total = $pendientes - $ejecutadas;


//insertamos Vaciado_1
$insertar = sqlsrv_prepare($conn,("INSERT INTO LoteRegistroEjecucion(id_ejecucion,fechaAvance,responsable,pendientes,ejecutadas)VALUES ('$nOT','$fechaAvance','$responsable','$pendientes','$ejecutadas')"));
sqlsrv_execute($insertar);

$estado = 'en curso';

$consulta = sqlsrv_prepare($conn,("UPDATE Ejecucion SET estado='$estado' WHERE id_ejecucion ='$nOT'"));
sqlsrv_execute($consulta);

$consultaCambioStock = sqlsrv_prepare($conn,("UPDATE AsignacionTrabajo SET hilerasDisponibles='$Total' WHERE n_aot ='$nOT'"));
sqlsrv_execute($consultaCambioStock);

if ($Total == 0) {

    $estado = 'terminado';

    $consulta = sqlsrv_prepare($conn,("UPDATE Ejecucion SET estado='$estado' WHERE id_ejecucion ='$nOT'"));
    sqlsrv_execute($consulta);
}

?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script type="text/javascript">
alert('agregado con exito el registro de OT');

<?php if ($Total == 0) {?>
    window.location.href = "registro_ot_id.php";
<?php }else {?>
    window.location.href = "registro_ot_realizada.php?ID=<?php echo $nOT ?>";
<?php } ?>


</script>