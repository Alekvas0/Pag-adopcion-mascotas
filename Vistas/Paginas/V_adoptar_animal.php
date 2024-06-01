<?php 
session_start();
require '../../Config/Conexion.php';
require "../../Config/token.php";
$db = new Conexion;
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset( $_GET["token"] ) ? $_GET["token"] :" ";

$sql = "SELECT * FROM mascota WHERE ID_Mascota = '$id'";
$resultado = mysqli_query($con, $sql);

if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $nombre = $row['Nombre'];
        $especie = $row['Especie'];
        $raza = $row['Raza'];
        $edad = $row['Edad'];
        $sexo = $row['Sexo'];
        $peso = $row['Peso'];
        $descripcion = $row['Descripcion'];

        $imagen = "img/Perfil/$id/perfil.jpg";

        if(!file_exists($imagen)) {
            $imagen = "img/perfil/error.jpg";
        }
    }
} else {
    echo "Error al ejecutar la consulta: " . mysqli_error($con);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="GMT-4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopción</title>
    <link rel="stylesheet" href="Estilos_pag/Estilo.css">
    <script src="JavaScript/atencion.js"></script>
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
        <div class="contenedor-mascotas">
            <div class="modal-container">
                <img class="imagen-mascota" src="<?php echo $imagen; ?>" alt="Perfil">
            </div>

            <article> 
                <h1><?php echo $nombre ?></h1>
                <div class="contenedor-especificaciones">
                    <div class="especificaciones">
                        <span>Especie:</span>
                        <span>Raza:</span>
                        <span>Edad:</span>
                        <span>Sexo:</span>
                        <span>Peso:</span> 
                    </div>

                    <div class="especificaciones datos">
                        <span><?php echo $especie; ?></span>
                        <span><?php echo $raza ?></span>
                        <span><?php echo $edad ?></span>
                        <span><?php echo $sexo ?></span>
                        <span><?php echo $peso ?> Kg</span> 
                    </div>
                </div>

                <div class="descripcion-mascota">
                    <p>
                    <?php echo $descripcion ?></p>
                    </p>
                </div>
            </article>
        </div>

        <div class="titulo">
            <H1>Formulario de adopción</H1>
        </div>
        <div class="contenedor-formulario">
            <form action="https://formsubmit.co/adoptamascotas.m@gmail.com" method="post" > <!-- 08bb7d8bfe89d0613bfe5e1cacf43163 (email encriptado /adoptamascotas.m@gmail.com) -->

                <input type="hidden" name="_next" value="http://localhost/mascotas/Vistas/paginas/V_inicio.php">
                <input type="hidden" name="_captcha" value="false"> <!-- True para evitar bots -->

                <input type="hidden" name="_subject" value="Petición de adopción">
                <input type="hidden" id="correo_usuario" name="correo_usuario"
                value = "<?php 
                            if (!isset($_SESSION['credenciales'])){
                                echo "correo@anonimo.com";
                            }else {
                                echo $_SESSION['credenciales']['1'];
                            } ?>
                "/>
                <input type="hidden" id="id_mascota" name="id_mascota" value = "<?php echo $id; ?>" />
                <input type="hidden" id="nombre_mascota" name="nombre_mascota" value = "<?php echo $nombre; ?>" />
                
                <div class="pregunta-form">
                    <label for="rut">RUT</label>
                    <br>
                    <input type="text" id="rut" name="rut" required />
                </div>
                <div class="pregunta-form">
                    <label for="comuna">Comuna</label>
                    <br>
                    <input type="text" id="comuna" name="comuna" required />
                </div>
                <div class="pregunta-form">
                    <label for="telefono">Teléfono</label>
                    <br>
                    <input type="text" id="telefono" name="telefono" required />
                </div>
                <div class="pregunta-form">
                    <label for="ocupacion">Ocupación</label>
                    <br>
                    <input type="text" id="ocupacion" name="ocupacion" required />
                </div>
                <div class="pregunta-form">
                    <label for="preg-mascota">¿Por qué quiere adoptar a esta mascota?</label>
                    <br>
                    <input type="text" id="preg-mascota" name="preg-mascota" required />
                </div>
                <div class="pregunta-form">
                    <label for="integrantes">Número de integrantes en la familia</label>
                    <br>
                    <input type="number" min="1" id="integrantes" name="integrantes" required />
                </div>

                <?php
                if (!isset($_SESSION["credenciales"])){
                    echo '<div class="pregunta-form enviar adop-animal"><p class="no-form">debe registrarse para poder envíar el formulario</p></div> ';
                }else {
                    echo '<div class="pregunta-form enviar adop-animal">
                    <button type="submit" onclick="window.alert("Su petición se está enviando, por favor espere hasta que se redireccione al inicio. Gracias.");">Envíar</button></div>';
                }
                ?>
                
            </form>
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

    <script src="JavaScript/img_modal.js"></script>
</body>
</html>