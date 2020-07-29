  <!DOCTYPE html>
  <?php
      session_start();
      require_once("../config.php");
      require_once("../arrays.php");
      require_once("../funciones.php");
    // Usuarios no admin no podrán ingresar al panel
    if($_SESSION["usuario"]["perfil"] !== "admin"){
    header("Location:../index.php?");
    die();
    }
   ?>
  <html lang="en">
  <head>
  	<meta charset="UTF-8">
  	<title>Parcial 2 | Peugeot - Admin panel</title>
  	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  	<link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  	<!-- BOOTSTRAP -->
  	<link rel="stylesheet" href="../css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top yr-3">
        <a class="navbar-brand mr-0" href="index.php"><img src="../img/logo_hires.png" alt="Logo" width="50"><img src="../img/peugeotw.png" alt="Peugeot" width="120"> | ADMIN PANEL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav mr-0">
            <li class="nav-item">
              <span class="navbar-text"><?= $_SESSION["usuario"]["email"]; ?></span>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../index.php">Página para usuarios</a>
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="../logout.php">Logout</a>
              </div>
            </li>
            <li class="nav-item">
              <span class="navbar-text">| Bienvenido - <?= $_SESSION["usuario"]["nombre"]; ?></span><span class="navbar-text">&nbsp<?=$_SESSION["usuario"]["apellido"]; ?></span>
            </li>
            
          </ul>
          
        </div>
        </nav>

    </header>
    <main>

      <?php  
    if(!empty($_GET["seccion"])):
            $seccion = $_GET["seccion"];


            if(file_exists("secciones/$seccion.php")):
                require_once("secciones/$seccion.php");
            else:
                require_once("secciones/lista_autos.php");
            endif;


        else: // si el usuario entra al index por primera vez
            require_once("secciones/lista_autos.php");
        endif;
        ?>







    </main>

          <footer class="">
          	
          	<div class="container jumbotron text-center bg-dark text-white px-0">
          	<div class="row">
          		<div class="col-lg-12">
          			<h3 class="text-lg-center font-weight-bold">PEUGEOT&copy; 2020</h3>
          			<div class="justify-content-center"><p>Seguinos en nuestras redes sociales:</p>
          			</div>
          		</div>
          	</div>
  			<div class="row">
  				<div class="col-lg-12 center justify-content-center">
          			<?php foreach ($footeritm as $redsoc){?>
  						
  						<a href="<?= $redsoc["url"] ?>" target="_blank"><img src="../<?= $redsoc["img"] ?>" alt="<?= $redsoc["nombre"] ?>" class="img-fluid"></a>
  						<a href="<?= $redsoc["url"] ?>" target="_blank"><h8 class="text-center text-light font-weight-bold"><?= $redsoc["nombre"] ?></h8></a>

  						
  					<?php	
  					}	
  					?>
  				
  				</div>
  			</div>
          		
          	</div>
          </footer>

  </body>
  </html>