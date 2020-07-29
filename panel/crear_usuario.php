<?php
require_once("../funciones.php");

// Chequeo que Model ID, Nombre comercial y Precio esten completos en el formulario.
if(empty($_POST["email"]) || empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["usuario"] || empty($_POST["perfil"]))){
    header("Location:index.php?seccion=abm_users&error=camposObligatorios"); // Si no están completos, devuelve error establecido en array
    die();
}

// Guardo POST en variables - Funciones filtrar y filtrar2 remueven htmlentities
$email = filtrarMail($_POST["email"]);
$nombre = filtrar2($_POST["nombre"]);
$apellido = filtrar2($_POST["apellido"]);
$usuario = filtrarMail($_POST["usuario"]);
$perfil = filtrar2($_POST["perfil"]);


// Chequea si ya existe la carpeta en modelos, en caso contrario devuelve &error=modeloexistente
if(is_dir("../usuarios/$email")){
    header("Location:index.php?seccion=abm_users&error=usuarioExiste");
    die();
}

// Crea directorio con nombre $modelid (nombre de la carpeta del auto)
mkdir("../usuarios/$email");

// Creación de archivos *.txt dentro de la carpeta
file_put_contents("../usuarios/$email/nombre.txt",$nombre);
file_put_contents("../usuarios/$email/apellido.txt",$apellido);
file_put_contents("../usuarios/$email/usuario.txt",$usuario);
file_put_contents("../usuarios/$email/perfil.txt",$perfil);
file_put_contents("../usuarios/$email/password.txt",password_hash("123456a",PASSWORD_DEFAULT));

header("Location:index.php?seccion=lista_usuarios&estado=ok&ok=alta_usuario");