<?php

if(empty($_POST["comentario"])){
    header("Location:index.php?seccion=lista_comentarios&estado=error&error=sin_comentario");
    die();
}else{
    $comentario = $_POST["comentario"];
    
     //print $comentario;
    if(!is_dir("../comentarios/$comentario")){
        header("Location:index.php?seccion=lista_comentarios&estado=error&error=sin_comentario");
        die();
    }else{
        // 			borrar los archivos de la carpeta
        if(is_file("../comentarios/$comentario/comentario.txt")){
            unlink("../comentarios/$comentario/nombre.txt");
            unlink("../comentarios/$comentario/apellido.txt");
            unlink("../comentarios/$comentario/email.txt");
            unlink("../comentarios/$comentario/indole.txt");
            unlink("../comentarios/$comentario/comentario.txt");
            rmdir("../comentarios/$comentario");

            header("Location:index.php?seccion=lista_comentarios&estado=ok&ok=comentario_borrado");
            die();

        }
    }
   
}

