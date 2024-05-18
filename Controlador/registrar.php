<?php 
    include "../Modelo/Auth.php";

    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);

    $Auth = new Auth();

    if ($Auth->registrar($nombre, $apellidos, $edad, $correo, $direccion, $contraseña)) {
        //¿?
    } else {
        echo "No se pudo registrar";
    }
?>