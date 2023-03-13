<?php

    include "conexion.php";

    class Auth extends conexion{
        public function registrar($usuario, $password, $correo) {
            $conexion = parent::conectar();
            $sql = "INSERT INTO usuarios (usuario, correo, password) VALUES (?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sss', $usuario, $correo ,$password);
            return $query->execute();

        }

        public function iniciarSesion($usuario, $password){
            $conexion = parent::conectar();
            $passwordExistente = "";
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $respuesta = mysqli_query($conexion, $sql);
            $passwordExistente = mysqli_fetch_array($respuesta)['password'];

            if (password_verify($password, $passwordExistente)) {
                $_SESSION['usuario'] = $usuario;
                return true;
            } else {
                return false;
            }
        }
    
    }

    
?>