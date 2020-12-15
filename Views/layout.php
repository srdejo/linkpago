<!doctype html>
<html lang="es">

<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<title>Token Danny </title>
</head>

<body>
	<?php if (isset($_SESSION['user_id'])) { ?>
		<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
			<div class="container-fluid ">
				<a class="navbar-brand" href="#">Navbar</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link <?php if ($controller == 'peticion_pago') echo 'active' ?>" href="?controller=peticion_pago&action=index">Generar Link Pago</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($controller == 'comercio') echo 'active' ?>" href="?controller=comercio&action=index">Registrar Comercio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($controller == 'pago') echo 'active' ?>" href="?controller=pago&action=index">Pagos</a>
						</li>
					</ul>
				</div>
				<div class="d-flex">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link " href="/">Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	<?php } ?>
	<div class="container">
		<div class="row">
			<?php require_once('routes.php'); ?>
		</div>
	</div>

	<!-- Js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>