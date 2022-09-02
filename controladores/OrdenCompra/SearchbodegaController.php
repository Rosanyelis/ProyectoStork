<?php

require_once("../../modelos/OrdenCompraModel.php");

# Eliminamos los espacios del principio y final del dato
$codigo   = trim($_REQUEST['codproducto']);

$instancia = new OrdenCompra();
$data = $instancia->searchProducto($codigo);

return $data;