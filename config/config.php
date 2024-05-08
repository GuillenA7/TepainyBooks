<?php

/**
 * Parametros para configuración
 * Adrian Guillen
 * 22310361
 */

$path = dirname(__FILE__) . DIRECTORY_SEPARATOR;

require_once $path . 'database.php';
//require_once $path . '../clases/cifrado.php';

$db = new Database();
$con = $db->conectar();

$sql = "SELECT nombre, valor FROM configuracion";
$resultado = $con->query($sql);
$datosConfig = $resultado->fetchAll(PDO::FETCH_ASSOC);

$config = [];

foreach ($datosConfig as $datoConfig) {
    $config[$datoConfig['nombre']] = $datoConfig['valor'];
}


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
define("MONEDA", $config["tienda_moneda"]);

#--------------------------------------------------------------------
# Configuración para Paypal
#--------------------------------------------------------------------
define("CLIENT_ID", $config['paypal_cliente']);
define("CURRENCY", $config['paypal_moneda']);

define("KEY_TOKEN", "APR.wqc-354*");

#--------------------------------------------------------------------
# Datos para envio de correo electronico
#--------------------------------------------------------------------
define("MAIL_HOST", $config['correo_smtp']);
define("MAIL_USER", $config['correo_email']);
define("MAIL_PASS", $config['correo_password']);
define("MAIL_PORT", $config['correo_puerto']);

// Sesión para tienda
session_name('ecommerce_session');
session_start();

$num_cart = 0;
if (isset($_SESSION['carrito']['productos'])) {
    $num_cart = count($_SESSION['carrito']['productos']);
}
