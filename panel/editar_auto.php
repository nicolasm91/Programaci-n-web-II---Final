<?php
require_once("../funciones.php");

// Test POST del formulario
/* print $_POST["originalauto"]. " | Original<br>";
print $_POST["modelid"]. " | ModelID<br>";
print $_POST["nomcomercial"]. " | NombreComercial<br>";
print $_POST["precio"]. " | Precio<br>";
print $_FILES["imagen"]["name"]. " | IMG<br>";
print "------ Funciona ------ <br>"; */


if(empty($_POST["originalauto"]) || empty($_POST["modelid"]) || empty($_POST["nomcomercial"]) || empty($_POST["precio"])){
    print "<br>Check campos vacíos | funciona";
    header("Location:index.php?seccion=abm_auto&error=camposObligatorios"); // Si no están completos, devuelve error establecido en array
    die();
}
// Guardar POSTS en variables
$originalauto = strtolower(trim(filtrar($_POST["originalauto"])));
$modelid = trim(filtrar($_POST["modelid"])); // Model ID sin espacios y minúscula
$nomcomercial = filtrar2($_POST["nomcomercial"]); // Nombre comercial en minúscula
$precio = filtrar($_POST["precio"]);

if(!is_dir("../modelos/$originalauto")){
    header("Location:index.php?seccion=abm_auto&estado=error&error=auto_no_existente");
    die();
}

if(!empty($_FILES["imagen"])){
    $nombreImagen = $_FILES["imagen"]["name"]; // obtengo el nombre del archivo
    
    if($_FILES["imagen"]["name"] && strpos($nombreImagen,".png") === false){
        header("Location:index.php?seccion=abm_auto&error=formatoImagen");
        die();
    }
    // Manejo de imagen
    $imagen  = $_FILES["imagen"]; // Guardar imagen en variable
    $origen  = $_FILES["imagen"]["tmp_name"];
    $destino = "../modelos/$originalauto/$originalauto.png";

    move_uploaded_file($origen, $destino);
}

$cleanModelid = str_replace(" ","",$modelid);

if($cleanModelid != $originalauto){ // Si el modelid difiere del valor del original de la carpeta
    rename("../modelos/$originalauto","../modelos/$cleanModelid"); // Renombrar la carpeta al nuevo modelid (espacios retirados)
    // Dado que la foto va a tener el nombre anterior y no va a aparecer:
    if(is_file("../modelos/$cleanModelid/$originalauto.png")){ // Si la foto todavía tiene el nombre del modelo previo a editarse
        rename("../modelos/$cleanModelid/$originalauto.png","../modelos/$cleanModelid/$cleanModelid.png"); // Cambiarla al nuevo modelid
        rename("../modelos/$cleanModelid/$originalauto.txt","../modelos/$cleanModelid/$cleanModelid.txt"); // Renombrar .txt con mismo nombre del modelo
    }

    $originalauto = $cleanModelid;
}

// Guardar archivos
file_put_contents("../modelos/$originalauto/precio.txt",$precio);
file_put_contents("../modelos/$originalauto/$originalauto.txt",$nomcomercial); // Guarda el nombre comercial (con espacios) dentro del .txt con el nombre código del auto

header("Location:index.php?seccion=lista_autos&estado=ok&ok=modelo_editado");


