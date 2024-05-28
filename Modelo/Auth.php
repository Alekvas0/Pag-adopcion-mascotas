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

                header("location:../Vistas/Login/V_Login.php");
            }
        }

        public function logear($correo, $contraseña) {
            $conexion = parent::conectar();

            $contraseña_existente = "";
            $sql = "SELECT * FROM perfil
                    WHERE Correo = '$correo'";
            $respuesta = mysqli_query($conexion,$sql);

            $contraseña_existente = mysqli_fetch_array( $respuesta)['Contraseña'];

            if (password_verify($contraseña, $contraseña_existente)) {
                session_start();
                $_SESSION['correo'] = $correo;

                header("location:http://localhost/mascotas/Vistas/paginas/V_inicio.php");

                return true;
            } else {
                return false;
            }

        }

        /* public function datosMascotas() {

        } */
    }
?>