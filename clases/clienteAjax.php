<?php

/**
 * Script para validar si existe el usuario
 * Autor: Adrian Guillen
 * Web: https://github.com/GuillenA7
 */

require_once '../config/database.php';
require_once 'clienteFunciones.php';

$datos = [];

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    $db = new Database();
    $con = $db->conectar();

    if ($action == 'existeUsuario') {
        $datos['ok'] = usuarioExiste($_POST['usuario'], $con);
    } elseif ($action = 'existeEmail') {
        $datos['ok'] = emailExiste($_POST['email'], $con);
    }
}

echo json_encode($datos);
