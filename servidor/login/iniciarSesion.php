<?php session_start();

    include "../../clases/auth.php";
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $Auth = new Auth();

    if ($Auth->iniciarSesion($usuario, $password)) {
       header("location:../../inicio.php");
    } else {
        echo "No se pudo iniciar sesión";
    }


?>