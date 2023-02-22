<?php

    $usuario = $_GET["idEditar"];
    $busca = mdlSocios::mdlBusca($usuario, "socios");

?>

<div class="page-header">
    <h4 class="page-title">Actualizar Informacion de Socios</h4>
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
                            <label class="form-label">Nombres</label>
                            <input type="text" class="form-control" name="nombres" placeholder="Juan" value="<?php echo $busca['nombres']; ?>" >
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
                            <input type="text" class="form-control" name="telefono" placeholder="6141234455" maxlength="10" value="<?php echo $busca['telefono']; ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Contacto</label>
                            <input type="text" class="form-control" name="contacto" placeholder="Persona a contactar" value="<?php echo $busca['contacto']; ?>">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <br>
                            <label class="form-label">Grupo</label>
                            <select class="form-control custom-select select2" name="nombreG">
                                <?php
                                $controllerGrupo = new socios();
                                $controllerGrupo->ctrSelectGrupos();
                                ?>
                            </select>
                        </div>
                    </div>

                    <?php
                    $fechaN=$busca['fechaNacimiento'];
                    $fecha = strtotime($fechaN);
                    ?>

                    <div class="col-sm-12 col-md-6">
                        <div class="form-group m-0">
                            <label class="form-label" style="margin-left:1px">Fecha de Nacimiento</label>
                            <div class="row gutters-xs">
                                <div class="col-md-4 col-sm-12">
                                <label class="form-label">Día</label>
                                    <select name="dateDia" class="form-control">

                                        <option value="<?php echo date("d", $fecha); ?>"><?php echo date("d", $fecha); ?></option>
                                        <?php
                                        for ($x = 1; $x <= 31; $x++) {
                                            echo '<option value="' .  $x . '">' .  $x . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                <label class="form-label">Mes</label>
                                    <select name="dateMes" class="form-control">
                                        <option value="<?php echo date("m", $fecha); ?>"><?php echo date("m", $fecha); ?></option>
                                        <?php
                                        for ($x = 1; $x <= 12; $x++) {
                                            echo '<option value="' .  $x . '">' .  $x . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                <label class="form-label">Año</label>
                                    <select name="dateAnio" class="form-control">
                                        <option value="<?php echo date("Y", $fecha); ?>"><?php echo date("Y", $fecha); ?></option>
                                        <?php
                                        $a = date("Y");
                                        for ($x = 0; $x <= 100; $x++) {
                                            echo '<option value="' . $a - $x . '">' . $a - $x . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Tipo Cliente</label>
                            <select class="form-control custom-select select2" name="tipoSocio" >
                                <?php
                                    $controllerSocios = new socios();
                                    $controllerSocios -> ctrSelectedPrecios($busca['tipoSocio']);
                                ?>                                
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer text-right">
                <input type="text" name="socioId" class="form-control" value="<?php echo $usuario; ?>" hidden />
                <button name="btnCancel" class="btn btn-warning">Cancelar</button>
                <button type="submit" name="btnActualiza" id="login" class="btn btn-primary">Actualizar</button>
            </div>
            <?php
                $registro = new socios();
                $registro -> ctrActualiza();
            ?>
        </form>
    </div>

</div>