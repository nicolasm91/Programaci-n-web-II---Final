<br class="my-4">
<section class="container">
	<div class="row my-4">
		<article class="col-12">
			<div class="card">
				<!-- Titulo -->

				<div class="card-header">
					<h2 class="h4 text-dark card-title">Modelos | <span class="text-black-50 fs-90">Listado de modelos Peugeot</span></h2>
                    <hr>

                    <!-- Error checking | Alerts -->
                        <?php
                    if(isset($_GET["estado"])){
                        $estado = $_GET["estado"]; // Puede ser "error" o "ok"
                        if($estado == "error"){ // Si estado es error
                            if(isset($_GET["error"])){ // Si GET["error"] 
                                    $error = $_GET["error"]; // Guardo el valor del GET en $error
                                    erroresFormABM($error, $erroresABM); // Chequea si el error existe en array de errores
                                    }  
                        }else if($estado == "ok"){
                            if(isset($_GET["ok"])){
                                $ok = $_GET["ok"];
                                    alertsformABM($ok, $estadosOK); // Alertas de acciones completadas correctamente
                                        }
                                    }
                        }
                      ?>

                    <!-- Fin error checking | Alerts -->
                        <a href="index.php?seccion=abm_auto" class="btn btn-sm btn-dark float-right font-weight-bold my-2 mx-2">Ingresar modelo a catálogo</a>
                        <a href="../index.php?modulo=galeria" target="_blank" class="btn btn-sm btn-dark float-right font-weight-bold my-2">Ver catálogo en página principal</a>
                        <a href="index.php?seccion=lista_usuarios" class="btn btn-sm btn-dark float-right font-weight-bold my-2 mx-2">Administrar usuarios</a>
                        <a href="index.php?seccion=lista_comentarios" class="btn btn-sm btn-dark float-right font-weight-bold my-2 mx-2">Administrar comentarios</a>
                        <div class="table-responsive">
                        	<table class="table table-bordered table-sm">
                        		<thead class="thead-light text-center"> <!-- Encabezados de tabla -->
                        			<tr> <!-- Titulos -->
                        				<th>Model ID</th> <!-- Algunos autos tienen nombre con 2 palabras -->
                        				<th>Nombre comercial</th> <!-- Por eso se distingue el nombre que aparece en catálogo al indicado en filesystem -->
                        				<th>Precio</th>
                        				<th>Imagen</th>
                        				<th> <!-- Botón desplegable de acciones por cada item -->
                                        </th> 
                        				
                        			</tr>
                        		</thead>

                        		<tbody class="text-center"> <!-- Cuerpo de la tabla -->
                        			<?php
                                    $carpeta = "../modelos";

                                    $dir = opendir($carpeta);

                                    while($auto = readdir($dir)){
                                        if($auto == "." || $auto == "..")
                                            continue;
                                	?>
                                        <tr>
                                            <td class="py-3"><?= ucfirst($auto); ?></td><!-- Nombre de la carpeta, foto y nombre del auto -->
                                            <td class="py-3"><?= ucwords(file_get_contents("$carpeta/$auto/$auto.txt")); ?></td> <!-- Nombre del auto en el .txt -->
                                            <td class="py-3">$ <?= file_get_contents("$carpeta/$auto/precio.txt"); ?></td> <!-- Precio del auto en el .txt -->
                                            <td class="py-3"><img width="80" src="<?= "$carpeta/$auto/$auto.png" ?>" alt="<?= $auto; ?>"></td> <!-- Foto -->
                                           	<td> <!-- Opciones - Editar / Borrar -->
                                                <div class="dropdown">
                                                <button class="btn btn-sm btn-dark dropdown-toggle font-weight-bold" type="button" id="dropdownMenuButton"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones  
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="index.php?seccion=abm_auto&auto=<?= $auto; ?>">Editar</a>
                                                    <form action="borrar_auto.php" method="post"> <!-- Boton de borrar -->
                                                        <input type="hidden" name="auto" value="<?= $auto; ?>"> <!-- Input oculto envía $auto por POST -->
                                                        <button type="submit" class="dropdown-item">Borrar item</button> <!-- Boton visible de borrar -->
                                                    </form>
                                                </div>
                                            </div>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                        		</tbody>
                        		
                        	</table>
                        </div>






				</div>
				
			</div>
		</article>
	</div>
	
</section>