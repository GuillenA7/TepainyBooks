<?php

/**
 * Pantalla principal para mostrar el listado de productos
 * Adrian Guillen
 * 22310361
 */

require 'config/config.php';

$db = new Database();
$con = $db->conectar();

$idCategoria = $_GET['cat'] ?? '';

if (!empty($idCategoria)) {
    $comando = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1 AND id_categoria = ? ");
    $comando->execute([$idCategoria]);
} else {
    $comando = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
    $comando->execute();
}

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

$sqlCategorias = $con->prepare("SELECT id, nombre FROM categorias WHERE activo=1");
$sqlCategorias->execute();
$categorias = $sqlCategorias->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TepainyBooks</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <?php include 'menu.php'; ?>

    <!-- Contenido -->
    <main class="flex-shrink-0">
        <div class="container p-3">
            <div class="row">
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            Categorías
                        </div>

                        <div class="list-group">
                            <a href="catalogo.php" class="list-group-item list-group-item-action">TODO</a>
                            <?php foreach ($categorias as $categoria) { ?>
                                <a href="catalogo.php?cat=<?php echo $categoria['id']; ?>" class="list-group-item list-group-item-action <?php echo ($categoria['id'] == $idCategoria) ? 'active' : ''; ?>">
                                    <?php echo $categoria['nombre']; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9 col-lg-9">
                    <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
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

    <!-- Option 1: Bootstrap Bundle with Pooper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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