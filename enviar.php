<?php 

require_once("funciones.php");

// Condiciones - $_GET["error"]
if(!isset($_POST["indole"])){
    header("Location:index.php?modulo=contacto&error=tipo_de_consulta");
    die();
}

if(strlen($_POST["nombre"]) > 15){
    header("Location:index.php?modulo=contacto&error=mxchar_nombre");
    die();
}

if(strlen($_POST["comentario"]) > 90){
    header("Location:index.php?modulo=contacto&error=mxchar_comentario");
    die();
}

if(strlen($_POST["apellido"]) > 15){
    header("Location:index.php?modulo=contacto&error=mxchar_apellido");
    die();
}

if(strpos($_POST["email"],"@") === false){
   header("Location:index.php?modulo=contacto&error=error_email");
    die();
}

$black = ["groseria1","groseria1","groseria3","groseria4"];

$indole = $_POST["indole"];
$nombre = str_ireplace($black, "😠",$_POST["nombre"]);
$apellido = str_ireplace($black, "😠",$_POST["apellido"]);
$email = str_ireplace($black, "😠",$_POST["email"]);
$comentario = str_ireplace($black,"😠",$_POST["comentario"]);
$postid = uniqid();

// TEST | Print datos del formulario

/* print $_POST["indole"]. " | indole<br>";
print $_POST["nombre"]. " | nombre<br>";
print $_POST["apellido"]. " | apellido<br>";
print $_POST["email"]. " | email<br>";
print $_POST["comentario"]. " | comentario<br>";
print "This be the ID ". $postid; */

// Guardar comentarios en carpeta con ID único
mkdir("./comentarios/$postid");
file_put_contents("./comentarios/$postid/indole.txt",$indole);
file_put_contents("./comentarios/$postid/nombre.txt",$nombre);
file_put_contents("./comentarios/$postid/apellido.txt",$apellido);
file_put_contents("./comentarios/$postid/email.txt",$email);
file_put_contents("./comentarios/$postid/comentario.txt",$comentario);

// Redir
header("Location:index.php?modulo=contacto&estado=exitosa");

