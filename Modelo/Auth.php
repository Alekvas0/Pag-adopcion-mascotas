<<?php //autentificación
    include "../Config/Conexion.php";

    class Auth extends Conexion {
        public function registrar ($nombre, $apellidos, $edad, $correo, $direccion, $contraseña) {
            $conexion = parent::conectar();

            $sql_usuario = "INSERT INTO usuario (nombre, apellidos, edad, direccion)
                                        VALUES ('$nombre','$apellidos','$edad','$direccion')";

            $ejecutado = mysqli_query($conexion, $sql_usuario);

            if($ejecutado) {
                $sql_perfil = "INSERT INTO perfil (correo, contraseña, ID_usuario)
                                            VALUES ('$correo','$contraseña', LAST_INSERT_ID())";
                
                $ejecutado2 = mysqli_query($conexion, $sql_perfil);
            }

            header("location:../Vistas/Login/V_Login.php");
        }
    }
?>