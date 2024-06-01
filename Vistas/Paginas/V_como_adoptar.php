<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="GMT-4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Como adoptar</title>
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

            <!-- <div>Menu</div> -->
        </nav>
    </header>

    <main>
        <div class="titulo">
            <h1>¿Como puedo adoptar?</h1>
        </div>
        <div class="contenedor-instruccion">
            <div class="instrucciones">
                <img src="img/Instrucciones/paso1.png" alt="paso_1">
            </div>

            <div class="instrucciones">
                <img src="img/Instrucciones/paso2.png" alt="paso_2">
            </div>

            <div class="instrucciones">
                <img src="img/Instrucciones/paso3.png" alt="paso_3">
            </div>
        </div>

        <div class="titulo">
            <h1>¿Alguna otra pregunta?, escríbenos un correo</h1>
        </div>
        <div class="pregunta-correo">
            <form class="form-pregunta" action="https://formsubmit.co/adoptamascotas.m@gmail.com" method="post" >

                <input type="hidden" name="_next" value="http://localhost/mascotas/Vistas/paginas/V_inicio.php">
                <input type="hidden" name="_captcha" value="false"> <!-- True para evitar bots -->

                <input type="hidden" id="correo_usuario" name="correo_usuario"
                value = "<?php 
                            if (!isset($_SESSION['credenciales'])){
                                echo "correo@anonimo.com";
                            }else {
                                echo $_SESSION['credenciales']['1'];
                            } ?>
                "/>

                <input type="hidden" name="_subject" value="Pregunta en ¿Como adoptar?">

                <div class="pregunta-form como">
                    <label for="rut">Mensaje</label>
                    <br>
                    <textarea id="mensaje" name="mensaje" required></textarea>
                </div>


                <?php
                if (!isset($_SESSION["credenciales"])){
                    echo '<div class="pregunta-form enviar"><p class="no-form">debe registrarse para poder envíar el formulario</p></div> ';
                }else {
                    echo '<div class="pregunta-form enviar">
                    <button type="submit" onclick="window.alert("Su mensaje se ha enviado correctamente, se le contactará vía correo electrónico");">Envíar</button></div>';
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
</body>
</html>