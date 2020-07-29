<?php 
require_once("funciones.php");
// Errorcheck | Campos vacíos
if(empty($_POST["email"]) || empty($_POST["password"])){
    header("Location:index.php?modulo=registro&estado=error&error=camposObligatoriosRegistro");
    die();
}

$email = filtrarMail($_POST["email"]);
$password = $_POST["password"];
$nombre = filtrarNombres($_POST["nombre"]);
$apellido = filtrarNombres($_POST["apellido"]);

// Si el usuario no llenó el campo usuario, el mismo será su dirección de e-mail sin el dominio
$emailLimpio = filtrarNombres(explode("@",$email)[0]);

// .. Lógica en caso de que el campo "usuario" se haya dejado en blanco ..
// Si $_POST["usuario"] fue ingresado por el usuario, se usará ese valor, de lo contrario, se usará $emailLimpio.
$usuario = !empty($_POST["usuario"]) ? filtrarNombres($_POST["usuario"]) : $emailLimpio;

// Chequeo si la carpeta está creada o sea si el usuario ya está creado
if(is_dir("usuarios/$email")){
    header("Location:index.php?modulo=registro&estado=error&error=usuarioExiste");
    die();
}

// Chequeo si el usuario existe
if(file_exists("usuarios/$email/usuario.txt") && file_get_contents("usuarios/$email/usuario.txt") == $usuario){
    header("Location:index.php?modulo=registro&estado=error&error=usuarioExiste");
    die();
}

// Si el usuario no existe creo la carpeta
mkdir("usuarios/$email");

// Vuelca los datos obtenidos en archivos .txt dentro de su directorio correspondiente (carpeta con nombre de $email)
file_put_contents("usuarios/$email/usuario.txt",$usuario);

file_put_contents("usuarios/$email/nombre.txt",$nombre);

file_put_contents("usuarios/$email/apellido.txt",$apellido);

file_put_contents("usuarios/$email/perfil.txt","usuario");
// Los usuarios creados por el formulario siempre serán "usuario", admins deberán setearse manualmente.

file_put_contents("usuarios/$email/password.txt",password_hash($password,PASSWORD_DEFAULT));

header("Location:index.php?modulo=login&estado=ok&ok=registro");