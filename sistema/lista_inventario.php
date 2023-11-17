<?php include_once "includes/header.php"; ?>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

<body id="page-top">
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">INVENTARIO</h1>
    <div class="ml-auto">
        <button id="export-btn" class="btn btn-outline-warning  bg-dark" type="button">Exportar a Excel</button>
        <!-- Agrega un elemento de descarga para el archivo Excel -->
        <a id="download-link" style="display: none"></a>
        <a href="registro_inventario.php" class="btn btn-outline-warning  bg-dark">Nuevo</a>
    </div>
</div>

	<div class="row">
		<div class="col-lg-12">

			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr class="text-warning text-center">
							<th class="text-warning">ID</th>
							<th class="text-warning">AÑO_2022</th>
							<th class="text-warning">AÑO_2020</th>
							<th class="text-warning">AÑO_2019</th>
							<th class="text-warning">CODIGO</th>
							<th class="text-warning">DENOMINACIÓN</th>
							<th class="text-warning">MARCA</th>
							<th class="text-warning">MODELO</th>
							<th class="text-warning">SERIE/DIMESIONES</th>
							<th class="text-warning">COLOR</th>
							<th class="text-warning">EST</th>
							<th class="text-warning">LOCAL</th>
							<th class="text-warning">ZONA</th>
							<th class="text-warning">PISO</th>
							<th class="text-warning">AMBIENTE</th>
							<th class="text-warning">USUARIO</th>
							<th class="text-warning">DNI</th>
							<th class="text-warning">OBSERVACIÓN</th>
							<th class="text-warning">FECHA_INVENTARIO</th>
							<th class=" text-warning no-export">ACCIONES</th>							
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM inventario");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr class="bg-dark text-white text-center" >
									<td><?php echo $data['idinv']; ?></td>
									<td><?php echo $data['anio1']; ?></td>
									<td><?php echo $data['anio2']; ?></td>
									<td><?php echo $data['anio3']; ?></td>
									<td><?php echo $data['codigoinve']; ?></td>
									<td><?php echo $data['deno']; ?></td>
									<td><?php echo $data['marca']; ?></td>
									<td><?php echo $data['mode']; ?></td>
									<td><?php echo $data['serie']; ?></td>
									<td><?php echo $data['colo']; ?></td>
									<td><?php echo $data['esta']; ?></td>
									<td><?php echo $data['loca']; ?></td>
									<td><?php echo $data['zo']; ?></td>
									<td><?php echo $data['pi']; ?></td>
									<td><?php echo $data['ambi']; ?></td>
									<td><?php echo $data['usu']; ?></td>
									<td><?php echo $data['dni']; ?></td>
									<td><?php echo $data['obs']; ?></td>
									<td><?php echo $data['fecha']; ?></td>
																		
									<td class="no-export">
										<a href="editar_inventario.php?id=<?php echo $data['idinv']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>
										<!-- <form action="eliminar_cliente.php?id=<?php echo $data['idcliente']; ?>" method="post" class="confirmar d-inline"> -->
											<button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
										</form>
									</td>
									<?php } ?>
								</tr>
						<?php }
						?>
					</tbody>

				</table>
			</div>

		</div>
	</div>
	<script>
		function exportTableToExcel() {
		const table = document.getElementById('table');

		// Crear una matriz para almacenar los datos de la tabla
		const data = [];

		// Obtener todas las filas de la tabla
		const rows = table.querySelectorAll('tr');

		rows.forEach((row) => {
			const rowData = [];
			const cells = row.querySelectorAll('th:not(.no-export), td:not(.no-export)');
			
			// Agregar la condición para excluir la columna "ACCIONES"
			if (cells.length > 0) {
				cells.forEach((cell) => {
					rowData.push(cell.innerText);
				});
				data.push(rowData);
			}
		});

		// Crear una hoja de cálculo de Excel
		const workbook = XLSX.utils.book_new();
		const worksheet = XLSX.utils.aoa_to_sheet(data);
		XLSX.utils.book_append_sheet(workbook, worksheet, 'Tabla');

		const excelBuffer = XLSX.write(workbook, {
			bookType: 'xlsx',
			type: 'array'
		});

		const blob = new Blob([excelBuffer], {
			type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
		});

		const downloadLink = document.getElementById('download-link');
		downloadLink.href = URL.createObjectURL(blob);
		downloadLink.download = 'reporte_inventario.xlsx';

		downloadLink.click();
	}

	const exportButton = document.getElementById('export-btn');
	exportButton.addEventListener('click', exportTableToExcel);

	</script>
</body>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>