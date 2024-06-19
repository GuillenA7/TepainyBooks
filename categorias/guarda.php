<?php

/**
 * Guarda el registro de categorías
 * Autor: Adrian Guillen
 * Web: https://github.com/GuillenA7
 */

require '../config/config.php';

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header('Location: index.php');
    exit;
}

$db = new Database();
$con = $db->conectar();

$nombre = trim($_POST['nombre']);

$sql = $con->prepare("INSERT INTO categorias (nombre, activo) VALUES (?, 1)");
$sql->execute([$nombre]);

header('Location: index.php');
