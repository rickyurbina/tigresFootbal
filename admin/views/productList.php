<div class="page-header">
	<h4 class="page-title">Lista de Productos</h4>
    <div class="card-options">

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=socioAdd"><i class="fa fa-user-circle-o" data-toggle="tooltip" title="Agregar Nuevo Socio" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=abonos"><i class="fa fa-pencil" data-toggle="tooltip" title="Abonar" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=venta"><i class="fa fa-dollar" style="color:white" title="Nueva Venta" data-toggle="tooltip"></i></a>

    </div>
</div>

<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="hover table-bordered border-top-0 border-bottom-0" style="text-align: center;">
					<thead>
						<th>Nombre</th>
						<th>Marca</th>
						<th>Contenido</th>
						<th>Precio Publico</th>
						<th>Stock</th>
						<th>Opciones</th>
					</thead>
					<tbody>
						<?php
							$lista = new productos();
							$lista -> ctrListaProductos();
							$lista -> ctrBorrarProducto();
						?>
						
					</tbody>
					<tfoot>
						<tr>
							<th>Nombre</th>
							<th>Marca</th>
							<th>Contenido</th>
							<th>Precio Público</th>
							<th>Stock</th>
							<th>Opciones</th>
						</tr>
					</tfoot>
				</table>

			</div>
		</div>
	</div>
</div>