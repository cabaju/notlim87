<?php
$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
  header('location: sistema/');
} else {
  if (!empty($_POST)) {
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
      $alert = '<div class="alert alert-danger" role="alert">
  Ingrese su usuario y su clave
</div>';
    } else {
      require_once "conexion.php";
      $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
      $clave = md5(mysqli_real_escape_string($conexion, $_POST['clave']));
      $query = mysqli_query($conexion, "SELECT u.idusuario, u.nombre, u.correo,u.usuario,r.idrol,r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol WHERE u.usuario = '$user' AND u.clave = '$clave'");
      mysqli_close($conexion);
      $resultado = mysqli_num_rows($query);
      if ($resultado > 0) {
        $dato = mysqli_fetch_array($query);
        $_SESSION['active'] = true;
        $_SESSION['idUser'] = $dato['idusuario'];
        $_SESSION['nombre'] = $dato['nombre'];
        $_SESSION['email'] = $dato['correo'];
        $_SESSION['user'] = $dato['usuario'];
        $_SESSION['rol'] = $dato['idrol'];
        $_SESSION['rol_name'] = $dato['rol'];
        header('location: sistema/');
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
              Usuario o Contraseña Incorrecta
            </div>';
        session_destroy();
      }
    }
  }
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Vida Informatico</title>

  <!-- Custom fonts for this template-->
  <link href="sistema/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="sistema/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
   .custom-card {
    margin-top: 100px; /* Ajusta el margen superior según tus necesidades para mover el formulario hacia abajo */
    border-radius: 10px;
    background-color: rgba(0, 0, 0, 0.5); /* Ajusta el canal alfa según tus necesidades */
    color: white; /* Cambia el color del texto según sea necesario */
  }
  body, html {
    margin: 0;
    padding: 0;
    height: auto;
    width:auto;
}
.container {
    margin-top: 100px; /* Ajusta según tus necesidades */
}
.custom-container {
            height: 100%;
        }

    .card-body {
      padding: 10px; /* Ajusta el relleno del cuerpo según tus necesidades */
    }

    .col-lg-4 {
      max-width: 300px; /* Ajusta el ancho máximo de la columna según tus necesidades */
      margin: 0 auto; /* Centra la columna en el contenedor */
    }

    .text-center {
      margin-bottom: 10px; /* Ajusta el margen inferior según tus necesidades */
    }

    .form-group {
      margin-bottom: 15px; /* Ajusta el margen inferior de los elementos del formulario */
    }

    .btn-primary {
      width: 100%; /* Hace que el botón ocupe el 100% del ancho de su contenedor */
    }
    .custom-narrow-btn {
      width: 100px; /* Puedes ajustar el ancho según tus necesidades */
    }
    .center-btn {
      text-align: center;
    }

    .custom-text-color {
    color: white !important; /* Usa !important para asegurar que esta regla tenga prioridad */
  }
  body {
      background-image: url('./sistema/img/oda.jpeg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

  </style>
</head>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Vida Informatico</title>

  <!-- Custom fonts for this template-->
  <link href="sistema/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="sistema/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
<!-- <img src="./sistema/img/oda.jpeg" alt="Descripción de la imagen" width="auto" height="auto"> -->

  <div class="container ">
    <!-- Outer Row -->
    <div class="row justify-content-center">

    <div class="col-lg-4">

        <div class="custom-card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body kkkkkkkkkkkkkkkkkkkk-->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-2">
                  <div class="text-center">
                  <h1 class="h4 custom-text-color mb-4">Iniciar Sesión</h1>
                  </div>
                  <form class="user" method="POST">
                    <?php echo isset($alert) ? $alert : ""; ?>
                    <hr>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-user"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Nombre de usuario" name="usuario" />
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                          </span>
                        </div>
                        <input type="password" class="form-control" placeholder="Contraseña" name="clave">
                      </div>
                    </div>
                    <hr>
                      <div class="center-btn"> <!-- Agregamos la clase center-btn -->
                        <button type="submit" class="btn btn-primary custom-narrow-btn">
                          <i class="fas fa-sign-in-alt"></i> Enviar
                        </button>
                        <hr>
                        <div class="bottom-image text-center">
                        <!-- <img src="img/cetpro.png" alt="Descripción de la imagen" class="img-fluid"> -->
                        <img src="./sistema/img/cetpro.png" alt="Descripción de la imagen" width="110" height="110">
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

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="sistema/vendor/jquery/jquery.min.js"></script>
  <script src="sistema/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="sistema/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="sistema/js/sb-admin-2.min.js"></script>

</body>

</html>