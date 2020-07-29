<?php 

// Determinar - Si es alta o modificación
if(!empty($_GET["user"])){ // Si GET["auto"] contiene valor

// Asumo que estoy editando algo existente

$titulo = "Editar usuario";
        $action = "editar_usuario.php";
        $user = strtolower($_GET["user"]); // Atajo el GET en variable $nombre

        // Chequear que el pokemon exista
        if(!is_dir("../usuarios/$user")){
            header("Location:index.php?seccion=usuarios&estado=error&error=usuario_no_existe"); // Envía GET["estado"] y GET["error"]
            die();
        }

		// Levantar datos del filesystem
		$nombre = file_get_contents("../usuarios/$user/nombre.txt");
		$apellido = file_get_contents("../usuarios/$user/apellido.txt");
		$usuario = file_get_contents("../usuarios/$user/usuario.txt");
		$perfil = file_get_contents("../usuarios/$user/perfil.txt");
		$email = $user;

		//echo "<h2>" . ucwords("$email") ."</h2>";

    }else{
    	// Si GET["auto"] no contiene valores, genera un auto nuevo
        $titulo = "Generar nuevo usuario";    
        $action = "crear_usuario.php";
    }
 ?>

<br class="my-4">
 <div class="container">
 	<div class="row justify-content-center">
 	<div class="col-8 mx-5 mt-1 mb-3">
 	<div class="row">
 		<div class="col-12">
 			<h1 class="center block my-3"><?= $titulo; ?></h1>  <!-- Título dinámico -->		
 		</div>
 		
 	</div>

    <!-- Error checking -->

    <?php 
if (!isset($_GET["error"])){
            }else{
                $error = $_GET["error"];
                // Función devuelve error según corresponda por cada campo

                erroresFormABM($error, $erroresABM);
                }
     ?>

    <!-- Fin error checking -->
 	<hr>
 	<div class="card">
 	<div class="card-body">
 		<form action="<?= $action; ?>" method="post" enctype="multipart/form-data"> <!-- Form con action dinámico -->
 		<?php 
 		    if(isset($user)){
 		?>
 		        <input type="hidden" name="originaluser" id="originaluser" value="<?= $user; ?>">
 		<?php
 		    }
 		 ?>
		 <div class="form-group"> <!-- Campo e-mail -->
		 	<label class="font-weight-bold" for="email">E-mail</label>
 		 	<input type="text" class="form-control" name="email" id="email" placeholder="E-mail" value="<?= isset($email) ? $email : ""; ?>">
            
 		 </div>

 		 <div class="form-group"> <!-- Campo nombre -->
		  	<label class="font-weight-bold" for="email">Nombre</label>
 		 	<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?= isset($nombre) ? $nombre : ""; ?>">
            
 		 </div>

		  <div class="form-group"> <!-- Campo apellido -->
		  	<label class="font-weight-bold" for="apellido">Apellido</label>
 		 	<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" value="<?= isset($apellido) ? $apellido : ""; ?>">
            
 		 </div>

		  <div class="form-group"> <!-- Campo Usuario -->
		  	<label class="font-weight-bold" for="usuario">Usuario</label>
 		 	<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" value="<?= isset($usuario) ? $usuario : ""; ?>">
            
 		 </div>
			 <hr>
		<div class="form-group"> <!-- Campo Perfil -->
		<label class="font-weight-bold" for="perfil">Perfil de usuario</label>
		<select name="perfil" id="perfil" class="custom-select">
			<option selected>
			<?= isset($perfil) ? ucwords($perfil) : "Elegir perfil para definir permisos de usuario";
			
			?>
			</option>
			<option value="admin">Admin</option>
			<option value="usuario">Usuario</option>
		</select>
		<hr>
			 <?php
			 if(isset($user)){
				?>
			<div>
			 	<h6 class="font-weight-bold">Aclaración:</h6>
				<p class="text-muted">Por motivos de seguridad, no es posible editar la contraseña de un usuario por medio de este formulario.
				</p>
			 </div>
			<?php
			 }else{
			  ?>
			 <div>
			 	<h6 class="font-weight-bold">Aclaración:</h6>
				<p class="text-muted">Al generar un usuario por este medio, la password default será "123456a".
				</p>
			 </div>
			 <?php
			}
			?>
		</div>

		<button type="submit" class="btn btn-dark btn-block font-weight-bold"><?= $titulo; ?></button>
		</form>
 	</div>
 	
 </div>
 </div>
 </div>
 </div>

