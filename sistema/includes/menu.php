<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Toggle Sidebar Example</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	</head>
	<style>
			/* Estilo para ocultar el menú lateral por defecto */
			#accordionSidebar {
				display: block; /* Cambiar a 'block' para que sea visible inicialmente */
			}

			.toggled #accordionSidebar {
				position: fixed;
				top: 15px;
				right: 15px;
				z-index: 1000;
				text-align: center;
			}

			/* Ajustes para hacer visible el botón en todo momento */
			#toggleSidebar {
				position: fixed;
				top: 15px;
				left: 10px;
				z-index: 1000;
			}


    </style> 
	<body>





	<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
				<button class="btn btn-warning ml-2" id="toggleSidebar">
					<i class="fas fa-bars"></i> 
				</button>
				<!-- Sidebar - Brand -->
				<a class="sidebar-brand d-flex align-items-center justify-content-end" href="index.php">
					<h6 class="sidebar-brand-text mx-3 text-warning" style="margin-left: auto;">CETPRO LURIN</h6>  
				</a>

				<!-- Divider -->
				<hr class="sidebar-divider my-0">

				<!-- Divider -->
				<hr class="sidebar-divider">


				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item text-warning">
					<a class="nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-cog"></i>
						<span>Ventas</span>
					</a>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-warning py-2 collapse-inner rounded">
							<a class="collapse-item" href="nueva_venta.php">Nueva venta</a>
							<a class="collapse-item" href="ventas.php">Ventas</a>
						</div>
					</div>
				</li>

				<!-- Nav Item - Productos Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
						<i class="fas fa-fw fa-wrench"></i>
						<span>Productos</span>
					</a>
					<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-warning py-2 collapse-inner rounded">
							<a class="collapse-item" href="registro_producto.php">Nuevo Producto</a>
							<a class="collapse-item" href="lista_productos.php">Productos</a>
						</div>
					</div>
				</li>

				<!-- Nav Item - Clientes Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="true" aria-controls="collapseUtilities">
						<i class="fas fa-users"></i>
						<span>Clientes</span>
					</a>
					<div id="collapseClientes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-warning py-2 collapse-inner rounded">
							<a class="collapse-item" href="registro_cliente.php">Nuevo Clientes</a>
							<a class="collapse-item" href="lista_cliente.php">Clientes</a>
						</div>
					</div>
				</li>
				<!-- Nav Item - Utilities Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#collapseProveedor" aria-expanded="true" aria-controls="collapseUtilities">
						<i class="fas fa-hospital"></i>
						<span>Proveedor</span>
					</a>
					<div id="collapseProveedor" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-warning py-2 collapse-inner rounded">
							<a class="collapse-item" href="registro_proveedor.php">Nuevo Proveedor</a>
							<a class="collapse-item" href="lista_proveedor.php">Proveedores</a>
						</div>
					</div>
				</li>
				<?php if ($_SESSION['rol'] == 1) { ?>
					<!-- Nav Item - Usuarios Collapse Menu -->
					<li class="nav-item">
						<a class="nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUtilities">
							<i class="fas fa-user"></i>
							<span>Usuarios</span>
						</a>
						<div id="collapseUsuarios" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
							<div class="bg-warning py-2 collapse-inner rounded">
								<a class="collapse-item" href="registro_usuario.php">Nuevo Usuario</a>
								<a class="collapse-item" href="lista_usuarios.php">Usuarios</a>
							</div>
						</div>
					</li>
				<?php } ?>
				<!-- Información de la Empresa -->
				<li class="nav-item">
					<a class="nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#collapseEmpresa" aria-expanded="true" aria-controls="collapseEmpresa">
						<i class="fas fa-fw fa-cog"></i>
						<span>Empresa</span>
					</a>
					<div id="collapseEmpresa" class="collapse" aria-labelledby="headingEmpresa" data-parent="#accordionSidebar">
						<div class="bg-warning py-2 collapse-inner rounded">
							<!-- <a class="collapse-item" href="nueva_venta.php">Nueva venta</a> -->
							<a class="collapse-item" href="informacion.php">Datos</a>
						</div>
					</div>
				</li>

								<!-- Información del inventario -->
								<li class="nav-item">
					<a class="nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#collapseInventario" aria-expanded="true" aria-controls="collapseInventario">
						<i class="fas fa-fw fa-cog"></i>
						<span>Inventario</span>
					</a>
					<div id="collapseInventario" class="collapse" aria-labelledby="headingInventario" data-parent="#accordionSidebar">
						<div class="bg-warning py-2 collapse-inner rounded">
							<!-- <a class="collapse-item" href="nueva_venta.php">Nueva venta</a> -->
							<a class="collapse-item" href="lista_inventario.php">Invent</a>
						</div>
					</div>
				</li>

			</ul>


	</body>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

	<script>
    $(document).ready(function () {
        // Evento click del botón para alternar el sidebar
        $('#toggleSidebar').click(function () {
            $('#accordionSidebar').toggleClass('toggled');
        });
    });
	</script>
</html>