<?php
class socios
{

    public static function ctrRegistra()
    {
        if (isset($_POST["telefono"])) {

            #-----------------------------------------------------------------------------------------------
            # Upload de las imagenes al servidor
            #-----------------------------------------------------------------------------------------------

            $fname1 = $_FILES["image1"]["name"];
            $source1 = $_FILES["image1"]["tmp_name"];
            $fname2 = $_FILES["image2"]["name"];
            $source2 = $_FILES["image2"]["tmp_name"];
            $fname3 = $_FILES["image3"]["name"];
            $source3 = $_FILES["image3"]["tmp_name"];
            $fname4 = $_FILES["image4"]["name"];
            $source4 = $_FILES["image4"]["tmp_name"];

            if (!empty($fname1)) $archivo1 = self::subeArchivo($fname1, $source1);
            else $archivo1 = "";
            if (!empty($fname2)) $archivo2 = self::subeArchivo($fname2, $source2);
            else $archivo2 = "";
            if (!empty($fname3)) $archivo3 = self::subeArchivo($fname3, $source3);
            else $archivo3 = "";
            if (!empty($fname4)) $archivo4 = self::subeArchivo($fname4, $source4);
            else $archivo4 = "";

            if ($archivo1 == "error" || $archivo2 == "error" || $archivo3 == "error" || $archivo4 == "error") $uploadImgs = "error";
            else if ($archivo1 != "" || $archivo2 != "" || $archivo3 != "" || $archivo4 != "") $uploadImgs = "ok";
            else $uploadImgs = "noImage";

            $imagenes = array('imagen1' => $archivo1, 'imagen2' => $archivo2, 'imagen3' => $archivo3, "imagen4" => $archivo4);

            $imagesJson = str_replace("\\", "", json_encode($imagenes));
            #-----------------------------------------------------------------------------------------------

            $fechaRegistro = date('Y-m-d');

            $fechaNacimiento = $_POST["dateAnio"] . "-" . $_POST["dateMes"] . "-" . $_POST["dateDia"];

            $datos = array(
                "nombres" => $_POST["nombres"],
                "apellidos" => $_POST["apellidos"],
                "telefono" => $_POST["telefono"],
                "contacto" => $_POST["contacto"],
                "nombreG" => $_POST["nombreG"],
                "tipoSocio" => $_POST["tipoSocio"],
                "fechaNacimiento" => $fechaNacimiento,
                "fechaRegistro" => $fechaRegistro,
                "archivos" => $imagesJson
            );

            $ingresa = mdlSocios::mdlRegistraSocio($datos);

            if ($ingresa == "ok") {

                echo "<script>Swal.fire({
                        title: 'Registro Exitoso',
                        text: 'El nuevo socio ha sio registrado',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            window.location='index.php?page=socioList'
                        }
                      })
                      </script>";
            } else {

                echo "<script>Swal.fire({
                    title: 'Error',
                    text: 'No se pudo guardar la información',
                    icon: 'danger',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=socioList'
                    }
                  })
                  </script>";
            }
        }
    }

    public static function ctrCumpleanios()
    {

        $cumples = mdlSocios::mdlCumples();
        echo '
        <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Cumpleaños del Mes</div>
                    </div>
                    <div class="card-body">
                        <div class="item3-medias">
                            
        ';

        foreach ($cumples as $cumple) {
            $original_date = $cumple["fechaNacimiento"];
            $timestamp = strtotime($original_date);
            $fechaNacimiento = date("d-M", $timestamp);

            echo '
            <div class="media meida-md mt-0 pb-2">
                <div class="media-body">
                    <h6 class="media-heading font-weight-bold text-uppercase">' . $cumple["nombres"] . ' ' . $cumple["apellidos"] . '</h6>
                    <ul class="mb-0 item3-lists d-flex">
                        <li>
                            <i class="icon icon-calendar"></i>' . $fechaNacimiento . '
                        </li>
                    </ul>
                </div>
            </div><br>';
        }
        echo '
                </div>
            </div>
        </div>
        </div>
        ';
    }

    public static function ctrRepoMensualidades()
    {
        $mensualidades = mdlSocios::mdlRepoMensualidades();

        # ----------------------------------------------
        # Funcion para redondear el porcentaje de 5 en 5 
        # ----------------------------------------------

        $pagados = $mensualidades["socios"];
        $totalSocios = $mensualidades["totalSocios"];

        $porcentajeSocios = intval(($pagados / $totalSocios) * 100); //Redondea 


        $compara = $porcentajeSocios % 5;
       
        
        while ($compara != 0) {
            $pagados++;
            $porcentajeSocios = intval(($pagados / $totalSocios) * 100);
            $compara = $porcentajeSocios % 5;
        }
        
        

        echo '

        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 ">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title">Cobros Mensualidad</h3>
                </div>
                <div class="card-body ">
                    <h5 class="">Cobrado</h5>
                    <h2 class="text-dark  mt-0 ">$ ' . number_format($mensualidades["mensualidad"],2) . '</h2>
                    <div class="progress progress-sm mt-0 mb-2">
                        <div class="progress-bar bg-primary w-' . $porcentajeSocios . '" role="progressbar"></div>
                    </div>
                    <div class=""><i class="fa fa-caret-up text-green"></i>' . $porcentajeSocios . '% de socios</div>
                </div>
            </div>
        </div>';

        echo '
        <div class=" col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title">Socios</h3>
                    <div class="card-options"> <a class="btn btn-sm btn-secondary" href="index.php?page=socioList">Ver</a> </div>
                </div>
                <div class="card-body ">
                    <h5 class="">Total registrados</h5>
                    <h2 class="text-dark  mt-0 ">' . $totalSocios . '</h2>
                </div>
            </div>
        </div>
        ';
    }

    public static function ctrRegistraPrecio()
    {
        if (isset($_POST["categoria"])) {

            $datos = array(
                "categoria" => $_POST["categoria"],
                "costo" => $_POST["costo"]
            );

            $ingresa = mdlSocios::mdlRegistraPrecio($datos);

            if ($ingresa == "ok") {

                echo "<script>Swal.fire({
                        title: 'Registro Exitoso',
                        text: 'El nuevo precio ha sio registrado',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            window.location='index.php?page=precioList'
                        }
                      })
                      </script>";
            } else {

                echo "<script>Swal.fire({
                    title: 'Error',
                    text: 'No se pudo guardar la información',
                    icon: 'danger',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=precioList'
                    }
                  })
                  </script>";
            }
        }
    }

    public static function ctrRegistraGrupo()
    {
        if (isset($_POST["nombreG"])) {

            $datos = array("nombreG" => $_POST["nombreG"]);

            $ingresa = mdlSocios::mdlRegistraGrupo($datos);

            if ($ingresa == "ok") {

                echo "<script>Swal.fire({
                        title: 'Registro Exitoso',
                        text: 'El nuevo grupo ha sio registrado',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            window.location='index.php?page=grupoList'
                        }
                      })
                      </script>";
            } else {

                echo "<script>Swal.fire({
                    title: 'Error',
                    text: 'No se pudo guardar la información',
                    icon: 'danger',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=grupoList'
                    }
                  })
                  </script>";
            }
        }
    }

    public static function ctrActualiza()
    {
        if (isset($_POST["btnActualiza"])) {

            if (isset($_POST["dateAnio"]) || isset($_POST["dateMes"]) || isset($_POST["dateDia"])){
            }

            $fechaNacimiento = $_POST["dateAnio"] . "-" . $_POST["dateMes"] . "-" . $_POST["dateDia"];

            $datos = array(
                "socioId" => $_POST["socioId"],
                "nombres" => $_POST["nombres"],
                "apellidos" => $_POST["apellidos"],
                "telefono" => $_POST["telefono"],
                "contacto" => $_POST["contacto"],
                "nombreG" => $_POST["nombreG"],
                "tipoSocio" => $_POST["tipoSocio"],
                "fechaNacimiento" => $fechaNacimiento
            );

            $actualiza = mdlSocios::mdlActualizaSocio($datos);
            //$actualiza= "ok";

            if ($actualiza == "ok") {

                echo "<script>Swal.fire({
                    title: 'Actualizado!',
                    text: 'La información se actualizó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=socioList'
                    }
                    })
                    </script>";
            } else {
                echo "<script>Swal.fire({
                    title: 'Error!',
                    text: 'No se logró actualizar La información',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=socioList'
                    }
                  })
                  </script>";
            }
        }
        if (isset($_POST["btnCancel"])) {
            echo '<script>window.location="index.php?page=socioList";</script>';
        }
    }

    public static function ctrActualizaPrecio()
    {
        if (isset($_POST["btnActualiza"])) {


            $datos = array(
                "id" => $_POST["id"],
                "categoria" => $_POST["categoria"],
                "costo" => $_POST["costo"]
            );

            $actualiza = mdlSocios::mdlActualizaPrecio($datos);

            if ($actualiza == "ok") {

                echo "<script>Swal.fire({
                    title: 'Actualizado!',
                    text: 'La información se actualizó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=precioList'
                    }
                    })
                    </script>";
            } else {
                echo "<script>Swal.fire({
                    title: 'Error!',
                    text: 'No se logró actualizar La información',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=precioList'
                    }
                  })
                  </script>";
            }
        }
        if (isset($_POST["btnCancel"])) {
            echo '<script>window.location="index.php?page=precioList";</script>';
        }
    }

    public static function ctrActualizaGrupo($idGrupo){
        if(isset($_POST["btnActualiza"])){
            
            // $datos = array(
            //     "id" => $_POST["id"],
            //     "nombreG" => $_POST["nombreG"]
            // );

            $datos=$_POST["nombreG"];

            $actualiza = mdlSocios::mdlActualizaGrupo($datos,$idGrupo);

            if ($actualiza == "ok") {

                echo "<script>Swal.fire({
                    title: 'Actualizado!',
                    text: 'La información se actualizó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=grupoList'
                    }
                    })
                    </script>";
            } else {
                echo "<script>Swal.fire({
                    title: 'Error!',
                    text: 'No se logró actualizar La información',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=grupoList'
                    }
                  })
                  </script>";
            }
        }
    }


    #  Lista todos los usuarios disponibles en la tabla que recibe como parametro
    #------------------------------------------------------------------------------------------------
    public static function ctrListaSocios()
    {

        $respuesta = mdlSocios::mdlLista("jugadores");

        foreach ($respuesta as $row => $item) {
            if ($item["tipoSocio"] == 1) $tipoSocio = '<td>Socio</td>';
            if ($item["tipoSocio"] == 2) $tipoSocio = '<td>Estudiante</td>';
            if ($item["tipoSocio"] == 3) $tipoSocio = '<td>Referido</td>';
            $cumple = strftime("%d de %B de %Y", strtotime($item["fechaNacimiento"]));
            $registro = strftime("%d de %B de %Y", strtotime($item["fechaRegistro"]));


            echo '
            <tr>
                <td>' . $item["nombres"] . ' ' . $item["apellidos"] . '</td>
                <td>' . $item["tipoSocio"] . '</td>
                <td>' . $item["telefono"] . '</td>
                <td>' . $item["nombreG"] . '</td>
                <td>' . $cumple . '</td>
                <td>
                    <div class="item-action dropdown">
                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical fs-20 text-dark"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-172px, 22px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a href="index.php?page=socioEdit&idEditar=' . $item["idJugador"] . '" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>
                            <a href="index.php?page=socioList&idBorrar=' . $item["idJugador"] . '" class="dropdown-item"><i class="dropdown-icon fe fe-user-x"></i> Borrar </a>
                        </div>
                    </div>
                </td>
            </tr>';
        }
    }

    public static function ctrListaAsistencia($grupo)
    {

        if (!empty($grupo) || $grupo != "") {

            $respuesta = mdlSocios::mdlListaFiltro($grupo);
            //  contenido de la tabla ---------------------------------------------------------
            foreach ($respuesta as $row => $item) {
                echo '
            <tr>
                <td>
                <a href="index.php?page=asistencia&socio=' . $item["idSocio"] . '&grupo='.$grupo.'" class="dropdown-item"><i class="fe fe-activity"></i>
                </td>
                <td>' . $item["nombres"] . ' ' . $item["apellidos"] . '</td>
                <td>' . $item["tipoSocio"] . '</td>
                <td>' . $item["telefono"] . '</td>
                <td>' . $item["nombreG"] . '</td>

            </tr>';
            }

            // cierre de la tabla ---------------------------------------------
        }else{
            echo "<h1 align=center>Seleccione un grupo</h1>";
        }
    }

    public static function ctrListaPrecios()
    {

        $respuesta = mdlSocios::mdlLista("precios");

        foreach ($respuesta as $row => $item) {

            echo '
            <tr>
                <td>' . $item["categoria"] . '</td>
                <td>' . $item["costo"] . '</td>
                <td>
                    <div class="item-action dropdown">
                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical fs-20 text-dark"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-172px, 22px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a href="index.php?page=precioEdit&idEditar=' . $item["id"] . '" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>
                            <a href="index.php?page=precioList&idBorrar=' . $item["id"] . '" class="dropdown-item"><i class="dropdown-icon fe fe-user-x"></i> Borrar </a>
                        </div>
                    </div>
                </td>
            </tr>';
        }
    }

    public static function ctrListaGrupos()
    {

        $respuesta = mdlSocios::mdlLista("grupos");

        foreach ($respuesta as $row => $item) {
            echo '
            <tr>
                <td>' . $item["nombreG"] . '</td>
                <td>
                <a href="index.php?page=grupoEdit&idEditar=' . $item["id"] . '"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>
                <br>
                <a href="index.php?page=grupoList&idBorrar=' . $item["id"] . '"><i class="dropdown-icon fe fe-user-x"></i> Borrar </a>
                </td>
            </tr>';
        }
    }

    public static function ctrListaSociosInicio()
    {

        $respuesta = mdlSocios::mdlLista("socios");
        date_default_timezone_set('UTC');
        date_default_timezone_set("America/Chihuahua");
        $hoy = date("d");


        foreach ($respuesta as $row => $item) {
            if ($item["tipoSocio"] == 1) $tipoSocio = '<td>Socio</td>';
            if ($item["tipoSocio"] == 2) $tipoSocio = '<td>Estudiante</td>';
            if ($item["tipoSocio"] == 3) $tipoSocio = '<td>Referido</td>';
            $cumple = strftime("%d de %B", strtotime($item["fechaNacimiento"]));
            $registro = strftime("%d de %B de %Y", strtotime($item["fechaRegistro"]));

            if ($item["nombreG"] == 1) $nombreG = '<td>Infantil</td>';
            if ($item["nombreG"] == 2) $nombreG = '<td>Juvenil</td>';
            if ($item["nombreG"] == 3) $nombreG = '<td>8-9</td>';



            // calculo de diferencia de las fechas
            $fecha_inicial = $item["fechaUltimoPago"];
            $fecha_final = date('Y-m-d');

            $dias = (strtotime($fecha_inicial) - strtotime($fecha_final)) / 86400;
            $dias = abs($dias);
            $dias = floor($dias);

            if (is_null($fecha_inicial)) $dias_pasados = "sin pago";
            else $dias_pasados = $dias + 1;

            if ($dias_pasados >= 31) $mens_dias = '<p class="text-primary">' . $dias_pasados . '</p>';
            else $mens_dias = '<p class="text-green">' . $dias_pasados . '</p>';
            //---------------------------------------------------------

            echo '
            <tr>
                <td style="width:75px;">
                <a href="index.php?page=mensualidad&socio=' . $item["idSocio"] . '" ><i class="fa fa-usd"></i>&nbsp;&nbsp;</a>  
                </td>
                <td>' . $item["nombres"] . ' ' . $item["apellidos"] . '</td>
                <td style="width:75px;">' . $mens_dias . '</td>
                <td>' . $item["contacto"] . '</td>
                <td>' . $item["nombreG"] . '</td>
                <td> <a href="tel:' . $item["telefono"] . '">' . $item["telefono"] . '</a></td>
            </tr>';
        }
    }


    #BORRAR SOCIO
    #------------------------------------
    public static function ctrBorrarSocio()
    {
        if (isset($_GET['idBorrar'])) {
            echo '<script>  
            Swal.fire({
                title: "¿Está seguro?",
                text: "¡Esto no se podrá recuperar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Si, borrar!"
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location="index.php?page=socioDel&idBorrar="+' . $_GET["idBorrar"] . '
                }
              })
              </script>';
        }
    }

    public static function ctrBorrarPrecio()
    {
        if (isset($_GET['idBorrar'])) {
            echo '<script>  
            Swal.fire({
                title: "¿Está seguro?",
                text: "¡Esto no se podrá recuperar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Si, borrar!"
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location="index.php?page=precioDel&idBorrar="+' . $_GET["idBorrar"] . '
                }
              })
              </script>';
        }
    }

    public static function ctrBorrarGrupo(){

        if(isset($_GET["idBorrar"])){
            echo '<script>  
            Swal.fire({
                title: "¿Está seguro?",
                text: "¡Esto no se podrá recuperar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Si, borrar!"
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location="index.php?page=grupoDel&idBorrar="+' . $_GET["idBorrar"] . '
                }
              })
              </script>';
        }
    }

    public function ctrActualizarAsistencia()
    {
        if (isset($_GET['socio'])) {
            $idSocio = $_GET['socio'];
            $grupo=$_GET['grupo'];

            $respuesta = mdlSocios::mdlActualizarAsistencia($idSocio);

            if ($respuesta === "success") {
                echo '<script>  
                window.location.href = "index.php?page=tomaAsistencia&grupo='.$grupo.'";

                  </script>';
            // } else {
            //     echo '<script>  
            //     Swal.fire({
            //         title: "Actualizar asistencia",
            //         text: "La asistencia no se pudo actualizar",
            //         icon: "error",
            //         showCancelButton: false,
            //         confirmButtonColor: "#3085d6",
            //         cancelButtonColor: "#d33",
            //         confirmButtonText: "Aceptar"
            //       }).then((result) => {
                  
            //             window.location.href = "index.php?page=socioList";
                    
            //       })
            //       </script>';
            }
        }
    }

    public function ctrRegistrarMensualidad()
    {
        if (isset($_GET['socio'])) {
            $idSocio = $_GET['socio'];

            $socio = mdlSocios::mdlBuscaPrecio($idSocio);

            $pago = $socio["costo"];

            $ultimo_pago = mdlSocios::mdlRegistraUltimoPago($idSocio);

            $mensualidad = mdlSocios::mdlRegistrarMensualidad($idSocio, $pago);



            if ($ultimo_pago === "success" && $mensualidad === "success") {
                echo '<script>  
                Swal.fire({
                    title: "Pago Registrado",
                    text: "La mensualidad fue registrada exitosamente",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Aceptar"
                  }).then((result) => {
                  
                        window.location.href = "index.php?page=inicio";
                    
                  })
                  </script>';
            } else {
                echo '<script>  
                Swal.fire({
                    title: "Error",
                    text: "La mensualidad no se pudo registrar",
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Aceptar"
                  }).then((result) => {
                  
                        window.location.href = "index.php?page=inicio";
                    
                  })
                  </script>';
            }
        }
    }

    public function ctrSelectSocios()
    {
        $respuesta = mdlSocios::mdlLista("socios");

        foreach ($respuesta as $socio) {
            echo '<option value="' . $socio['idSocio'] . '">' . $socio['nombres'] . ' ' . $socio['apellidos'] . '</option>';
        }
    }

    public function ctrSelectPrecios()
    {
        $respuesta = mdlSocios::mdlLista("precios");

        foreach ($respuesta as $precio) {
            echo '<option value="' . $precio['categoria'] . '">' . $precio['categoria'] . '</option>';
        }
    }

    public function ctrSelectGrupos()
    {
        $respuesta = mdlSocios::mdlLista("grupos");

        foreach ($respuesta as $nombre) {
            echo '<option value="' . $nombre['nombreG'] . '">' . $nombre['nombreG'] . '</option>';
        }
    }

    public function ctrSelectedPrecios($tipoSocio)
    {

        $respuesta = mdlSocios::mdlLista("precios");

        foreach ($respuesta as $precio) {

            if ($precio["categoria"] == $tipoSocio)
                echo '<option value="' . $precio['categoria'] . '" selected>' . $precio['categoria'] . '</option>';
            else
                echo '<option value="' . $precio['categoria'] . '">' . $precio['categoria'] . '</option>';
        }
    }

    #----------------------------------------------
    #           SUBE LAS IMAGENES AL EXPEDIENTE 
    #----------------------------------------------
    public static function subeArchivo($fname, $source)
    {
        $nAncho = 1500; //Nuevo ancho
        $nAlto = 1500;  //Nuevo alto
        $fechaActual = date('d-m-Y H:i:s');
        $nombrePrevio = $fechaActual . $fname;
        $nombre = md5($nombrePrevio);

        $fileType = strtolower(pathinfo($fname, PATHINFO_EXTENSION));


        # ------------------------------------------------------------------
        // crear la carpeta del paciente que corresponde a su numero de id
        # ------------------------------------------------------------------

        # Revisamos si la carpeta del paciente existe en el directorio y si no, la creamos
        $micarpeta = "uploads/expedientes/";
        if (!file_exists($micarpeta)) {
            mkdir($micarpeta, 0777, true);
        }

        $target_path = "uploads/expedientes/" . $nombre . "." . $fileType;
        if ($fileType == "jpg" || $fileType == 'jpeg') $fname = imagecreatefromjpeg($source);
        else if ($fileType == 'png') $fname = imagecreatefrompng($source);
        $x = imagesx($fname);
        $y = imagesy($fname);

        if ($x >= $y) {
            $nAncho = $nAncho;
            $nAlto = $nAncho * $y / $x;
        } else {
            $nAlto = $nAlto;
            $nAncho = $x / $y * $nAlto;
        }

        $img = imagecreatetruecolor($nAncho, $nAlto);
        imagecopyresampled($img, $fname, 0, 0, 0, 0, floor($nAncho), floor($nAlto), $x, $y);

        if (imagejpeg($img, $target_path))
            return $target_path;

        return "error";
    }
}//Class
