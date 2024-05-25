<?php 
session_start();
require '../../Config/Conexion.php';
require "../../Config/token.php";
$db = new Conexion;
$con = $db->conectar();

$sql = "SELECT * FROM mascota";
$resultado = mysqli_query($con,$sql);

/* var_dump ($_SESSION['correo']); */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="Estilos_pag/Estilo.css">
    
</head>
<body>
    <header>
        <div class="contenedor-img-usuario">
            <img class="contenedor-logo" src="img/Mino.jpg" alt="" />
            <h2><?php
            if (!isset($_SESSION["correo"])){
                echo " ";
            }else {
                echo $_SESSION['correo'];
            }
            ?></h2>
        </div>
        

        <nav>
            <a class="link-header" href="V_inicio.php">Inicio</a>
            <a class="link-header" href="V_como_adoptar.php">Como adoptar</a>
            <a id="sesion" class="link-header" href="../Login/V_Login.php">Iniciar Sesión</a>

            <!-- <div>Menu</div> -->
        </nav>
    </header>

    <main>
        
        <div class="slider">
            <div class="slider--inner">
                <div class="contenedor-img">
                    <img src="img/Slider/slider1.jpg" alt="perrogato"/>
                </div>

                <div class="contenedor-img">
                    <img src="img/Slider/slider2.jpg" alt="perros"/>
                </div>

                <div class="contenedor-img">
                    <img src="img/Slider/slider3.jpg" alt="gatos"/>
                </div>
            </div>
        </div>

        <div class="contenedor-inicio">
            <div class="contenedor-animales">
                <?php  foreach($resultado as $row){ ?>
                    <a class="mascotas-disponibles" href="V_adoptar_animal.php?id=<?php echo $row['ID_Mascota']; ?>&token=<?php echo hash_hmac('sha1', $row['ID_Mascota'],KEY_TOKEN); ?>">
 <!-- Cifrar id y enviarlo -->
                    <?php 
                        $id = $row['ID_Mascota'];
                        $imagen = "img/Perfil/$id/perfil.jpg";

                        if(!file_exists($imagen)) {
                            $imagen = "img/perfil/error.jpg";
                        }
                    ?>
                    
                    <img src="<?php echo $imagen; ?>">
                    <div class="desc-mascota">
                        <h2><?php echo $row['Nombre']; ?></h2>
                        <h2><?php echo $row['Raza']; ?></h2>
                        <h2><?php echo $row['Edad']; ?></h2>
                        <h2><?php echo $row['Sexo']; ?></h2>
                        <!-- <p><?php /* echo $row['Descripcion']; */ ?></p> -->
                    </div>
                </a>
                <?php } ?>
                <!-- <a class="mascotas-disponibles" href="">
                    <img src="img/Perfil/Juanito.jpg" alt="">
                    <div class="desc-mascota">
                        <h2>Juanito</h2>
                        <p>
                            Juanito es un gato siamés de 2 años con un carácter curioso y afectuoso. Sus ojos azules y su elegante pelaje lo hacen destacar en cualquier lugar. Juanito es juguetón y le encanta explorar su entorno, pero también aprecia los mimos y caricias. Es perfecto para familias o personas que buscan un compañero fiel y entretenido. Juanito está castrado y al día con sus vacunas. Adóptalo y descubre la maravilla de tener un amigo felino leal y encantador.</p>
                    </div>
                </a> -->
                <!-- <a class="mascotas-disponibles" href="">
                    <img src="img/Perfil/Molly.jpg" alt="">
                    <div class="desc-mascota">
                        <h2>Molly</h2>
                        <p>Molly es una dulce labradora de 3 años, con un espíritu juguetón y un corazón lleno de amor. Su pelaje dorado y ojos expresivos la convierten en una belleza irresistible. Es muy sociable, se lleva bien con niños y otros perros, y adora los paseos al aire libre. Molly está entrenada y siempre dispuesta a aprender nuevas cosas. Busca una familia activa y amorosa que le brinde el hogar que merece. ¡Adopta a Molly y añade una dosis extra de alegría a tu vida!</p>
                    </div>
                </a>
                <a class="mascotas-disponibles" href="">
                    <img src="img/Perfil/Nala.jpg" alt="">
                    <div class="desc-mascota"s>
                        <h2>Nala</h2>
                        <p>Nala es una hermosa gata atigrada de 1 año, llena de energía y ternura. Su pelaje suave y sus ojos brillantes la convierten en una compañera irresistible. Es juguetona, curiosa y disfruta tanto de la compañía humana como de sus ratos de independencia. Nala se adapta fácilmente a nuevos entornos y es ideal para cualquier hogar que le ofrezca amor y cuidado. Está esterilizada y vacunada. ¡Adopta a Nala y añade un toque de dulzura y diversión a tu vida!</p>
                    </div>
                </a> -->
            </div>

            <aside>
                AD
            </aside>
        </div>
    </main>

    <footer>
        <section>
            <p><b>Información de contacto</b></p>
            <p><b>Institución</b></p>
        </section>

        <section>
            <p><b>Alek Vásquez Rojas | correo@gmail.com | tel: +56912345678</b></p>
            <p><b>AIEP</b></p>
        </section>
    </footer>

    <script src="JavaScript/slider.js"></script>
</body>
</html>