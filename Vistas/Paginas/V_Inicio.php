<?php 
session_start();
require '../../Config/Conexion.php';
require "../../Config/token.php";
$db = new Conexion;
$con = $db->conectar();

$sql = "SELECT * FROM mascota";
$resultado = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="GMT-4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="Estilos_pag/Estilo.css">
</head>
<body>
    <header>
        <div class="contenedor-img-usuario">
            <img class="contenedor-logo" src="img/Mino.jpg" alt="" />
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
            <a class="link-header" href="V_inicio.php">Inicio</a>
            <a class="link-header" href="V_como_adoptar.php">Como adoptar</a>
            <a id="sesion" class="link-header" href="../Login/V_Login.php">Iniciar Sesión</a>
        </nav>
    </header>

    <main>
        <div class="slider">
            <div class="slider--inner">
                <div class="contenedor-img">
                    <img src="img/Slider/slider1-r.jpg" alt="perrogato"/>
                </div>

                <div class="contenedor-img">
                    <img src="img/Slider/slider2-r.jpg" alt="perros"/>
                </div>

                <div class="contenedor-img">
                    <img src="img/Slider/slider3-r.jpg" alt="gatos"/>
                </div>
            </div>
        </div>

        <div class="contenedor-inicio">
            <div class="contenedor-animales">
                <?php  foreach($resultado as $row){ ?>
                    <a class="mascotas-disponibles" href="V_adoptar_animal.php?id=<?php echo $row['ID_Mascota']; ?>&token=<?php echo hash_hmac('sha1', $row['ID_Mascota'],KEY_TOKEN); ?>"><!-- Cifrar id y enviarlo -->
                    <?php 
                        $id = $row['ID_Mascota'];
                        $imagen = "img/Perfil/$id/perfil.jpg";

                        if(!file_exists($imagen)) {
                            $imagen = "img/perfil/error.jpg";
                        }
                    ?>
                    <img src="<?php echo $imagen; ?>">

                    <div class="desc-mascota">
                        <h1><?php echo $row['Nombre']; ?></h1>
                        <h2><?php echo $row['Raza']; ?></h2>
                        <h2><?php echo $row['Edad']; ?></h2>
                        <h2><?php echo $row['Sexo']; ?></h2>
                    </div>
                </a>
                <?php } ?>
            </div>

            <aside><!-- AD --></aside>
        </div>
    </main>

    <footer class="center">
        <script src="JavaScript/toTop.js"></script>
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

    <script src="JavaScript/slider.js"></script>
</body>
</html>