<!DOCTYPE html>

<?php 
	session_start(); // Inicia/continúa sesión
    require_once("config.php");
    require_once("arrays.php");
    require_once("funciones.php");
 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Final | Peugeot</title>
  <!--Font-->
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="css/styles.css">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="js/bootstrap.bundle.min.js"></script>


</head>

<body>
<?php
// En caso de incluír registro o login, no cargará header/navbar
    if(empty($_GET["modulo"]) || (!empty($_GET["modulo"]) && !($_GET["modulo"] == "registro" || $_GET["modulo"] == "login") )){?>
   <header>
   	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top yr-3">
   		<h1 class="d-none">Peugeot</h1>
   		<a class="navbar-brand" href="index.php">
   			<!-- Logo Peugeot | Compuesto por 2 imágenes -->
   			<img src="img/logo_hires.png" alt="Logo" width="50"><img src="img/peugeotw.png" alt="Peugeot" width="120">
   		</a>
   			<!-- Hamburger toggler -->
   		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   			<span class="navbar-toggler-icon"></span>
   		</button>
   		<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
   			<!-- Items de navbar -->
   			<ul class="navbar-nav mr-auto">
   				<?php
   				foreach($nav as $itemsnav => $url){ // Recorre posiciones del array $itemsnav
   					if($url == "contacto" && empty($_SESSION["usuario"])){ // Si $_SESSION esta vacío, al llegar a "contacto"
   						continue; // La repetición saltea la posición del array
   					}else{?>
   						<li class="nav-item">
   							<a class="nav-link <?= !empty($_GET["modulo"]) && $_GET["modulo"] == $url ? "active" : "";  ?>" href="index.php?modulo=<?= $url; ?>"><?=$itemsnav; ?></a>
   						</li>
   					<?php
   						} // ENDIF
   					} // ENDFOREACH
   				 ?>
   			</ul>

   			<?php
        // Si $_SESSION esta vacío (nadie inició sesión), mostrará las opciones de registro y login
   			if(empty($_SESSION["usuario"])){
   			 ?>
   			 <ul class="navbar-nav mr-0">
   			 	<li class="nav-item">
   			 		<a href="index.php?modulo=registro" class="nav-link">Registrate</a>
   			 	</li>
   			 	<li class="nav-item">
   			 		<a href="index.php?modulo=login" class="nav-link">Login</a>
   			 	</li>
   			 </ul>
   			 <?php
         // En cambio, si hay un usuario logeado deberá mostrar username y opción de logout:
   			}else{?> 

          <ul class="navbar-nav mr-0">
            <li class="nav-item">
              <span class="nav-link"><?= $_SESSION["usuario"]["usuario"]; ?></span>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">Logout</a>
            </li>
            <?php
            // Si el perfil del usuario es admin, mostrará acceso al admin panel
            if($_SESSION["usuario"]["perfil"] == "admin"){?>
              <li>
                <a href="panel/index.php" class="nav-link">Admin panel</a>
              </li>
          </ul>
        <?php } // Cierra IF admin panel
          } // Cierra ELSE si hay usuario logeado
          ?>
   		</div> <!--Cierre de colapsable del navbar responsive -->
   	</nav>
   </header>
<?php
    } // Cierra condición de carga header/navbar 
?>

<!-- Error checking -->

<?php 
if(!empty($_GET["estado"])){
  $estado = $_GET["estado"] ?? "error"; // Si se pasa estado por GET, se guarda en variable, si es null arroja error
  if($estado == "error"){
    $error = $_GET["error"] ?? ""; // Si $estado es "error", se guarda el tipo de error en $error, sinó, se guarda null
    if(array_key_exists($error, $erroresABM)){?>
      <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <strong>Error!</strong> <?= $erroresABM[$error] ?>
      </div>
    <?php 
    }
  }else if($estado == "ok"){
    $ok = $_GET["ok"] ?? "";
    if(array_key_exists($ok, $estadosOK)){?>
      <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <strong>Bien</strong> <?= $estadosOK[$ok] ?>
      </div>
      <?php 
    }
  }
} ?>


<!-- Contenido -->

<?php
if(!empty($_GET["modulo"])){ // Si $_GET["modulo"] contiene algo
  $modulo = $_GET["modulo"]; // Se guarda en variable $modulo

    if(file_exists("secciones/$modulo.php")){ // Si existe el directorio $modulo en carpeta de secciones
      require_once("secciones/$modulo.php"); // Requerir el modulo
    }else{
      require("secciones/acerca_de.php"); // Si el directorio $modulo no existe, ir por defecto a "acerca_de.php"
    }
}else{
  require_once("secciones/acerca_de.php"); // En cambio si no hay nada en GET, ir por defecto a "acerca_de.php"
}
?>

<?php 
if(empty($_GET["modulo"]) || (!empty($_GET["modulo"]) && !($_GET["modulo"] == "registro" || $_GET["modulo"] == "login") )){?>
<footer>
  <div class="container jumbotron text-center bg-dark text-white px-0">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="text-lg-center font-weight-bold">PEUGEOT&copy; 2020</h3>
        <div class="justify-content-center"><p>Seguinos en nuestras redes sociales:</div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 center justify-content-center">
        <?php foreach ($footeritm as $redsoc){?>
          <a href="<?= $redsoc["url"] ?>" target="_blank"><img src="<?= $redsoc["img"] ?>" alt="<?= $redsoc["nombre"] ?>" class="img-fluid"></a>
          <a href="<?= $redsoc["url"] ?>" target="_blank"><h8 class="text-center text-light font-weight-bold"><?= $redsoc["nombre"] ?></h8></a>
        <?php 
        } 
        ?>
      </div>
      
    </div>
  </div>
</footer>
<?php
} ?>
</body>
</html>