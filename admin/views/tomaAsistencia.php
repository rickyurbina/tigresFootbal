<?php
if (isset($_GET["grupo"]))
    $grupo = $_GET["grupo"];
else
    $grupo = "";
?>

<div class="page-header">
    <h3 class="page-title">Asistencia</h3>
    <div class="card-options">

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=socioAdd"><i class="fa fa-user-circle-o" data-toggle="tooltip" title="Agregar Nuevo Socio" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=abonos"><i class="fa fa-pencil" data-toggle="tooltip" title="Abonar" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=venta"><i class="fa fa-dollar" style="color:white" title="Nueva Venta" data-toggle="tooltip"></i></a>

    </div>
</div>
<br>
<div class="col-md-3">
    <select class="form-control custom-select select2" name="grupos" onchange=recarga(this.value)>
        <option value="">Selecciona...</option>
        <?php
        $controllerSocios = new socios();
        $controllerSocios->ctrSelectGrupos();
        ?>
    </select>
</div>
<br>


<?php


if (empty($grupo) || $grupo == "") {

    echo '<h3 align="center"> Seleccione un grupo</h3>';
}
else {

    ?>
<div class="col-md-12">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Pase de Lista</div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="hover table-bordered border-top-0 border-bottom-0" style="text-align: center;">
                        <thead>
                            <td>Opciones</td>
                            <td>Nombre</td>
                            <td>Membresía</td>
                            <td>Teléfono</td>
                            <td>Grupo</td>
                        </thead>
                        <tbody>
                            <?php

                                $lista = new socios();
                                 $lista->ctrListaAsistencia($grupo);
                            
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Opciones</td>
                                <td>Nombre</td>
                                <td>Membresía</td>
                                <td>Teléfono</td>
                                <td>Grupo</td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php 
}
?>


<script>
    function recarga(value) {
        console.log(value);
        window.location.href = "index.php?page=tomaAsistencia&grupo=" + value;
    }
</script>