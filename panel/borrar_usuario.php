<?php

// $user = $_POST["user"];

if(empty($_POST["user"])){ // Si el POST["user"] no contiene nada, arroja error
    header("Location:index.php?seccion=lista_usuarios&estado=error&error=sin_usuario");
    die();
}else{
    $user = $_POST["user"];
    
    // print $user;
    if(!is_dir("../usuarios/$user")){
        header("Location:index.php?seccion=lista_usuarios&estado=error&error=usuario_no_existe");
        die();
    }else{
        // 			borrar los archivos de la carpeta
        if(is_file("../usuarios/$user/usuario.txt")){
            unlink("../usuarios/$user/nombre.txt");
            unlink("../usuarios/$user/apellido.txt");
            unlink("../usuarios/$user/usuario.txt");
            unlink("../usuarios/$user/password.txt");
            unlink("../usuarios/$user/perfil.txt");
            rmdir("../usuarios/$user");

            header("Location:index.php?seccion=lista_usuarios&estado=ok&ok=usuario_borrado"); //Devuelve a lista de usuarios, envía GET[estado] y GET[ok]
            die();

        }
    }
   
}

