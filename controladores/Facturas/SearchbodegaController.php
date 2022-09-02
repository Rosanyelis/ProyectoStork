<?php

require_once("../../modelos/FacturaModel.php");

# Eliminamos los espacios del principio y final del dato
$codigo   = trim($_REQUEST['codproducto']);

$instancia = new Factura();
$data = $instancia->searchProducto($codigo);

return $data;