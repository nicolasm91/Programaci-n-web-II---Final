<?php
require_once("../funciones.php");

// Chequeo que Model ID, Nombre comercial y Precio esten completos en el formulario.
if(empty($_POST["modelid"]) || empty($_POST["nomcomercial"]) || empty($_POST["precio"])){
    header("Location:index.php?seccion=abm_auto&error=camposObligatorios"); // Si no están completos, devuelve error establecido en array
    die();
}

// Guardo POST en variables - Funciones filtrar y filtrar2 remueven htmlentities
$modelid = trim(filtrar($_POST["modelid"])); // Model ID sin espacios y minúscula
$nomcomercial = filtrar2($_POST["nomcomercial"]); // Nombre comercial en minúscula
$precio = filtrar($_POST["precio"]);

// Chequea si ya existe la carpeta en modelos, en caso contrario devuelve &error=modeloexistente
if(is_dir("../modelos/$modelid")){
    header("Location:index.php?seccion=abm_auto&error=modeloexistente");
    die();
}

// Crea directorio con nombre $modelid (nombre de la carpeta del auto)
mkdir("../modelos/$modelid");

// Creo el archivo descripcion.txt
file_put_contents("../modelos/$modelid/precio.txt",$precio);
file_put_contents("../modelos/$modelid/$modelid.txt",$nomcomercial); // Guarda el nombre comercial (con espacios) dentro del .txt con el nombre código del auto

// Manejo de la imagen
if(!empty($_FILES["imagen"])){
    $nombreModelo = $_FILES["imagen"]["name"]; // obtengo el nombre del archivo
    
    if($_FILES["imagen"]["name"] && strpos($nombreModelo,".png") === false){
        header("Location:index.php?seccion=abm_auto&error=formatoImagen");
        die();
    }


    // Ya tengo la imagen
    $imagen  = $_FILES["imagen"];
    $origen  = $_FILES["imagen"]["tmp_name"];
    $destino = "../modelos/$modelid/$modelid.png";

    move_uploaded_file($origen, $destino);

}

header("Location:index.php?seccion=lista_autos&estado=ok&ok=alta_modelo");