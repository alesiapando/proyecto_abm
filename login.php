<?php
    $usuario = $_POST ["usuario"];
    $contrasenia = $_POST ["pass"];
    
    $ckusuario= "admin";
    $ckpass= 1234;

    if ($usuario==$ckusuario && $contrasenia==$ckpass) {
        header ("location:listar2.php");
    } else {
        header ("location:https://www.pixar.com/error404/");
    }
?>