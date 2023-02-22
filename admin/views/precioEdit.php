<?php

    $usuario = $_GET["idEditar"];
    $busca = mdlSocios::mdlBuscaPrecioEditar($usuario);

?>

<div class="page-header">
    <h4 class="page-title">Actualizar Informacion de Costos</h4>
    <div class="card-options">

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=socioAdd"><i class="fa fa-user-circle-o" data-toggle="tooltip" title="Agregar Nuevo Socio" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=abonos"><i class="fa fa-pencil" data-toggle="tooltip" title="Abonar" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=venta"><i class="fa fa-dollar" style="color:white" title="Nueva Venta" data-toggle="tooltip"></i></a>

    </div>
</div>
<div class="row ">
    <div class="col-lg-8">
        <form class="card" method="POST">
            <div class="card-body">
                <div class="row">
                <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                            <label class="form-label">Categoria</label>
                            <input type="text" class="form-control" name="categoria" placeholder="Juan" value="<?php echo $busca['categoria']; ?>" >
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Costo Mensual</label>
                            <input type="text" class="form-control" name="costo" placeholder="No use signos  $ , ." value="<?php echo $busca['costo']; ?>">
                            <input type="text" class="form-control" name="id" value="<?php echo $busca['id']; ?>" hidden>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer text-right">
                <button name="btnCancel" id="login" class="btn btn-warning">Cancelar</button>
                <button type="submit" name="btnActualiza" id="login" class="btn btn-primary">Actualizar</button>
            </div>
            <?php
                $registro = new socios();
                $registro -> ctrActualizaPrecio();
            ?>
        </form>
    </div>

</div>