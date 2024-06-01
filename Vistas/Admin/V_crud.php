<?php 
    session_start();
    include("../../Config/Conexion.php");
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="GMT-4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Paginas/Estilos_pag/Estilo.css">
    <script src="https://kit.fontawesome.com/6d8893175d.js" crossorigin="anonymous"></script>
    <script src="../Paginas/JavaScript/eliminar_mascota.js"></script>
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
            <form class="col-4 p-3 bg-warning"  method="post">
                <h3 class="text-center">Registro de mascotas</h3>
                <?php include("../../Controlador/registro_mascotas.php"); ?>
                <div class="mb-3">
                    <label for="nombre-mascota" class="form-label">Nombre de la Mascota</label>
                    <input type="text" class="form-control" name="nombre_mascota">
                </div>

                <div class="mb-3">
                    <label for="especie" class="form-label">Especie de la Mascota</label>
                    <input type="text" class="form-control" name="especie">
                </div>

                <div class="mb-3">
                    <label for="raza" class="form-label">Raza de la Mascota</label>
                    <input type="text" class="form-control" name="raza">
                </div>

                <div class="mb-3">
                    <label for="edad" class="form-label">Edad de la Mascota</label>
                    <input type="text"class="form-control" name="edad">
                </div>

                <div class="mb-3">
                    <label for="sexo" class="form-label">Sexo de la Mascota</label>
                    <input type="text" class="form-control" name="sexo">
                </div>

                <div class="mb-3">
                    <label for="peso" class="form-label">Peso de la Mascota</label>
                    <input type="number" min="1" class="form-control" name="peso">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción de la Mascota</label>
                    <input type="text" class="form-control" name="descripcion">
                </div>
                
                <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
            </form>

            <div class="col-8 p-4">
                <?php include("../../Controlador/eliminar_mascota.php") ?>
                <table class="table table-striped">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Especie</th>
                            <th scope="col">Raza</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Descripción</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            $db = new Conexion;
                            $con = $db->conectar();
                            $sql = "SELECT * FROM mascota";
                            $resultado = mysqli_query($con,$sql);

                            while($row = mysqli_fetch_array($resultado)){ ?>

                                <tr>
                                    <td><?php echo $id_mascota = $row['ID_Mascota'] ?></td>
                                    <td><?php echo $nombre = $row['Nombre']; ?></td>
                                    <td><?php echo $especie = $row['Especie']; ?></td>
                                    <td><?php echo $raza = $row['Raza']; ?></td>
                                    <td><?php echo $edad = $row['Edad']; ?></td>
                                    <td><?php echo $sexo = $row['Sexo']; ?></td>
                                    <td><?php echo $peso = $row['Peso']; ?> Kg</td>
                                    <td><?php echo $descripcion = $row['Descripcion']; ?></td>
                                    <td>
                                        <a href="V_modificar_mascota.php?id=<?= $id_mascota ?>" class="btn btn-small btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>

                                        <a onclick="return eliminar()" href="V_crud.php?id=<?= $id_mascota ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>

                            <?php }
                        ?>
                    </tbody>
                </table>
            </div>
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