<br>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ventas al Publico </h3>
                <div class="card-options">

                    <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp

                    <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=socioAdd"><i class="fa fa-user-circle-o" data-toggle="tooltip" title="Agregar Nuevo Socio" data-original-title="fa fa-user-plus"></i></a>&nbsp

                    <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=abonos"><i class="fa fa-pencil" data-toggle="tooltip" title="Abonar" data-original-title="fa fa-user-plus"></i></a>&nbsp

                    <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=venta"><i class="fa fa-dollar" style="color:white" title="Nueva Venta" data-toggle="tooltip"></i></a>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-9 col-md-9 col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Productos:</label>
                            <select name="selectProductos" id="selectProductos" class="form-control" onchange="agregarProducto(event)">
                                <option value="">Seleccionar productos</option>
                                <?php
                                $controllerProductos = new productos();
                                $controllerProductos->ctrSelectProductos();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <div class="form-group">
                            <label for="form-label">Lista de productos:</label>
                            <div class="listaProductos" id="listaProductos">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Precio Total 
                        <div class="col-sm-12 col-md-12 col-lg-3" style="display: flex; justify-content: end">
                            <p id="total" style="font-size: 1.5rem; font-weight: 900">Total: $0</p>
                        </div> -->

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <!-- <label class="form-label">Cliente:</label>
                            <select name="selectCliente" id="selectCliente" class="form-control">
                                <option value="">Seleccionar cliente</option>
                                <?php
                                // $controllerSocios = new socios();
                                // $controllerSocios -> ctrSelectSocios();
                                ?>
                            </select> -->
                            <br>
                            <!-- <button class="btn btn-secondary" type="button" id="toggleButton">Agregar cliente</button> -->
                            <br>
                            <br>
                            <div id="containerAgregar" class="row containerAgregar">
                                <div class="col">
                                    <h4>Agregar cliente</h4>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Nombres:</label>
                                                <input type="text" name="nombresCliente" id="nombresCliente" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Apellidos:</label>
                                                <input type="text" name="apellidosCliente" id="apellidosCliente" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Teléfono:</label>
                                                <input type="text" name="telefonoCliente" id="telefonoCliente" class="form-control" maxlength="10" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Contacto:</label>
                                                <input type="email" name="correoCliente" id="correoCliente" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Fecha de nacimiento:</label>
                                                <input type="date" name="fechaCliente" id="fechaCliente" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Tipo de socio:</label>

                                                <select name="tipoCliente" id="tipoCliente" class="form-control">
                                                    <?php
                                                    $controllerSocios = new socios();
                                                    $controllerSocios->ctrSelectPrecios();
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-3">
        <div class="card overflow-hidden">
            <div class="card-body ">
                <form method="POST">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Cliente</label>
                            <select class="form-control mb-5" name="selectCliente" id="selectCliente" required>
                                <option value="">Seleccionar cliente</option>
                                <?php
                                $controllerSocios = new socios();
                                $controllerSocios->ctrSelectSocios();
                                ?>
                            </select>
                            <!-- <label class="form-label">Descuento General (%)</label>
                                <input type="text" class="form-control mb-5" name="descuento" id="descuento" value="0" onchange = "calculaDescuento(this.value)"> -->

                            <label class="form-label">Pago con :</label>
                            <select class="form-control mb-5" name="tipoPago" id="idCliente">
                                <option value="E">Efectivo</option>
                                <option value="T">Tarjeta Credito/Debito</option>
                                <option value="O">Otro</option>
                            </select>

                            <!-- Informacion a grabar de la venta -->

                            <!-- <input type="text" class="form-control" name="pedidoNum" id="pedidoNum" value="<?php //echo $siguiente; 
                                                                                                                ?>">
                                <input type="text" class="form-control" name="concepto" id="concepto" value="venta">
                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="fechaMovimiento" id="fechaMovimiento">
                                <input type="text" class="form-control" name="pedidoBD" id="pedidoBD">
                                <input type="text" class="form-control" name="totalPedidoBD" id="totalPedidoBD">
                                <input type="text" class="form-control" name="valorDescuento" id="valorDescuento">
                                <input type="text" class="form-control" name="pedidoNeto" id="pedidoNeto"> -->
                            <input type="text" id="totalVenta" name="totalVenta" hidden>
                            <input type="text" id="lista" name="lista" hidden>

                            <label class="form-label">Cantidad que paga :</label>
                            <input type="text" type="text" class="form-control" id="totalInput" name="totalInput">

                        </div>
                    </div>
                    <div class="card-options">
                        <h3 id="total">$</h3>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-blue col-12" id="btnCobrar" name="regPedido">Cobrar</button>
                            </div>
                        </div>
                    </div>
                    <?php
                    $controllerVentas = new VentasController();
                    $controllerVentas->ctrAgregarVenta();
                    ?>

                </form>
            </div>
        </div>
    </div>
</div>






