<?php

$usuario = $_GET["idEditar"];
$busca = mdlClientes::mdlBusca($usuario, "clientes");

?>

<div class="page-header">
    <h4 class="page-title">Actualizar Informacion de Cliente</h4>
    <div class="card-options" style="margin-right: 100px;">

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=socioAdd"><i class="fa fa-user-circle-o" data-toggle="tooltip" title="Agregar Nuevo Socio" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=abonos"><i class="fa fa-pencil" data-toggle="tooltip" title="Abonar" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=venta"><i class="fa fa-dollar" style="color:white" title="Nueva Venta" data-toggle="tooltip"></i></a>

    </div>
</div>
<div class="row ">
    <div class="col-lg-8">
        <form class="card" method="POST">
            <div class="card-header">
                <h3 class="card-title">Información Personal</h3>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                            <label class="form-label">Nombres</label>
                            <input type="text" class="form-control" name="nombres" placeholder="Juan" value="<?php echo $busca['nombres']; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" placeholder="Perez García" value="<?php echo $busca['apellidos']; ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-5">
                        <div class="form-group">
                            <label class="form-label">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" placeholder="6141234455" value="<?php echo $busca['telefono']; ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $busca['email']; ?>">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label">Fecha Nacimiento</label>
                            <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="fechaNacimiento" value="<?php echo $busca['fechaNacimiento']; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Tipo Cliente</label>
                            <select class="form-control custom-select select2" name="tipoCliente">
                                <option <?php if ($busca['tipoCliente'] == "1") echo "selected"; ?> value="1">Socio</option>
                                <option <?php if ($busca['tipoCliente'] == "2") echo "selected"; ?> value="2">Estudiante</option>
                                <option <?php if ($busca['tipoCliente'] == "3") echo "selected"; ?> value="3">Referido</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer text-right">
                <input type="text" name="clientId" class="form-control" value="<?php echo $usuario; ?>" hidden />
                <a href="index.php?page=userList"><button name="btnCancel" class="btn btn-warning">Cancelar</button></a>
                <button type="submit" name="btnActualiza" id="login" class="btn btn-primary">Actualizar</button>
            </div>
            <?php
            $registro = new clientes();
            $registro->ctrActualiza();
            ?>
        </form>
    </div>

</div>