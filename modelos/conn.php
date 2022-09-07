<?php 

$serverName = "DESKTOP-84OTVUB\SQLEXPRESS";//serverName\instanceName
$connectionInfo = array( "Database"=>"Storck", "UID"=>"sa", "PWD"=>"AdminSystem");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
            }
else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));}
?>