<!DOCTYPE html>
<?php 

 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro | Peugeot</title>
	<!--CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- JS-->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>

	<main>
		<div  class="bg-login">
			<div class="row justify-content-center">
				<div class="col-auto">
					<div class="jumbotron">
						<!-- Logo -->
						<div class="d-flex justify-content-center">
							<img src="img/logo_smallres.png" class="img-fluid" alt="Peugeot logo">
						</div>
						<hr>
						<div>
								<h1 class="d-flex justify-content-center links">Registrate</h1>
								</div>
						<div class="d-flex justify-content-center">
							<!-- Form -->
							<div class="form_container">
								<form action="register.php" method="POST">

									<!-- Primera fila -->

									<div  class="form-row">
										<div class="input-group mb-3 col-6"> <!-- Input | Nombre -->
											<input type="text" name="nombre" class="form-control input_user" placeholder="Nombre">
										</div>
										<div class="input-group mb-3 col-6"> <!-- Input | Apellido -->
											<input type="text" name="apellido" class="form-control input_pass" placeholder="Apellido">
										</div>
									</div>

									<!-- Segunda fila -->

									<div class="form-row">
										<div class="input-group mb-3 col-12">
											<div class="input-group-append"> <!-- Input | E-mail -->
												<span class="input-group-text"><i class="fas fa-at"></i></span>
											</div>
											<input type="email" name="email" class="form-control input_user" placeholder="E-mail">
										</div>
									</div>

									<!-- Tercera fila -->

									<div class="form-row">
										<div class="input-group mb-3 col-6">
											<div class="input-group-append"> <!-- Input | Username -->
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
											<input type="text" name="usuario" class="form-control input_user" placeholder="Username">
										</div>
										<div class="input-group mb-3 col-6">
											<div class="input-group-append"> <!-- Input | Password -->
												<span class="input-group-text"><i class="fas fa-key"></i></span>
											</div>
											<input type="password" name="password" class="form-control input_pass" placeholder="password">
										</div>
									</div>
									<hr>
									<!-- Input | Submit button -->
									<div class="d-flex justify-content-center mt-3 login_container">
										<button type="submit" class="btn btn-block btn-dark">Registrate</button>
									</div>
								</form>
								<hr>
								<div class="d-flex justify-content-center links">
								<a href="index.php?" class="ml-2">Volver a la página principal</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	
</body>
</html>