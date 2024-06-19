<?php

/**
 * Muestra la bitácora de cambios en los productos
 * Autor: Adrian Guillen
 * Web: https://github.com/GuillenA7
 */

require '../config/config.php';

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header('Location: ../index.php');
    exit;
}

$db = new Database();
$con = $db->conectar();

$sql = "SELECT accion, fecha_hora, usuario, sentencia FROM bitacora ORDER BY fecha_hora DESC";
$resultado = $con->query($sql);
$bitacora = $resultado->fetchAll(PDO::FETCH_ASSOC);

require '../header.php';

?>

<main>
    <div class="container-fluid px-3">
        <h3 class="mt-2">Bitácora de cambios en productos</h3>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Acción</th>
                    <th>Fecha y Hora</th>
                    <th>Usuario</th>
                    <th>Sentencia</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bitacora as $registro) { ?>
                    <tr>
                        <td><?php echo $registro['accion']; ?></td>
                        <td><?php echo $registro['fecha_hora']; ?></td>
                        <td><?php echo $registro['usuario']; ?></td>
                        <td><?php echo $registro['sentencia']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php require '../footer.php'; ?>