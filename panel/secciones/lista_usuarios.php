<br class="my-4">
<section class="container">
	<div class="row my-4">
		<article class="col-12">
			<div class="card">
				<!-- Titulo -->

				<div class="card-header">
					<h2 class="h4 text-dark card-title">Usuarios | <span class="text-black-50 fs-90">Listado de usuarios</span></h2>
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
                        <a href="index.php?seccion=abm_users" class="btn btn-sm btn-dark float-right font-weight-bold my-2 mx-2">Crear nuevo usuario</a>
                        <a href="index.php?seccion=lista_comentarios" class="btn btn-sm btn-dark float-right font-weight-bold my-2 mx-2">Administrar comentarios</a>
                        <a href="index.php?seccion=lista_autos" class="btn btn-sm btn-dark float-right font-weight-bold my-2 mx-2">Administrar modelos</a>
                        <div class="table-responsive">
                        	<table class="table table-bordered table-sm">
                        		<thead class="thead-light text-center"> <!-- Encabezados de tabla -->
                        			<tr> <!-- Titulos -->
                        				<th>Usuario</th> <!-- Algunos autos tienen nombre con 2 palabras -->
                        				<th>Nombre</th>
										<th>Apellido</th>
										<th>E-mail</th>
										<th>Perfil</th>
                        				<th> <!-- Botón desplegable de acciones por cada item -->
                                        </th> 
                        				
                        			</tr>
                        		</thead>

								<tbody class="text-center">
								<?php
                                    $carpeta = "../usuarios";

                                    $dir = opendir($carpeta);

                                    while($user = readdir($dir)){
										if($user == "." || $user == "..")
                                            continue;
                                	?>
									<tr>
									<td class="py-3"><?= file_get_contents("$carpeta/$user/usuario.txt"); ?></td>
									<td class="py-3"><?= ucwords(file_get_contents("$carpeta/$user/nombre.txt")); ?></td>
									<td class="py-3"><?= ucwords(file_get_contents("$carpeta/$user/apellido.txt")); ?></td>
									<td class="py-3"><?= "$user"; ?></td>
									<td class="py-3"><?= ucwords(file_get_contents("$carpeta/$user/perfil.txt")); ?></td>
									<td>
									<div class="dropdown">
                                                <button class="btn btn-sm btn-dark dropdown-toggle font-weight-bold" type="button" id="dropdownMenuButton"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones  
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="index.php?seccion=abm_users&user=<?= $user; ?>">Editar</a>
                                                    <form action="borrar_usuario.php" method="post"> <!-- Boton de borrar -->
                                                        <input type="hidden" name="user" id="user" value="<?= $user; ?>"> <!-- Input oculto envía $user por POST -->
                                                        <button type="submit" class="dropdown-item">Borrar usuario</button> <!-- Boton visible de borrar -->
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