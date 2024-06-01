<?php

if (!empty($_POST["btnregistrar"]) ) {
    if(!empty($_POST["nombre_mascota"]) and !empty($_POST["especie"]) and !empty($_POST["raza"]) and !empty($_POST["edad"]) and !empty($_POST["sexo"]) and !empty($_POST["peso"]) and !empty($_POST["descripcion"]) ) {
        /* echo"REGISTRADO CORRECTAMENTE"; */

        $nombre_mascota = $_POST["nombre_mascota"];
        $especie = $_POST["especie"];
        $raza = $_POST["raza"];
        $edad = $_POST["edad"];
        $sexo = $_POST["sexo"];
        $peso = $_POST["peso"];
        $descripcion = $_POST["descripcion"];

        $db = new Conexion;
        $con = $db->conectar();
        $sql = "INSERT INTO mascota(Nombre, Especie, Raza, Edad, Sexo, Peso, Descripcion)
                             VALUES('$nombre_mascota', '$especie', '$raza', '$edad', '$sexo', $peso, '$descripcion')";
        $resultado = mysqli_query($con,$sql);

        if($resultado){
            echo '<div class="alert alert-success"> Mascota registrada correctamente </div>';
        }else {
            echo '<div class="alert alert-danger"> Error al registrar mascota </div>';
        }


    }else {
        echo '<div class="alert alert-warning"> Alguno de los campos está vacio </div>';
    }
}

?>