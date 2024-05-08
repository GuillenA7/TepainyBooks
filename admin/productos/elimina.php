<?php

/**
 * Elimina el registro de producto (Dar de baja)
 * Adrian Guillen
 * 22310361
 */

require '../config/config.php';

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header('Location: ../index.php');
    exit;
}

$db = new Database();
$con = $db->conectar();

$id = $_POST['id'];

$sql = $con->prepare("DELETE FROM productos WHERE id = ?");
$sql->execute([$id]);

header('Location: index.php');
