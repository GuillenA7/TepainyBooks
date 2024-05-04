<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TepainyBooks</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    <!--Barra de navegación-->
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <strong>TepainyBooks</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Soporte</a>
                        </li>
                    </ul>
                    <a href="checkout.php" class="btn btn-primary">Carrito</a>
                </div>
            </div>
        </div>
    </header>

    <!--Contenido-->
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/productos/1/principal.jpg">
                        <div class="card-body">
                            <p class="card-text">Libro 1</p>
                            <h5 class="card-tittle">$100.00</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="details.php" class="btn btn-primary">Detalles</a>
                                </div>
                                <a class="btn btn-outline-success" type="button">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/productos/1/principal.jpg">
                        <div class="card-body">
                            <p class="card-text">Libro 1</p>
                            <h5 class="card-tittle">$100.00</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="details.php" class="btn btn-primary">Detalles</a>
                                </div>
                                <a class="btn btn-outline-success" type="button">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/productos/1/principal.jpg">
                        <div class="card-body">
                            <p class="card-text">Libro 1</p>
                            <h5 class="card-tittle">$100.00</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="details.php" class="btn btn-primary">Detalles</a>
                                </div>
                                <a class="btn btn-outline-success" type="button">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/productos/1/principal.jpg">
                        <div class="card-body">
                            <p class="card-text">Libro 1</p>
                            <h5 class="card-tittle">$100.00</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="details.php" class="btn btn-primary">Detalles</a>
                                </div>
                                <a class="btn btn-outline-success" type="button">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/productos/1/principal.jpg">
                        <div class="card-body">
                            <p class="card-text">Libro 1</p>
                            <h5 class="card-tittle">$100.00</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="details.php" class="btn btn-primary">Detalles</a>
                                </div>
                                <a class="btn btn-outline-success" type="button">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Option 1: Bootstrap Bundle with Pooper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>