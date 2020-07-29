<?php

if(empty($_POST["auto"])){ // Si el POST["auto"] no contiene nada, arroja error
    header("Location:index.php?seccion=lista_auto&estado=error&error=sin_auto");
    die();
}else{

$auto = $_POST["auto"];
}

if(!is_dir("../modelos/$auto")){ // Si el directorio especificado no existe, no hace nada y arroja error
    header("Location:index.php?seccion=lista_auto&estado=error&error=auto_no_existente");
    die();
}

// 					borrar los archivos de la carpeta
if(is_file("../modelos/$auto/$auto.png")){	// Si existe foto
    unlink("../modelos/$auto/$auto.png");	// Borra foto
	unlink("../modelos/$auto/$auto.txt");	// Borra .txt con nombre comercial del auto
	unlink("../modelos/$auto/precio.txt");	// Borra .txt con precio del auto
	rmdir("../modelos/$auto");				// Borra directorio ../modelos/$auto (carpeta de auto especificado)

header("Location:index.php?seccion=lista_autos&estado=ok&ok=modelo_borrado"); //Devuelve a lista de autos, envía GET[estado] y GET[ok]
die();
}



