<?php 

// Determinar - Si es alta o modificación
if(!empty($_GET["auto"])){ // Si GET["auto"] contiene valor

// Asumo que estoy editando algo existente

$titulo = "Editar modelo existente del catálogo";
        $action = "editar_auto.php";
        $auto = strtolower($_GET["auto"]); // Atajo el GET en variable $nombre

        // Chequear que el pokemon exista
        if(!is_dir("../modelos/$auto")){
            header("Location:index.php?seccion=lista_autos&estado=error&error=auto_no_existente"); // Envía GET["estado"] y GET["error"]
            die();
        }

        // Levantar datos del filesystem
        $nomcomercial = file_get_contents("../modelos/$auto/$auto.txt"); // Los autos tienen nombres comerciales distintos al nombre de la carpeta
        $precio = file_get_contents("../modelos/$auto/precio.txt"); // Precio del vehiculo
        
	        if(is_file("../modelos/$auto/$auto.png")){ // Si la foto existe
	            $imagen = "../modelos/$auto/$auto.png"; // Muestra la ruta
	        }

    }else{
    	// Si GET["auto"] no contiene valores, genera un auto nuevo
        $titulo = "Ingresar nuevo modelo a catálogo";    
        $action = "crear_auto.php";
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
 		    if(isset($auto)){
 		?>
 		        <input type="hidden" name="originalauto" value="<?= $auto; ?>">
 		<?php
 		    }
 		 ?>

 		 <div class="form-group"> <!-- Campo model ID -->
 		 	
 		 	<input type="text" class="form-control" name="modelid" id="modelid" placeholder="Model ID" value="<?= isset($auto) ? $auto : ""; ?>">
            <small id="fileHelpId" class="form-text text-muted">Ingresar código de modelo</small>
 		 </div>

 		 <div class="form-group"> <!-- Campo nombre comercial -->
 		 	
 		 	<input type="text" class="form-control" name="nomcomercial" id="nomcomercial" placeholder="Nombre comercial" value="<?= isset($nomcomercial) ? $nomcomercial : ""; ?>">
            <small id="fileHelpId" class="form-text text-muted">Ingresar nombre comercial del modelo</small>
 		 </div>

 		 <div class="input-group"> <!-- Campo precio -->
 		 	<div class="input-group-prepend">
 		 		<span class="input-group-text font-weight-bold">$</span> <!-- $$$$ -->
 		 	</div>
 		 	<input type="text" class="form-control" name="precio" id="precio" placeholder="100.000.000,00" value="<?= isset($precio) ? $precio : ""; ?>">

 		 </div>
         <small id="fileHelpId" class="form-text text-muted">Solo valores numéricos - Respetar formato indicado</small>

 		 <div class="form-group my-3 text-center"> <!-- Campo imagen -->
 		 	<div class="form-group text-center">
 		 		<input type="file" class="form-control-file" name="imagen" id="imagen" aria-describedby="fileHelpId">
            	<small id="fileHelpId" class="form-text text-muted">El formato de la imágen debe ser <b>.png<b></small> <!-- Hint - Tipo de imagen -->
 		 	</div>
 		 	<?php // Si al inicio se indicó por GET editar un $auto, se muestra la $imagen del mismo
 		 	if(isset($imagen)){?> 
				<div class="card">
					<div class="card-body text-center">
						<img src="<?= $imagen; ?>" alt="<?= $nombre; ?>" class="img-fluid">
                        <small id="fileHelpId" class="form-text text-muted">Tamaño sugerido - <b>214x113 px<b></small>
					</div>
					
				</div>

 		 	<?php	
 		 	}else{?>
                <div class="card">
                    <div class="card-body text-center">
                        <small id="fileHelpId" class="form-text text-muted">Tamaño sugerido - <b>214x113 px<b></small>
                    </div>
                    
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

