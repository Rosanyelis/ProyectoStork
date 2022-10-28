<?php 

include("../../modelos/conn.php");


//vaciado
$estado ='Ingresado';
$nOT =$_POST['nOT'];
$nAOT  =$_POST['n_aot'];
$fecha_rotr =$_POST['fecha_rotr'];

//insertamos Vaciado_1
$insertar = sqlsrv_prepare($conn,("INSERT INTO Registro_ot
(
N_aot,N_ot,Fecha_rotr,Estado)
VALUES (
'$nAOT','$nOT','$fecha_rotr','$estado')"));

sqlsrv_execute($insertar);

?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script type="text/javascript">
alert('agregado con exito el registro de OT');
window.location.href = "registro_ot_id.php";
</script>