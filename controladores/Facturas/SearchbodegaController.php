<?php

require_once("../../modelos/FacturaModel.php");

# Eliminamos los espacios del principio y final del dato
$codigo   = trim($_REQUEST['codproducto']);
# instancia el proceso de busqueda 
$instancia = new Factura();
$data = $instancia->searchProducto($codigo);
# retorna los datos
return $data;