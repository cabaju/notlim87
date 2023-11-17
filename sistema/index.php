<?php include_once "includes/header.php"; ?>
<style>
.personal-info-window {
    height: 200px; /* O la altura deseada */
}

</style>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Panel de Administración CETPRO LURIN UGEL-01</h1>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<a class="col-xl-6 col-md-6 mb-4" href="lista_usuarios.php">
			<div class="card border-left-warning shadow h-100 py-2 bg-dark">
				<div class="card-body bg-dark">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2 text-warning">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Usuarios</div>
							<div class="h5 mb-0 font-weight-bold"><?php echo $data['usuarios']; ?></div>
						</div>
						<div class="col-auto text-warning">
							<i class="fas fa-user fa-2x "></i>
						</div>
					</div>
				</div>
			</div>
		</a>



		<!-- Earnings (Monthly) Card Example -->
		<a class="col-xl-6 col-md-6 mb-4" href="lista_productos.php">
			<div class="card border-left-warning shadow h-100 py-2 bg-dark">
				<div class="card-body bg-dark">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2 text-warning">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Inventario</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto text-warning">
									<div class="h5 mb-0 mr-3 font-weight-bold text-warning-800"><?php echo $data['productos']; ?></div>
								</div>
								<div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto text-warning">
							<i class="fas fa-clipboard-list fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
		</a>

	</div>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Configuración</h1>
	</div>
	<div class="row">
		<div class="col-lg-6">
		<div class="card">
				<div class="card-header bg-warning text-dark">
					Información Personal
				</div>
				<div class="card-body bg-dark text-white">
					<div class="form-group">
						<label>Nombre: <strong><?php echo $_SESSION['nombre']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Correo: <strong><?php echo $_SESSION['email']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Rol: <strong><?php echo $_SESSION['rol_name']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Usuario: <strong><?php echo $_SESSION['user']; ?></strong></label>
					</div>
				</div>

			</div>
			
		</div>

		<div class="col-lg-6">
		<div class="card">
				<div class="card-header bg-warning text-dark">
				Cambiar Contraseña
				</div>
				<div class="card-body bg-dark text-white">
				<form action="" method=" post" name="frmChangePass" id="frmChangePass" class="p-3">
							<div class="form-group">
								<label>Contraseña Actual</label>
								<input type="password" name="actual" id="actual" placeholder="Clave Actual" required class="form-control">
							</div>
							<div class="form-group">
								<label>Nueva Contraseña</label>
								<input type="password" name="nueva" id="nueva" placeholder="Nueva Clave" required class="form-control">
							</div>
							<div class="form-group">
								<label>Confirmar Contraseña</label>
								<input type="password" name="confirmar" id="confirmar" placeholder="Confirmar clave" required class="form-control">
							</div>
							<div class="alertChangePass" style="display:none;">
							</div>
							<div>
								<button type="submit" class="btn btn-warning btnChangePass">Cambiar Contraseña</button>
							</div>
						</form>
				</div>

			</div>

		</div>
		

	</div>
    <div class="d-flex justify-content-center text-center mt-3">
        <img src="img/cetpro.png" alt="Descripción de la imagen" class="img-fluid">
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>