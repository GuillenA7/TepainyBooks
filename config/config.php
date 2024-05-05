<?php

#--------------------------------------------------------------------
# Configuración del sistema
#--------------------------------------------------------------------

/**
 * URL de la tienda
 *
 * Agregar / al final
 */
define('SITE_URL', 'http://localhost/tepainybooks/');

/**
 * Clave o contraseña para cifrado.
 */
define("KEY_CIFRADO", "ABCD.1234-");

/**
 * Metodo de cifrado OpenSSL.
 *
 * https://www.php.net/manual/es/function.openssl-get-cipher-methods.php
 */
define("METODO_CIFRADO", "aes-128-cbc");

/**
 * Simbolo de moneda
 */
define("MONEDA", "$");

#--------------------------------------------------------------------
# Configuración para Paypal
#--------------------------------------------------------------------
define("CLIENT_ID", "AVY1j-RdBnlFoF2LnPT4gvkGu1-FyOtDVp-SgyzARzrUe8atAoOztdVPSOR-s0DXBTl8sUwjhd1ac3fA");
define("CURRENCY", "MXN");

define("KEY_TOKEN", "APR.wqc-354*");

#--------------------------------------------------------------------
# Datos para envio de correo electronico
#--------------------------------------------------------------------
define("MAIL_HOST", "smtp.gmail.com");
define("MAIL_USER", "adrianguillen2004@gmail.com");
define("MAIL_PASS", "");
define("MAIL_PORT", "587");

// Sesión para tienda
session_name('ecommerce_session');
session_start();

$num_cart = 0;
if (isset($_SESSION['carrito']['productos'])) {
    $num_cart = count($_SESSION['carrito']['productos']);
}
