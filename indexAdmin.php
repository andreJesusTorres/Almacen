<?php
require_once("consultas.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Almacén</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
	<img src="img/almacen.png" style="width: 100%;" alt="Almacén 'El Pepe'">
	<nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
		<div class="container-fluid">
			<img src="img/pepe-argento.png" alt="Logo del Almacén 'El Pepe'">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarColor01">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link active" href="indexAdmin.php">Home
							<span class="visually-hidden">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="nuevo.php">Agregar producto</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="index.php" onclick="cerrarSesion()">Cerrar Sesión
							<span class="visually-hidden">(current)</span>
						</a>
					</li>											
				</ul>
				<form class="d-flex">
					<input class="form-control me-sm-2" type="search" name="inputBuscar" placeholder="Buscar">
					<button class="btn btn-secondary my-2 my-sm-0" type="submit" name="botonBuscar">Buscar</button>
				</form>
			</div>
		</div>
	</nav>

	<?php
    $conexion = conectar();
    if ($conexion != null) {
        echo '
        <style>
            .container-fluid {
                padding-left: 0;
                padding-right: 0;
            }
            .table-responsive {
                margin: 0 auto;
            }
            .table td,
            .table th {
                text-align: center;
            }
        </style>
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';

        if (isset($_GET["botonBuscar"])) {
            $busqueda = $_GET["inputBuscar"];
            buscarProductosAdmin($busqueda);
        } else {
            listarSesion();
        }

        echo '
                    </tbody>
                </table>
            </div>
        </div>';
    }
	?>


	<script src="js/bootstrap.bundle.js"></script>