<!DOCTYPE html>
<?php

 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login | Peugeot</title>

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
		<div class="bg-login">
			<div class="row justify-content-center">
				<div class="col-auto">
					<div class="jumbotron">
						<div class="d-flex justify-content-center">
							<div class="brand_logo_container">
								<!-- Logo -->
								<img src="img/logo_smallres.png" class="img-fluid" alt="Peugeot logo">
								<hr>
								<div>
								<h1 class="d-flex justify-content-center links">Login</h1>
								</div>
							</div>
						</div>
						<!-- Form -->
						<div class="d-flex justify-content-center form_container">
							<form action="login.php" method="POST">
								<!-- Input | E-mail -->
								<div class="input-group mb-3">
									<div div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-user"></i></span>
										<input type="email" name="email" class="form-control input_user" placeholder="usuario@email.com">
									</div>
								</div>
								<!-- Input | Password -->
								<div class="input-group mb-2">
									<div div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-key"></i></span>
										<input type="password" name="password" class="form-control input_pass" placeholder="***********">
									</div>
								</div>
								<!-- Input | Remember me -->
								<div class="form-group">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customControlInline">
										<label class="custom-control-label" for="customControlInline">Recordarme</label>
									</div>
								</div>
								<!-- Input | Login Button -->
								<div class="d-flex justify-content-center mt-3 login_container">
									<button type="submit" class="btn btn-block btn-dark">Ingresar</button>
								</div>
							</form>
						</div>
						<hr>
						<div class="mt-4">
							<div class="d-flex justify-content-center links">
								¿No tenes usuario? <a href="index.php?modulo=registro" class="ml-2">Registrate</a>	
							</div>
							<div class="d-flex justify-content-center links">
								<a href="#">¿Olvidaste tu clave?</a>
							</div>
							<hr>
							<div class="d-flex justify-content-center links">
							<a href="index.php?" class="ml-2">Volver a la página principal</a>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>

	</main>
	
</body>
</html>