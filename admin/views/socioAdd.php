<div class="page-header">
    <h4 class="page-title">Registro de Jugadores</h4>
    <div class="card-options">

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=socioAdd"><i class="fa fa-user-circle-o" data-toggle="tooltip" title="Agregar Nuevo Socio" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=abonos"><i class="fa fa-pencil" data-toggle="tooltip" title="Abonar" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=venta"><i class="fa fa-dollar" style="color:white" title="Nueva Venta" data-toggle="tooltip"></i></a>

    </div>
</div>
<div class="row ">
    <div class="col-lg-10">
        <form enctype="multipart/form-data" class="card" method="POST">
            <div class="card-header">
                <h3 class="card-title">Información Personal</h3>

            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                            <label class="form-label">Nombres</label>
                            <input type="text" class="form-control" name="nombres" placeholder="Juan" required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" placeholder="Perez García" required>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-5">
                        <div class="form-group">
                            <label class="form-label">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" maxlength="10" placeholder="6141234455" required>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Contacto</label>
                            <input type="text" class="form-control" name="contacto" placeholder="Persona a quien contactar" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Categoría</label>
                            <select class="form-control custom-select select2" name="nombreG">
                                <?php
                                $controllerGrupo = new socios();
                                $controllerGrupo->ctrSelectGrupos();
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <div class="form-group m-0">
                            <label class="form-label" style="margin-left:1px">Fecha de Nacimiento</label>
                            <div class="row gutters-xs">
                                <div class="col-md-4 col-sm-12">
                                    <select name="dateDia" class="form-control">
                                        <option value="">Día</option>
                                        <?php
                                        for ($x = 1; $x <= 31; $x++) {
                                            echo '<option value="' .  $x . '">' .  $x . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <select name="dateMes" class="form-control">
                                        <option value="">Mes</option>
                                        <?php
                                        for ($x = 1; $x <= 12; $x++) {
                                            echo '<option value="' .  $x . '">' .  $x . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <select name="dateAnio" class="form-control">
                                        <option value="">Año</option>
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
                            <label class="form-label">Posición de Juego</label>
                            <select class="form-control custom-select select2" name="tipoSocio">
                                <optgroup label="Ofensiva"> 
                                    <option value="Centro">Centro</option>
                                    <option value="Guardia ofensivo">Guardia ofensivo</option>
                                    <option value="Tacle ofensivo">Tacle ofensivo</option>
                                    <option value="Ala cerrada">Ala cerrada</option>
                                    <option value="Ala abierta">Ala abierta</option>
                                    <option value="Corredor de poder">Corredor de poder</option>
                                    <option value="Corredor">Corredor</option>
                                    <option value="Corredor profundo">Corredor profundo</option>
                                    <option value="Corredor medio">Corredor medio</option>
                                    <option value="Mariscal de campo">Mariscal de campo</option>
                                </optgroup>
                                <optgroup label="Defensiva"> 
                                    <option value="Ala defensivo">Ala defensivo</option>
                                    <option value="Tacle defensivo">Tacle defensivo</option>
                                    <option value="Guardia nariz">Guardia nariz</option>
                                    <option value="Apoyador - Linebacker">Apoyador - Linebacker</option>
                                    <option value="Esquinero">Esquinero</option>
                                    <option value="Profundo - Safety">Profundo - Safety</option>
                                    <option value="Back defensivo">Back defensivo</option>

                            </select>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h3>Documentación</h3>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <label for="image1">Foto</label>
                        <input type="file" class="dropify" name="image1" data-max-file-size="3M"
                        data-allowed-file-extensions="jpg png jpeg pdf">
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <label for="image1">CURP</label>
                        <input type="file" class="dropify" name="image2" data-max-file-size="3M"
                        data-allowed-file-extensions="jpg png jpeg pdf">
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <label for="image1">Acta</label>
                        <input type="file" class="dropify" name="image3" data-max-file-size="3M"
                        data-allowed-file-extensions="jpg png jpeg pdf">
                    </div> 
                    <div class="col-lg-3 col-sm-12">
                        <label for="image1">Identificación con Foto</label>
                            <input type="file" class="dropify" name="image4" data-max-file-size="3M"
                            data-allowed-file-extensions="jpg png jpeg pdf">
                    </div> 
                </div>

            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
            <?php
            $registro = new socios();
            $registro->ctrRegistra();
            ?>
        </form>
    </div>

</div>
