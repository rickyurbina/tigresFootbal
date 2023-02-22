<div class="page-header">
    <h4 class="page-title">Registro de Productos</h4>
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
            <div class="card-body col-lg-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Características</h3>
                        </div>
                        <div class=" card-body">
                            <div class="row">
                                <div class="col-sm-5 col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del Producto" >
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Marca</label>
                                        <input type="text" class="form-control" name="marca" placeholder="Marca" >
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Contenido</label>
                                        <input type="text" class="form-control" name="contenido" placeholder="Contenido" >
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Costo</label>
                                        <input type="number" class="form-control" name="costo" placeholder="Sin signos  $ , ' " >
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Precio al Púplico</label>
                                        <input type="number" class="form-control" name="precioPublico" placeholder="Sin signos  $ , ' " >
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">stock</label>
                                        <input class="form-control" type="number" name="stock">
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-sm-12"><p></p></div>
                                <div class="col-lg-6 col-sm-12">
                                <label class="form-label">Imagen</label>
                                    <input type="file" class="dropify" name="imagen" data-height="180" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" name="registrar" id="login" class="btn btn-primary">Registrar</button>
            </div>
            <?php
                $registro = new productos();
                $registro -> ctrRegistra();
            ?>
        </form>
        
    </div>

</div>