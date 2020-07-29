<?php 
//require_once("arrays.php");
// --- Funciones ---

// Chequear errores
function erroresForm($string){ // Error checking condiciones una por una (Estuve muy orgulloso cuando arme esta función, no la quiero cambiar)
		
	if ($string == "tipo_de_consulta") { // Consulta o sugerencia
					?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Error en formulario - </strong> Por favor especificanos el tipo de contacto
                        </div>
            <?php
	}elseif ($string == "mxchar_comentario") { // Maximo de caracteres comentario
					?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Error en comentario - </strong> Superaste la cantidad máxima de caracteres en el campo comentario
                        </div>
            <?php
	}elseif ($string == "mxchar_nombre") { // Maximo de caracteres nombre
					?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Error en comentario - </strong> Superaste la cantidad máxima de caracteres en el campo nombre
                        </div>
            <?php
	}elseif ($string == "mxchar_apellido") { // Maximo de caracteres apellido
					?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Error en comentario - </strong> Superaste la cantidad máxima de caracteres en el campo apellido
                        </div>
            <?php
	}elseif ($string == "error_email") { // Mail invalido
					?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Error en e-mail - </strong> Ingresar una dirección válida
                        </div>
            <?php
    }

}

function erroresFormABM($string, $array){ // Error checking para alta de modelos en base a array de errores
    if (array_key_exists($string, $array)){?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Error |</strong> <?= $array[$string] ?>
        </div>
    <?php    
    }
}

function alertsformABM($string, $array){ // Alertas de acciones completadas correctamente
    if (array_key_exists($string, $array)){?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Acción completa |</strong> <?= $array[$string] ?>
        </div>
    <?php    
    }

}

function alertaComentario(){?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Acción completa - </strong> Gracias por dejarnos tu comentario!
                        </div>
                        <?php 
}



function filtrar2($string){
    return htmlentities(strtolower($string));
}
// Filtrar HTMLentities y espacios
function filtrar($string){
    return nl2br(htmlentities(trim($string)));
}
function filtrarNombres($string){ //Remueve HTML entities y espacios
    return strip_tags(trim($string));
}
function filtrarMail($string){ // Remueve HTML entities y espacios, baja a lowercase
    return nl2br(strip_tags(strtolower(trim($string))));
}
