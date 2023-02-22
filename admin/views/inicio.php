<div class="page-header">
    <h4 class="page-title">Inicio</h4>
     <div class="card-options" style="margin-right: 100px;">
	<p>.</p>
		<!--<a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp

		<a class="btn btn-cyan btn-lg mb-1" href="index.php?page=socioAdd"><i class="fa fa-user-circle-o" data-toggle="tooltip" title="Agregar Nuevo Socio" data-original-title="fa fa-user-plus"></i></a>&nbsp

		<a class="btn btn-cyan btn-lg mb-1" href="index.php?page=abonos"><i class="fa fa-pencil" data-toggle="tooltip" title="Abonar" data-original-title="fa fa-user-plus"></i></a>&nbsp

		<a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=venta"><i class="fa fa-dollar" style="color:white" title="Nueva Venta" data-toggle="tooltip"></i></a>-->

	</div> 
</div>
<div class="row">
	<?php 
		$mensualidades = new socios();
		$mensualidades -> ctrRepoMensualidades();
		$ventas = new VentasController();
		$ventas->ctrRepoVentasProductos();
	?>
</div>

<div class="row">
	<div class="col-md-12 col-lg-12">
		<div class="card">
		<div class="card-header">
				<div class="card-title">Jugadores Registrados</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="hover table-bordered border-top-0 border-bottom-0" style="text-align: center;">
						<thead>
							<td>Nombre</td>
							<td>Posición</td>
							<td>Teléfono</td>
							<td>Categoría</td>
							<td>Fecha Nacimiento</td>
							<td>Opciones</td>
						</thead>
						<tbody>
							<?php
								$lista = new socios();
								$lista -> ctrListaSocios();
								$lista -> ctrBorrarSocio();
							?>
							
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div class="row">
	<div class="col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Reporte de Pagos</div>
				<div class="card-options"> <a class="btn btn-vk" href="index.php?page=tomaAsistencia">Asistencia</a></div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="hover table-bordered border-top-0 border-bottom-0" style="text-align: center;">
						<thead>
							<td>Pagar</td>	
							<td>Nombre</td>
							<td>Dias</td>
							<td>Contacto</td>
							<td>Grupo</td>
							<td>Teléfono</td>
						</thead>
						<tbody>
							<?php
								// $lista = new socios();
								// $lista -> ctrListaSociosInicio();
								// $lista -> ctrBorrarSocio();
							?>
							
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div> -->


<div class="row">
	<div class="col-xl-8 col-lg-12 col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Reporte Anual de Ingresos</h3>
			</div>
			<div class="card-body">
				<div class="chart-wrapper">
					<canvas id="sales-status" class="chart-dropshadow h-280"></canvas>
				</div>
			</div>
		</div>
	</div>

	<?php 
		$mensualidades = new socios();
		$mensualidades -> ctrCumpleanios();
	?>
	

</div>


