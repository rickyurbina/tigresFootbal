<div class="page-header">
	<h4 class="page-title">Lista de Usuarios</h4>
    <div class="card-options">

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=socioAdd"><i class="fa fa-user-circle-o" data-toggle="tooltip" title="Agregar Nuevo Socio" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=abonos"><i class="fa fa-pencil" data-toggle="tooltip" title="Abonar" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=venta"><i class="fa fa-dollar" style="color:white" title="Nueva Venta" data-toggle="tooltip"></i></a>

    </div>
</div>
	

<div class="col-md-12">
	<div class="card">
		<div class="table-responsive">
			<table class="table card-table table-bordered table-hover table-vcenter mb-0 text-nowrap">
				<tbody style="text-align: center;">
					<tr>
						<th class="w-1">Nombre</th>
						<th>Rol</th>
						<th>Email</th>
						<th>Status</th>
						<th>Último Login</th>
						<th>Registro</th>
						<th>Opciones</th>
					</tr>

					<?php
						 $lista = new usuarios();
						 $lista -> ctrListaUsuarios();
						 $lista -> ctrBorrarUsuario();
					?>

					<tr style="text-align: center;">
						<th class="w-1">Nombre</th>
						<th>Rol</th>
						<th>Email</th>
						<th>Status</th>
						<th>Último Login</th>
						<th>Registro</th>
						<th>Opciones</th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>