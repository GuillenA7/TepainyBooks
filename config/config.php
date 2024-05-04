<?php

define("CLIENT_ID", "AVY1j-RdBnlFoF2LnPT4gvkGu1-FyOtDVp-SgyzARzrUe8atAoOztdVPSOR-s0DXBTl8sUwjhd1ac3fA");
define("CURRENCY", "MXN");
define("KEY_TOKEN", "APR.wqc-354*");
define("MONEDA", "$");

session_start();

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}

?>