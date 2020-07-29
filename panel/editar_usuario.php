<?php
require_once("../funciones.php");

// Chequeo que Model ID, Nombre comercial y Precio esten completos en el formulario.
if(empty($_POST["originaluser"]) || empty($_POST["email"]) || empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["usuario"] || empty($_POST["perfil"]))){
    header("Location:index.php?seccion=abm_auto&error=camposObligatorios"); // Si no están completos, devuelve error establecido en array
    die();
}

// Guardo POST en variables - Funciones filtrar y filtrar2 remueven htmlentities
$originaluser = $_POST["originaluser"];
$email = filtrarMail($_POST["email"]);
$nombre = filtrar2($_POST["nombre"]);
$apellido = filtrar2($_POST["apellido"]);
$usuario = filtrarMail($_POST["usuario"]);
$perfil = filtrar2($_POST["perfil"]);

// Chequea que exista el directorio, si el mismo no existe nos dirá que no existe lo que querémos editar
if(!is_dir("../usuarios/$originaluser")){
    header("Location:index.php?seccion=abm_users&estado=error&error=usuario_no_existe");
    die();
}

if($email != $originaluser){
    mkdir("../usuarios/$email");
    file_put_contents("../usuarios/$email/nombre.txt",$nombre);
    file_put_contents("../usuarios/$email/apellido.txt",$apellido);
    file_put_contents("../usuarios/$email/usuario.txt",$usuario);
    file_put_contents("../usuarios/$email/perfil.txt",$perfil);

    unlink("../usuarios/$originaluser/nombre.txt");
    unlink("../usuarios/$originaluser/apellido.txt");
    unlink("../usuarios/$originaluser/usuario.txt");
	unlink("../usuarios/$originaluser/password.txt");
	unlink("../usuarios/$originaluser/perfil.txt");
    rmdir("../usuarios/$originaluser");
    
    header("Location:index.php?seccion=lista_usuarios&estado=ok&ok=usuario_editado");

}else{

// Creación de archivos *.txt dentro de la carpeta
file_put_contents("../usuarios/$email/nombre.txt",$nombre);
file_put_contents("../usuarios/$email/apellido.txt",$apellido);
file_put_contents("../usuarios/$email/usuario.txt",$usuario);
file_put_contents("../usuarios/$email/perfil.txt",$perfil);

header("Location:index.php?seccion=lista_usuarios&estado=ok&ok=usuario_editado"); 
}