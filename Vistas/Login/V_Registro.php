<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!-- <link rel="stylesheet" href="../Estilos/styles.css"/> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./Estilos_login/registro.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Registrarse</h5>
            <form action="../../Controlador/registrar.php" method="post">

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required autofocus>
                <label for="nombre">Nombre</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
                <label for="apellidos">Apellidos</label>
              </div>

              <div class="form-floating mb-3">
                <input type="number"  min="0" class="form-control" id="edad" name="edad" placeholder="Edad" required>
                <label for="edad">Edad</label>
              </div>
              
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="correo" name="correo" placeholder="correo@gmail.com" required>
                <label for="correo">Correo electrónico</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
                <label for="direccion">Dirección</label>
              </div>
              

              <hr>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Contraseña" required>
                <label for="Contraseña">Contraseña</label>
              </div>

              <div class="d-grid mb-2">
                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Registrar</button>
              </div>

              <a class="d-block text-center mt-2 small" href="V_Login.php">¿Ya tienes una cuenta? Entra aquí</a>

              <hr class="my-4">

              

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <script>src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"</script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>