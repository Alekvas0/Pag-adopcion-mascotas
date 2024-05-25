<?php 
session_start();

/* var_dump ($_SESSION['correo']); */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Como adoptar</title>
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

    <main id="main-adoptar">
        <h1>¿Como puedo adoptar?</h1>
        <div class="contenedor-instruccion">
            <div class="instrucciones">
                1
            </div>

            <div class="instrucciones">
                2
            </div>

            <div class="instrucciones">
                3
            </div>
        </div>

        <h1>¿Alguna otra pregunta?, escríbenos un correo</h1>
        <div class="pregunta-correo">
            <form action="https://formsubmit.co/adoptamascotas.m@gmail.com" method="post" >

                <input type="hidden" name="_next" value="http://localhost/mascotas/Vistas/paginas/V_inicio.php">
                <input type="hidden" name="_captcha" value="false"> <!-- True para evitar bots -->

                <input type="hidden" id="correo_usuario" name="correo_usuario"
                value = "<?php 
                            if (!isset($_SESSION["correo"])){
                                echo "correo@anonimo.com";
                            }else {
                                echo $_SESSION['correo'];
                            } ?>
                "/>

                <input type="hidden" name="_subject" value="Pregunta en ¿Como adoptar?">

                <div class="pregunta-form como">
                    <label for="rut">Mensaje</label>
                    <br>
                    <textarea id="mensaje" name="mensaje" required></textarea>
                </div>

                <div class="pregunta-form enviar">
                    <button type="submit" onclick="window.alert('Su mensaje se ha enviado correctamente, se le contactará vía correo electrónico');">Envíar</button>
                </div>
            </form>
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
</body>
</html>