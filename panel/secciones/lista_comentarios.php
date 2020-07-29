<br class="my-4">
<section class="container">
	<div class="row my-4">
		<article class="col-12">
			<div class="card">
				<!-- Titulo -->

				<div class="card-header">
					<h2 class="h4 text-dark card-title">Comentarios | <span class="text-black-50 fs-90">Listado de comentarios</span></h2>
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
                        <a href="../index.php?modulo=contacto" class="btn btn-sm btn-dark float-right font-weight-bold my-2 mx-2">Crear nuevo comentario</a>
                        <a href="index.php?seccion=lista_autos" class="btn btn-sm btn-dark float-right font-weight-bold my-2 mx-2">Administrar modelos</a>
                        <a href="index.php?seccion=lista_usuarios" class="btn btn-sm btn-dark float-right font-weight-bold my-2 mx-2">Administrar usuarios</a>
                        <div class="table-responsive">
                        	<table class="table table-bordered table-sm">
                        		<thead class="thead-light text-center"> <!-- Encabezados de tabla -->
                        			<tr> <!-- Titulos -->
                        				<th>ID</th> <!-- Algunos autos tienen nombre con 2 palabras -->
                                        <th>indole</th>
                        				<th>E-mail</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Comentario</th>
                        				<th> <!-- Botón desplegable de acciones por cada item -->
                                        </th> 
                        				
                        			</tr>
                        		</thead>

								<tbody class="text-center">
								<?php
                                    $carpeta = "../comentarios";

                                    $dir = opendir($carpeta);

                                    while($comentario = readdir($dir)){
										if($comentario == "." || $comentario == "..")
                                            continue;
                                	?>
									<tr>
                                    <td class="py-3"><?= "$comentario"; ?></td>
                                    <td><button type="button" class="btn btn-dark btn-sm disabled"><?= ucwords(file_get_contents("$carpeta/$comentario/indole.txt")); ?></button></td>
									<td class="py-3"><?= file_get_contents("$carpeta/$comentario/email.txt"); ?></td>
                                    <td class="py-3"><?= ucwords(file_get_contents("$carpeta/$comentario/nombre.txt")); ?></td>
									<td class="py-3"><?= ucwords(file_get_contents("$carpeta/$comentario/apellido.txt")); ?></td>
                                    <td class="py-3"><?= file_get_contents("$carpeta/$comentario/comentario.txt"); ?></td>
									<td>									        
                                                    <form action="borrar_comentario.php" method="post"> <!-- Borrar via post -->
                                                        <input type="hidden" name="comentario" id="comentario" value="<?= $comentario; ?>"> 
                                                        <button type="submit" class="btn btn-dark">Borrar</button>
                                                    </form>
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