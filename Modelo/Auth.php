<<?php //autentificación
    include "../Config/Conexion.php";

    class Auth extends Conexion {
        public function registrar ($nombre, $apellidos, $edad, $correo, $direccion, $contraseña) {
            $conexion = parent::conectar();

            $sql_usuario = "INSERT INTO usuario (nombre, apellidos, edad, direccion)
                                        VALUES ('$nombre','$apellidos','$edad','$direccion')";

            $ejecutado = mysqli_query($conexion, $sql_usuario);

            if($ejecutado) {
                $sql_perfil = "INSERT INTO perfil (correo, contraseña, ID_usuario, Rol)
                                            VALUES ('$correo','$contraseña', LAST_INSERT_ID(), '2')";
                
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

            $contraseña_existente = mysqli_fetch_array($respuesta)['Contraseña'];

            if (password_verify($contraseña, $contraseña_existente)) {
                /* session_start(); */


                $sql_rol = "SELECT Rol FROM perfil
                            WHERE Correo = '$correo'";
                $resultado = $conexion->query($sql_rol);

                while($row = $resultado->fetch_assoc()) {
                    $rol = $row["Rol"];
                }
                $array = array($rol, $correo);
                

                $_SESSION['credenciales'] = $array;

                header("location:http://localhost/mascotas/Vistas/paginas/V_inicio.php");

                $conexion->close();

                return true;
            } else {
                return false;
            }

        }

        /* public function datosMascotas() {

        } */
    }
?>