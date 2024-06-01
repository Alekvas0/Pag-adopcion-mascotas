<?php session_start();
include("../../Config/Conexion.php");
$db = new Conexion;
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql = "SELECT * FROM mascota WHERE ID_Mascota = '$id'";
$resultado = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="GMT-4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar mascotas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Paginas/Estilos_pag/Estilo.css">
</head>
<body>
    <header>
            <div class="contenedor-img-usuario">
                <img class="contenedor-logo" src="../Paginas/img/Mino.jpg" alt="" />
                <h2><?php
                if (!isset($_SESSION["credenciales"])){
                    echo " ";
                }else {
                    echo $_SESSION['credenciales']['1'];
                }
                ?></h2>
            </div>
            
            <?php
            if (!isset($_SESSION["credenciales"])){
                    echo " ";
            }else {
                if ($_SESSION['credenciales']['0'] == 1){
                    echo '<a class="link-header sesion" href="../Admin/V_crud.php">admin</a>';
                }else {
                        echo ' ';
                }
            }
            ?>
            
            <nav>
                <a class="link-header" href="../Paginas/V_Inicio.php">Inicio</a>
                <a class="text-center link-header" href="../Paginas/V_como_adoptar.php">Como adoptar</a>
                <a id="sesion" class="link-header" href="../Login/V_Login.php">Iniciar Sesión</a>
            </nav>
    </header>

    <main>
        <div class="container-fluid row">
            <form class="col-4 p-3 bg-warning m-auto"  method="post">
                    <h3 class="text-center alert alert-warning">Modificar mascotas</h3>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <?php 
                    include("../../Controlador/modificar_mascota.php");
                    if ($resultado) {
                        while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <div class="mb-3">
                        <label for="nombre-mascota" class="form-label">Nombre de la Mascota</label>
                        <input type="text" class="form-control" name="nombre_mascota" value="<?php echo $nombre = $row['Nombre']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="especie" class="form-label">Especie de la Mascota</label>
                        <input type="text" class="form-control" name="especie" value="<?php echo $especie = $row['Especie']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="raza" class="form-label">Raza de la Mascota</label>
                        <input type="text" class="form-control" name="raza" value="<?php echo $raza = $row['Raza']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad de la Mascota</label>
                        <input type="text"class="form-control" name="edad" value="<?php echo $edad = $row['Edad']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo de la Mascota</label>
                        <input type="text" class="form-control" name="sexo" value="<?php echo $sexo = $row['Sexo']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso de la Mascota</label>
                        <input type="number" min="1" class="form-control" name="peso" value="<?php echo $peso = $row['Peso']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción de la Mascota</label>
                        <input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion = $row['Descripcion']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar mascota</button>

                    <?php } }
                    ?>
            </form>
        </div>
    </main>
    
    <footer class="center">
        <script src="../Paginas/JavaScript/toTop.js"></script>
        <section>
            <p><b>Información de contacto</b></p>
            <p><b>Institución</b></p>
        </section>

        <a class=" link-header" onclick="toTop()">Top</a>

        <section>
            <p><b>Alek Vásquez Rojas | correo@gmail.com | tel: +56912345678</b></p>
            <p><b>AIEP</b></p>
        </section>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>