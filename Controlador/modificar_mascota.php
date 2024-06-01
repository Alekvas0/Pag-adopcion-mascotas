<?php

if (!empty($_POST["btnregistrar"]) ) {
    if(!empty($_POST["nombre_mascota"]) and !empty($_POST["especie"]) and !empty($_POST["raza"]) and !empty($_POST["edad"]) and !empty($_POST["sexo"]) and !empty($_POST["peso"]) and !empty($_POST["descripcion"]) ){

        $id_mascota = $_POST["id"];
        $nombre_mascota = $_POST["nombre_mascota"];
        $especie = $_POST["especie"];
        $raza = $_POST["raza"];
        $edad = $_POST["edad"];
        $sexo = $_POST["sexo"];
        $peso = $_POST["peso"];
        $descripcion = $_POST["descripcion"];

        $db = new Conexion;
        $con = $db->conectar();
        $sql = "UPDATE mascota SET Nombre = '$nombre_mascota', Especie = '$especie', Raza = '$raza', Edad = '$edad', Sexo = '$sexo', Peso = $peso, Descripcion = '$descripcion' WHERE ID_Mascota = '$id_mascota'";
        $resultado = mysqli_query($con,$sql);

        if($resultado){
            header("location:V_crud.php");
        }else {
            echo '<div class="alert alert-danger"> Error al modificar mascota </div>';
        }

    }else{
        echo '<div class="alert alert-warning"> Campos vacios </div>';
    }
}

?>