<?php

    include "../../clases/auth.php";

    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $Auth = new Auth();

    if ($Auth->registrar($usuario, $password, $correo)) {
        header("location:../../index.php");
    } else {
        echo "No se pudo registrar";
    }


?>