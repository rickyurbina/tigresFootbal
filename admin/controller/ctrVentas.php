<?php

class VentasController {


  public static function ctrRepoVentasProductos()
    {
        $ventas = VentasModel::mdlRepoVentaProductos();

        # ----------------------------------------------
        # Funcion para redondear el porcentaje de 5 en 5 
        # ----------------------------------------------

        // $pagados = $mensualidades["socios"];
        // $totalSocios = $mensualidades["totalSocios"];

        // $porcentajeSocios = ($pagados / $totalSocios) * 100;
        
        // $compara = $porcentajeSocios % 5;

        // while ($compara != 0) {
        //     $pagados++;
        //     $porcentajeSocios = ($pagados / $totalSocios) * 100;
        //     $compara = $porcentajeSocios % 5;
        // }
        

        echo '
            <div class="col-sm-12 col-lg-6 col-xl-3">
              <div class="card">
                <div class="card-body iconfont text-center">
                  <h5 class="text-muted">'.$ventas["pagos"].' Cobros de Productos</h5>
                  <h1 class="mb-2 text-secondary ">$'.number_format($ventas["cobrado"],2).'</h1>
                  <p><span class="text-red"><i class="fa fa-exclamation-circle text-red"></i> $ '.number_format($ventas["adeudo"],2).'</span> de adeudos</p>
                </div>
              </div>
            </div>';

    }

  public function ctrAgregarVenta() {
    if (isset($_POST['lista'])) {
      // print_r($_POST);

      if (!$_POST['lista']) {
        echo 
        '<script>  
          Swal.fire({
              title: "Error al registrar la venta",
              text: "Seleccione al menos un producto para vender",
              icon: "error",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Aceptar"
            });
          </script>';
        return;
      }

      if ($_POST['selectCliente']) {
        $pago = $_POST['totalInput'];
        $totalVenta = $_POST['totalVenta'];
        $debe = $totalVenta - $pago;

        $datosController = array(
          "idCliente" => $_POST['selectCliente'],
          "productos" => $_POST['lista'],
          "pago" => $pago,
          "totalVenta" => $totalVenta,
          "debe" => $debe
        );

        $respuesta = VentasModel::mdlAgregarVenta($datosController);

        if ($respuesta === 'success') {
          echo '<script>  
          Swal.fire({
              title: "Venta registrada",
              text: "Venta registrada exitosamente",
              icon: "success",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Aceptar"
            });
          </script>';
        } else {
          echo '<script>  
          Swal.fire({
              title: "Error al registrar la venta",
              text: "Inténtelo de nuevo más tarde",
              icon: "error",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Aceptar"
            });
          </script>';
        }

      } else if ($this -> ctrValidarCliente($_POST)) {
        $idCliente = $this -> ctrRegistrarCliente($_POST);
        if ($idCliente !== -1) {
          $datosController = array(
            "idCliente" => $idCliente,
            "productos" => $_POST['lista'],
            "total" => $_POST['totalInput']
          );
         $respuesta = VentasModel::mdlAgregarVenta($datosController);
          
         if ($respuesta === 'success') {
          echo '<script>  
          Swal.fire({
              title: "Venta registrada",
              text: "Venta registrada exitosamente",
              icon: "success",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Aceptar"
            });
          </script>';
        } else {
          echo '<script>  
          Swal.fire({
              title: "Error al registrar la venta",
              text: "Inténtelo de nuevo más tarde",
              icon: "error",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Aceptar"
            });
          </script>';
        }
        }
      } else {
        echo 
        '<script>  
          Swal.fire({
              title: "Error al registrar la venta",
              text: "Seleccione un cliente o registre uno",
              icon: "error",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Aceptar"
            });
          </script>';
      }
    }
  }

  private function ctrValidarCliente($campos) {
    $camposValidos = 0;

    if ($campos['nombresCliente']) {
      $camposValidos++;
    }

    if ($campos['apellidosCliente']) {
      $camposValidos++;
    }

    if ($campos['telefonoCliente']) {
      $camposValidos++;
    }

    if ($campos['correoCliente']) {
      $camposValidos++;
    }

    if ($campos['fechaCliente']) {
      $camposValidos++;
    }

    return $camposValidos === 5;
  }

  private function ctrRegistrarCliente($datos) {
    $datosCliente = array(
      "nombres" => $datos['nombresCliente'],
      "apellidos" => $datos['apellidosCliente'],
      "telefono" => $datos['telefonoCliente'],
      "email" => $datos['correoCliente'],
      "fechaNacimiento" => $datos['fechaCliente'],
      "tipoSocio" => $datos['tipoCliente'],
      "fechaRegistro" => date('Y-m-d')
    );

    $respuesta = mdlSocios::mdlRegistraSocio($datosCliente);

    if ($respuesta === "ok") {
      return mdlSocios::mdlUltimoSocio()[0]['idSocio'];
    } else {
      return -1;
    }
  }

  public function ctrListarVentas() {
    $respuesta = VentasModel::mdlListarVentas();

    foreach ($respuesta as $venta) {
      $cliente = mdlSocios::mdlBusca($venta['idCliente'], "socios");

      echo 
      '<tr>
        <td>' . $cliente['nombres'] . ' ' . $cliente['apellidos'] . '</td>
        <td>' . $this -> generarProductos($venta['productos']) . '</td>
        <td>$' . $venta['total'] . '</td>
        <td>' . $venta['fecha'] . '</td>
      </tr>';
    }
  }

  public function ctrListaAdeudos() {
    $respuesta = VentasModel::mdlListaAdeudos();

    foreach ($respuesta as $venta) {

      echo 
      '<tr>
        <td style="width:75px;">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#abonar" data-username="'.$venta['nombres'] . ' ' . $venta['apellidos'].'" data-userid="'.$venta['idVenta'].'"><i class="fa fa-usd"></i></button>
        </td>
        <td>' . $venta['nombres'] . ' ' . $venta['apellidos'] . '</td>
        <td>' . $this -> generarProductos($venta['productos']) . '</td>
        <td>$' . $venta['total'] . '</td>
        <td>$' . $venta['debe'] . '</td>
      </tr>';
    }
  }

  public function ctrAgregaAbono(){
    $cantidad = $_POST['cantidad'];
    $datosAbono = array(
      "idVenta" => $_POST['idVenta'],
      "cantidad" => $_POST['cantidad']
    );

    if (is_null($cantidad) || empty($cantidad) || $cantidad == 0 || $cantidad == ""){
      echo '<script>  
            Swal.fire({
                title: "Escriba una cantidad",
                text: "para abonar a esta cuenta",
                icon: "error",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Aceptar"
              });
            </script>';
      }
    else{
      $abono = VentasModel::mdlAgregarAbono($datosAbono);

      $updatVenta = VentasModel::mdlUpdtVenta($datosAbono);

      if ($abono == "success"){

      echo "<script>  
            Swal.fire({
                title: 'Abono registrado',
                text: 'Se guardó el abono correctamente',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location='index.php?page=abonos'
                }
              });
            </script>";
      }
    }

  }

  private function generarProductos($productos) {
    $productos = json_decode($productos, true);

    $string = '';

    foreach ($productos as $producto) {
      $string .= $producto['cantidad'].' '.$producto['nombreProducto'] . '<br>';
    }
    return $string;
  }
}
