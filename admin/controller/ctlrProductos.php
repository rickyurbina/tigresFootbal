<?php
Class productos {

    public static function ctrRegistra(){
        if(isset($_POST["registrar"])){
       
            $datos = array("nombre" => $_POST["nombre"],
                           "marca" => $_POST["marca"],
                           "contenido" => $_POST["contenido"],
                           "costo" => $_POST["costo"],
                           "precioPublico" => $_POST["precioPublico"],
                           "stock" => $_POST["stock"],
                           "imagen" => $_POST["imagen"]);

             $ingresa = mdlProductos::mdlRegistraProducto($datos);


            if ($ingresa == "ok"){

                    echo "<script>Swal.fire({
                        title: 'Registro Exitoso',
                        text: 'El producto se ha registrado',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            window.location='index.php?page=productList'
                        }
                      })
                      </script>";
            }
            else{

                echo "<script>Swal.fire({
                    title: 'Error',
                    text: 'No se pudo guardar la información',
                    icon: 'danger',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=productList'
                    }
                  })
                  </script>";
            }   
            
            
        }
    }


    public static function ctrActualiza(){
        if(isset($_POST["btnActualiza"])){

            // $original_date = $_POST["fechaNacimiento"];
            // $timestamp = strtotime($original_date);
            // $fechaNacimiento = date("Y-m-d", $timestamp);
        
            $datos = array( "productId" => $_POST["productId"],
                            "nombre" => $_POST["nombre"],
                            "marca" => $_POST["marca"],
                            "contenido" => $_POST["contenido"],
                            "costo" => $_POST["costo"],
                            "precioPublico" => $_POST["precioPublico"],
                            "stock" => $_POST["stock"],
                            "imagen" => $_POST["imagen"]);

            $actualiza = mdlProductos::mdlActualizaProducto($datos);

            if ($actualiza == "ok"){

                echo "<script>Swal.fire({
                    title: 'Actualizado!',
                    text: 'La información se actualizó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=productList'
                    }
                    })
                    </script>";
            }else{
                echo "<script>Swal.fire({
                    title: 'Error!',
                    text: 'No se logró actualizar La información',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=productList'
                    }
                  })
                  </script>";

            }
            
        }
    }


    #  Lista todos los usuarios disponibles en la tabla que recibe como parametro
    #------------------------------------------------------------------------------------------------
    public static function ctrListaProductos(){

		$respuesta = mdlProductos::mdlListaProducto("productos");

		foreach ($respuesta as $row => $item){
            // if ($item["tipoCliente"] == 1) $tipoCliente = '<td>Socio</td>';
            // if ($item["tipoCliente"] == 2) $tipoCliente = '<td>Estudiante</td>';
            // if ($item["tipoCliente"] == 3) $tipoCliente = '<td>Referido</td>';
            // $cumple = strftime("%d de %B", strtotime($item["fechaNacimiento"]));
            // $registro = strftime("%d de %B de %Y", strtotime($item["fechaRegistro"]));

            echo '
            <tr>
                <td>'.$item["nombre"].'</td>
                <td>'.$item["marca"].'</td>
                <td>'.$item["contenido"].'</td>
                <td>'.$item["precioPublico"].'</td>
                <td>'.$item["stock"].'</td>
                <td>
                    <div class="item-action dropdown">
                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical fs-20 text-dark"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-172px, 22px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a href="index.php?page=productEdit&idEditar='.$item["idProducto"].'" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>
                            <a href="index.php?page=productList&idBorrar='.$item["idProducto"].'" class="dropdown-item"><i class="dropdown-icon fe fe-user-x"></i> Borrar </a>
                        </div>
                    </div>
                </td>
            </tr>';
		}
	}

    public function ctrSelectProductos() {
        $respuesta = mdlProductos::mdlListaProducto("productos");

        foreach ($respuesta as $producto) {
            echo '
                <option value="' . $producto['idProducto'] . '" precio="' . $producto['precioPublico'] . '">' . $producto['nombre'] . '</option>
            ';
        }
    }


    	#BORRAR USUARIO
	#------------------------------------
	public static function ctrBorrarProducto(){
		if (isset($_GET['idBorrar'])){
            echo '<script>  
            Swal.fire({
                title: "Esta seguro?",
                text: "Esto no se podrá recuperar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, borrar!"
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location="index.php?page=productDel&idBorrar="+'.$_GET["idBorrar"].'
                }
              })
              </script>';
		}
	}

}//Class

?>
