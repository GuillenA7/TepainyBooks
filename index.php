<?php

/**
 * Pantalla principal para mostrar el listado de productos
 * Autor: Adrian Guillen
 * Web: https://github.com/GuillenA7
 */

require_once 'config/config.php';

$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, slug, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TepainyBooks</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <?php include 'menu.php'; ?>

    <!-- Contenido -->
    <main class="flex-shrink-0">
        <div class="container p-3">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                <?php foreach($resultado as $row) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php
                                $id = $row['id'];
                                $imagen = "images/productos/$id/principal.jpg";

                                if (!file_exists($imagen)) {
                                    $imagen = "images/no-photo.jpg";
                                }
                            ?>
                            <img src="<?php echo $imagen; ?>">
                            <div class="card-body">
                                <p class="card-text"><?php echo $row['nombre']; ?></p>
                                <h5 class="card-tittle">$<?php echo number_format($row['precio'], 2, '.', ','); ?></h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="details.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                                    </div>
                                    <a class="btn btn-success" onClick="addProducto(<?php echo $row['id']; ?>)">Agregar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>
    <script>
        function addProducto(id) {
            var url = 'clases/carrito.php';
            var formData = new FormData();
            formData.append('id', id);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors',
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_cart")
                        elemento.innerHTML = data.numero;
                    } else {
                        alert("No ay suficientes productos en el stock")
                    }
                })
        }

        function submitForm() {
            document.getElementById("ordenForm").submit();
        }
    </script>
</body>

</html>