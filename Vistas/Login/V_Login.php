<?php 
session_start();
unset($_SESSION["credenciales"]);


/* var_dump ($_SESSION['credenciales']['0']); */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login usuario</title>

    <!-- <link rel="stylesheet" href="../Estilos/styles.css"/> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./Estilos_login/login.css">
</head>
<body>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                <div class="col-md-8 col-lg-6">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <h3 class="login-heading mb-4">Login de usuario</h3>

                                    <!-- Sign In Form -->
                                    <form action="../../Controlador/logear.php" method="post">
                                        <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo">
                                        <label for="correo">Correo electrónico</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Contraseña">
                                        <label for="contraseña">Password</label>
                                        </div>

                                        <div class="d-grid">
                                        <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Entrar</button>
                                        <div class="text-center">
                                            <a class="small" href="V_Registro.php">Registrate aqui</a>
                                        </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <!-- <script>src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"</script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>