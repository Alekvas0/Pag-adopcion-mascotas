<?php session_start();
    include "../Modelo/Auth.php";

    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $Auth = new Auth();

    if ($Auth->logear($correo, $contraseña)) {
        //¿?
    }else {
        header("location:../Vistas/Login/V_Login.php");
        echo "No se pudo logear";
    }
?>