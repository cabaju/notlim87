<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['anio1']) || empty($_POST['anio2']) || empty($_POST['anio3']) || empty($_POST['codigoinve']) || empty($_POST['deno']) || empty($_POST['marca']) || empty($_POST['mode']) || empty($_POST['serie']) || empty($_POST['colo']) || empty($_POST['esta']) || empty($_POST['loca']) || empty($_POST['zo']) || empty($_POST['pi']) || empty($_POST['ambi']) || empty($_POST['usu']) || empty($_POST['dni']) || empty($_POST['obs']) || empty($_POST['fecha'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {

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

        $query = mysqli_query($conexion, "SELECT * FROM inventario where deno = '$deno'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El registro ya existe
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO inventario(anio1,anio2,anio3,codigoinve,deno,marca,mode,serie,colo,esta,loca,zo,pi,ambi,usu,dni,obs,fecha) values ('$anio1', '$anio2', '$anio3', '$codigoinve' , '$deno' , '$marca' , '$mode' , '$serie' , '$colo' , '$esta' , '$loca' , '$zo' , '$pi' , '$ambi' , '$usu' , '$dni' , '$obs' , '$fecha')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Inventario registrado
                        </div>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar inventario
                    </div>';
            }
        }
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
        <a href="lista_inventario.php" class="btn btn-primary">Regresar</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form action="" method="post" autocomplete="off">
                <?php echo isset($alert) ? $alert : ''; ?>
                <div class="form-group">
                    <label for="anio1">AÑO_2022</label>
                    <input type="text" class="form-control" placeholder="Ingrese Año" name="anio1" id="anio1">
                </div>
                <div class="form-group">
                    <label for="anio2">AÑO_2020</label>
                    <input type="text" class="form-control" placeholder="Ingrese Año" name="anio2" id="anio2">
                </div>
                <div class="form-group">
                    <label for="anio3">AÑO_2019</label>
                    <input type="text" class="form-control" placeholder="Ingrese Año" name="anio3" id="anio3">
                </div>
                <div class="form-group">
                    <label for="codigoinve">CODIGO</label>
                    <input type="text" class="form-control" placeholder="Ingrese Codigo" name="codigoinve" id="codigoinve">
                </div>
                <div class="form-group">
                    <label for="deno">DENOMINACION</label>
                    <input type="text" class="form-control" placeholder="Ingrese denominación" name="deno" id="deno">
                </div>
                <div class="form-group">
                    <label for="marca">MARCA</label>
                    <input type="text" class="form-control" placeholder="Ingrese marca" name="marca" id="marca">
                </div> 
                <div class="form-group">
                    <label for="mode">MODELO</label>
                    <input type="text" class="form-control" placeholder="Ingrese modelo" name="mode" id="mode">
                </div> 
                <div class="form-group">
                    <label for="serie">SERIE/DIMENSIONES</label>
                    <input type="text" class="form-control" placeholder="Ingrese serie" name="serie" id="serie">
                </div> 
                <div class="form-group">
                    <label for="colo">COLOR</label>
                    <input type="text" class="form-control" placeholder="Ingrese Color" name="colo" id="colo">
                </div>
                <div class="form-group">
                    <label for="esta">EST</label>
                    <input type="text" class="form-control" placeholder="Ingrese estado" name="esta" id="esta">
                </div> 
                <div class="form-group">
                    <label for="loca">LOCAL</label>
                    <input type="text" class="form-control" placeholder="Ingrese Local" name="loca" id="loca">
                </div> 
                <div class="form-group">
                    <label for="zo">ZONA</label>
                    <input type="text" class="form-control" placeholder="Ingrese Zona" name="zo" id="zo">
                </div> 
                <div class="form-group">
                    <label for="pi">PISO</label>
                    <input type="text" class="form-control" placeholder="Ingrese Piso" name="pi" id="pi">
                </div> 
                <div class="form-group">
                    <label for="ambi">AMBIENTE</label>
                    <input type="text" class="form-control" placeholder="Ingrese ambiente" name="ambi" id="ambi">
                </div>
                <div class="form-group">
                    <label for="usu">USUARIO</label>
                    <input type="text" class="form-control" placeholder="Ingrese Usuario" name="usu" id="usu">
                </div> 
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="text" class="form-control" placeholder="Ingrese DNI" name="dni" id="dni">
                </div>
                <div class="form-group">
                    <label for="obs">OBSERVACIÓN</label>
                    <input type="text" class="form-control" placeholder="Ingrese Observación" name="obs" id="obs">
                </div>  
                <div class="form-group">
                    <label for="fecha">FECHA_INVENTARIO</label>
                    <input type="text" class="form-control" placeholder="Ingrese dd/mm/aaaa" name="fecha" id="fecha">
                </div>                                                                                       
                <input type="submit" value="Guardar Inventario" class="btn btn-primary">
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>