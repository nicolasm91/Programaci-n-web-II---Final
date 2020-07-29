<?php
	session_start();

	// No se puede ingresar al menu de contacto sin estar logeado
    if(empty($_SESSION["usuario"])){
    header("Location:index.php?");
    die();
    }
?>
    <div class="container elem1">
        <div class="col-lg-12">
            <div class="jumbotron">
                <div class="row justify-content-center">
                    <div class="row col-8">
                        <h1 class="display-4">Contactanos</h1>
                        <br>
                    </div>

                    <div class="col-8">
                        <div>
                            <p>Dejanos tu consulta y te contactaremos a la brevedad.</p>
                        </div>
                        <hr class="my-3">

                        <!-- Devuelve errores -->
                        <div>
								<?php

								if(!isset($_GET["estado"])){
								}else{
									if($_GET["estado"] == "exitosa"){
										alertaComentario();
									}
								}

								if (!isset($_GET["error"])){
								}else{
									$error = $_GET["error"];
									// Función devuelve error según corresponda por cada campo

									erroresForm($error);
									}
								?>

                        </div>
                        <!-- FORM -->

                        <form action="enviar.php" method="post">
                            <!-- Indole de solicitud  -->

                            <div class="form-group custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadio1" name="indole" value="consulta" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">Consulta</label>
                            </div>

                            <div class="form-group custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadio2" name="indole" value="sugerencia" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Sugerencia</label>
                            </div>
                            <!-- Nombre -->

                            <div class="form-group row">
                                <input type="text" name="nombre" class="form-control form-control-lg" placeholder="Nombre">
                            </div>
                            <!-- Apellido -->

                            <div class="form-group row">
                                <input type="text" name="apellido" class="form-control form-control-lg" placeholder="Apellido">
                            </div>
                            <!-- e-mail -->

                            <div class="form-group row">
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="e-mail@dominio.com">
                            </div>
                            <!-- Comentario -->

                            <div class="form-group row">
                                <textarea class="form-control form-control-lg" name="comentario" placeholder="Ingresa tu comentario" rows="3"></textarea>
                                <small id="helpId" class="form-text text-muted">Máximo 90 caracteres</small>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-dark font-weight-bold">Enviar</button>
                            </div>
                        </form>
								<?php
								if($_SESSION["usuario"]["perfil"] == "admin"){
									?>
									<hr>
									<a href="panel/index.php?seccion=lista_comentarios" class="btn btn-sm btn-dark btn-block font-weight-bold my-2 mx-2">Administrar comentarios</a>

								<?php
								}
								?>
                    </div>
                </div>
            </div>
        </div>
    </div>