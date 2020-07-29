<?php
// Inicia sesión/continúa sesión iniciada
session_start();


// E-mail y contraseña deben estar completos, sinó recarga la página con error emergente
if(empty($_POST["email"]) || empty($_POST["password"])){
    header("Location:index.php?modulo=login&estado=error&error=camposObligatoriosRegistro");
    die();
}

// Guardo los datos obtenidos via POST en variables
$email = $_POST["email"];
$password = $_POST["password"];

// Si el directorio no existe, retorna error
if(!is_dir("usuarios/$email")){
    header("Location:index.php?modulo=login&estado=error&error=usuarioNoExiste");
    die();
}

// Se guarda en variable la password del usuario guardada en la carpeta
$passwordUsuario = file_get_contents("usuarios/$email/password.txt");

// Y se verifica si coincide con la que se indicó en formulario de login, si difieren retorna error emergente
if(!password_verify($password,$passwordUsuario)){
    header("Location:index.php?modulo=login&estado=error&error=datosErroneos");
    die();
}

// Superadas todas las validaciones, se guardan los datos en posiciones de array $_SESSION
$_SESSION["usuario"] = [
    "nombre" 		=> file_get_contents("usuarios/$email/nombre.txt"),
    "apellido" 		=> file_get_contents("usuarios/$email/apellido.txt"),
    "email" 		=> $email,
    "usuario"		=> file_get_contents("usuarios/$email/usuario.txt"),
    "perfil" 		=> file_get_contents("usuarios/$email/perfil.txt")
];

	// Si el perfil del usuario (especificado en "perfil.txt" es admin, redireccionará al panel de admin)
if($_SESSION["usuario"]["perfil"] == "admin"){
    header("Location:panel/index.php");
    die();
}else{
	// Caso contrario, solo regresará al index.php
    header("Location:index.php");
    die();
}