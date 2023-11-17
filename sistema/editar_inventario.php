<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['anio1']) || empty($_POST['anio2']) || empty($_POST['anio3']) || empty($_POST['codigoinve']) || empty($_POST['deno']) || empty($_POST['marca']) || empty($_POST['mode']) || empty($_POST['serie']) || empty($_POST['colo']) || empty($_POST['esta']) || empty($_POST['loca']) || empty($_POST['zo']) || empty($_POST['pi']) || empty($_POST['ambi']) || empty($_POST['usu']) || empty($_POST['dni']) || empty($_POST['obs']) || empty($_POST['fecha'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
    $idinv = $_POST['id'];
    $anio1 = $_POST['anio1'];
    $anio2 = $_POST['anio2'];
    $anio3 = $_POST['anio3'];
    $codigoinve = $_POST['codigoinve'];
    $deno = $_POST['deno'];
    $marca = $_POST['marca'];
    $mode = $_POST['mode'];
    $serie = $_POST['serie'];
    $colo = $_POST['colo'];
    $esta = $_POST['esta'];
    $loca = $_POST['loca'];
    $zo = $_POST['zo'];
    $pi = $_POST['pi'];
    $ambi = $_POST['ambi'];
    $usu = $_POST['usu'];
    $dni = $_POST['dni'];
    $obs = $_POST['obs'];
    $fecha = $_POST['fecha'];

    $result = 0;
    if (is_numeric($dni) and $dni != 0) {

      $query = mysqli_query($conexion, "SELECT * FROM inventario where (dni = '$dni' AND idinv != $idinv)");
      $result = mysqli_fetch_array($query);
      $resul = mysqli_num_rows($query);
    }

    if ($resul >= 1) {
      $alert = '<p class"error">El dni ya existe</p>';
    } else {
      if ($dni == '') {
        $dni = 0;
      }
      $sql_update = mysqli_query($conexion, "UPDATE inventario SET anio1 = $anio1, anio2 = '$anio2' , anio3 = '$anio3', codigoinve = '$codigoinve' , deno = '$deno' , marca = '$marca', mode = '$mode', serie = '$serie', colo = '$colo', esta = '$esta', loca = '$loca', zo = '$zo', pi = '$pi', ambi = '$ambi', usu = '$usu', dni = '$dni', obs = '$obs', fecha = '$fecha' WHERE idinv = $idinv");

      if ($sql_update) {
        $alert = '<p class"exito">Cliente Actualizado correctamente</p>';
      } else {
        $alert = '<p class"error">Error al Actualizar el Cliente</p>';
      }
    }
  }
}
// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_inventario.php");
}
$idinv = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM inventario WHERE idinv = $idinv");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_inventario.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $idinv = $data['id'];
    $anio1 = $_POST['anio1'];
    $anio2 = $_POST['anio2'];
    $anio3 = $_POST['anio3'];
    $codigoinve = $_POST['codigoinve'];
    $deno = $_POST['deno'];
    $marca = $_POST['marca'];
    $mode = $_POST['mode'];
    $serie = $_POST['serie'];
    $colo = $_POST['colo'];
    $esta = $_POST['esta'];
    $loca = $_POST['loca'];
    $zo = $_POST['zo'];
    $pi = $_POST['pi'];
    $ambi = $_POST['ambi'];
    $usu = $_POST['usu'];
    $dni = $_POST['dni'];
    $obs = $_POST['obs'];
    $fecha = $_POST['fecha'];
  }
}
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-6 m-auto">

              <form class="" action="" method="post">
                <?php echo isset($alert) ? $alert : ''; ?>
                <input type="hidden" name="id" value="<?php echo $idinv; ?>">

                <div class="form-group">
                    <label for="anio1">AÑO_2022</label>
                    <input type="text" class="form-control" placeholder="Ingrese Año" name="anio1" id="anio1" value="<?php echo $anio1; ?>">
                </div>
                <div class="form-group">
                    <label for="anio2">AÑO_2020</label>
                    <input type="text" class="form-control" placeholder="Ingrese Año" name="anio2" id="anio2" value="<?php echo $anio2; ?>">
                </div>
                <div class="form-group">
                    <label for="anio3">AÑO_2019</label>
                    <input type="text" class="form-control" placeholder="Ingrese Año" name="anio3" id="anio3" value="<?php echo $anio3; ?>">
                </div>
                <div class="form-group">
                    <label for="codigoinve">CODIGO</label>
                    <input type="text" class="form-control" placeholder="Ingrese Codigo" name="codigoinve" id="codigoinve" value="<?php echo $codigoinve; ?>">
                </div>
                <div class="form-group">
                    <label for="deno">DENOMINACION</label>
                    <input type="text" class="form-control" placeholder="Ingrese denominación" name="deno" id="deno" value="<?php echo $deno; ?>">
                </div>
                <div class="form-group">
                    <label for="marca">MARCA</label>
                    <input type="text" class="form-control" placeholder="Ingrese marca" name="marca" id="marca" value="<?php echo $marca; ?>">
                </div> 
                <div class="form-group">
                    <label for="mode">MODELO</label>
                    <input type="text" class="form-control" placeholder="Ingrese modelo" name="mode" id="mode" value="<?php echo $mode; ?>">
                </div> 
                <div class="form-group">
                    <label for="serie">SERIE/DIMENSIONES</label>
                    <input type="text" class="form-control" placeholder="Ingrese serie" name="serie" id="serie" value="<?php echo $serie; ?>">
                </div> 
                <div class="form-group">
                    <label for="colo">COLOR</label>
                    <input type="text" class="form-control" placeholder="Ingrese Color" name="colo" id="colo" value="<?php echo $colo; ?>">
                </div>
                <div class="form-group">
                    <label for="esta">EST</label>
                    <input type="text" class="form-control" placeholder="Ingrese estado" name="esta" id="esta" value="<?php echo $esta; ?>">
                </div> 
                <div class="form-group">
                    <label for="loca">LOCAL</label>
                    <input type="text" class="form-control" placeholder="Ingrese Local" name="loca" id="loca" value="<?php echo $loca; ?>">
                </div> 
                <div class="form-group">
                    <label for="zo">ZONA</label>
                    <input type="text" class="form-control" placeholder="Ingrese Zona" name="zo" id="zo" value="<?php echo $zo; ?>">
                </div> 
                <div class="form-group">
                    <label for="pi">PISO</label>
                    <input type="text" class="form-control" placeholder="Ingrese Piso" name="pi" id="pi" value="<?php echo $pi; ?>">
                </div> 
                <div class="form-group">
                    <label for="ambi">AMBIENTE</label>
                    <input type="text" class="form-control" placeholder="Ingrese ambiente" name="ambi" id="ambi" value="<?php echo $ambi; ?>">
                </div>
                <div class="form-group">
                    <label for="usu">USUARIO</label>
                    <input type="text" class="form-control" placeholder="Ingrese Usuario" name="usu" id="usu" value="<?php echo $usu; ?>">
                </div> 
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="text" class="form-control" placeholder="Ingrese DNI" name="dni" id="dni" value="<?php echo $dni; ?>">
                </div>
                <div class="form-group">
                    <label for="obs">OBSERVACIÓN</label>
                    <input type="text" class="form-control" placeholder="Ingrese Observación" name="obs" id="obs" value="<?php echo $obs; ?>">
                </div>  
                <div class="form-group">
                    <label for="fecha">FECHA_INVENTARIO</label>
                    <input type="text" class="form-control" placeholder="Ingrese dd/mm/aaaa" name="fecha" id="fecha" value="<?php echo $fecha; ?>">
                </div>   


                <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Inventario</button>
              </form>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php include_once "includes/footer.php"; ?>