<!-- <div class="row">
    <form class="card" method="POST">
        <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9">        
            <div class="card-header">
                <h3 class="card-title">Ventas</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Productos:</label>
                            <select name="selectProductos" id="selectProductos" class="form-control" onchange="agregarProducto(event)">
                                <option value="">Seleccionar productos</option>
                                <?php
                                //$controllerProductos = new productos();
                                //$controllerProductos->ctrSelectProductos();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="form-label">Lista de productos:</label>
                            <div class="listaProductos" id="listaProductos">
                                
                            </div>
                        </div>
                    </div>
                </div>
                    Precio Total 
                    <div class="col-sm-12 col-md-12 col-lg-3" style="display: flex; justify-content: end">
                        <p id="total" style="font-size: 1.5rem; font-weight: 900">Total: $0</p>
                    </div> 

            </div>

            
            <div class="card-footer text-right">
                <button type="submit" id="login" class="btn btn-primary">Registrar</button>
            </div>
            
        
        </div>
        

        </form>

</div> -->

<script>
    const listaProductos = [];
    let total = 0;
    const cajaDescuento = document.querySelector('#descuento');
    const cajaValorDescuento = document.querySelector('#valorDescuento');
    const cajaTotalNeto = document.querySelector('#totalInput');
    const cajaTotalVenta = document.querySelector('#totalVenta');

    function agregarProducto(event) {
        if (event.target.value) {
            const idProducto = event.target.value;

            let yaAgregado = false;

            for (let i = 0; i < listaProductos.length; i++) {
                if (idProducto === listaProductos[i].idProducto) {
                    yaAgregado = true;
                }
            }

            if (!yaAgregado) {
                const index = event.target.selectedIndex;
                const texto = event.target[index].innerText;


                const precio = Number.parseInt(event.target[index].getAttribute('precio'));

                listaProductos.push({
                    idProducto: idProducto,
                    nombreProducto: texto,
                    cantidad: 1,
                    precio: precio
                });

                document.getElementById('lista').value = JSON.stringify(listaProductos);
            }
            event.target.value = "";
            dibujarLista();
            calcularTotal();
        }
    }

    function dibujarLista() {
        const divLista = document.getElementById('listaProductos');
        divLista.innerHTML = '';
        let html = '';
        for (let i = 0; i < listaProductos.length; i++) {
            const producto = listaProductos[i];

            html +=
                `<div class="producto">
                ${producto.nombreProducto}
                <input class="form-control" placeholder="Cantidad" value="${producto.cantidad}" onkeyup="cambiarCantidad(event, ${i})" onchange="cambiarCantidad(event, ${i})" min="1" type="number">
                <button type="button" onclick="removerProducto(${i})"><i class="fa fa-trash"></i></button>
            </div>`;
        }

        divLista.innerHTML = html;
    }

    function cambiarCantidad(event, index) {
        if (event.target.value < 1) {
            event.target.value = 1;
        }

        listaProductos[index].cantidad = event.target.value;
        console.log(listaProductos);
        document.getElementById('lista').value = JSON.stringify(listaProductos);
        document.getElementById('listaProductos').value = JSON.stringify(listaProductos);
        calcularTotal();

    }

    function removerProducto(index) {
        listaProductos.splice(index, 1);
        dibujarLista();
        document.getElementById('lista').value = JSON.stringify(listaProductos);
        document.getElementById('listaProductos').value = JSON.stringify(listaProductos);
        calcularTotal();
    }

    document.getElementById('toggleButton').addEventListener('click', toggleAgregarCliente);

    let isVisible = false;

    function toggleAgregarCliente() {
        clearForm();
        isVisible = !isVisible;

        const container = document.getElementById('containerAgregar');

        if (isVisible) {
            this.innerText = 'Cancelar';
            container.style.maxHeight = `${container.scrollHeight}px`;
        } else {
            this.innerText = 'Agregar cliente';
            container.style.maxHeight = null;
        }

        function clearForm() {
            document.getElementById('nombresCliente').value = '';
            document.getElementById('apellidosCliente').value = '';
            document.getElementById('telefonoCliente').value = '';
            document.getElementById('correoCliente').value = '';
            document.getElementById('fechaCliente').value = '';
            document.getElementById('tipoCliente').value = '1';
        }
    }



    function calcularTotal() {
        total = 0;
        for (let i = 0; i < listaProductos.length; i++) {
            total += listaProductos[i].precio * listaProductos[i].cantidad;
        }

        document.getElementById('total').innerText = `Total: $${total}`;
        document.getElementById('totalInput').value = total;
        cajaTotalVenta.value = total;
    }

    function calculaDescuento(descuento) {
        if (descuento >= 0 && descuento < 100) {
            let valorDescuento = totalPedido * parseInt(descuento) / 100;
            let totalNeto = totalPedido - valorDescuento;

            cajaTotalNeto.value = totalNeto;
            cajaTotalVenta.value = totalNeto;
            cajaValorDescuento.value = valorDescuento;
            totalLabel.innerHTML = `$ ${totalNeto}`;
            totalPedidoBD.value = totalPedido;
        } else {
            cajaDescuento.value = 0;
        }
    }
</script>