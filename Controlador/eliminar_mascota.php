<?php 

if(!empty($_GET["id"])){
    $id = $_GET["id"];

    $db = new Conexion;
    $con = $db->conectar();
    $sql = "DELETE FROM mascota WHERE ID_Mascota = '$id'";
    $resultado = mysqli_query($con,$sql);

    if($resultado){
        echo '<div class="alert alert-success"> Mascota eliminada correctamente </div>';
    }else {
        echo '<div class="alert alert-danger"> Error al eliminar </div>';
    }

}

?>