<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
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
            
            <div class="admin">
                <?php
                if (!isset($_SESSION["credenciales"])){
                    echo " ";
                }else {
                    if ($_SESSION['credenciales']['0'] == 1){
                        echo '<a href="../Admin/crud.php">admin</a>';
                    }else {
                        echo ' ';
                    }
                }
                ?>
            </div>

            <nav>
                <a class="link-header" href="../Paginas/V_Inicio.php">Inicio</a>
                <a class="text-center link-header" href="../Paginas/V_como_adoptar.php">Como adoptar</a>
                <a id="sesion" class="link-header" href="../Login/V_Login.php">Iniciar Sesión</a>

                <!-- <div>Menu</div> -->
            </nav>
    </header>

    <main>


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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>