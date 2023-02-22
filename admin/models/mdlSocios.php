<?php

require_once "conexion.php";

class mdlSocios {

    #       Agregar un Socio a la BD
    # ---------------------------------------------
    
    public static function mdlRegistraSocio($datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO `jugadores` (`idJugador`, `nombres`, `apellidos`, `telefono`, `contacto`, `nombreG`, `tipoSocio`, `fechaNacimiento`, `fechaRegistro`, `archivos`) 
        VALUES (NULL, :nombres, :apellidos, :telefono, :contacto, :nombreG, :tipoSocio, :fechaNacimiento, :fechaRegistro, :archivos);");


         $stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
         $stmt -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
         $stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
         $stmt -> bindParam(":contacto", $datos["contacto"], PDO::PARAM_STR);
         $stmt -> bindParam(":nombreG", $datos["nombreG"], PDO::PARAM_STR);
         $stmt -> bindParam(":tipoSocio", $datos["tipoSocio"], PDO::PARAM_STR);

         $stmt -> bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);
         $stmt -> bindParam(":fechaRegistro", $datos["fechaRegistro"], PDO::PARAM_STR);
         $stmt -> bindParam(":archivos", $datos["archivos"], PDO::PARAM_STR);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    public static function mdlRegistraPrecio($datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO `precios` VALUES (NULL, :categoria, :costo);");


         $stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
         $stmt -> bindParam(":costo", $datos["costo"], PDO::PARAM_INT);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    public static function mdlRegistraGrupo($datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO `grupos` VALUES (NULL, :nombreG);");


         $stmt -> bindParam(":nombreG", $datos["nombreG"], PDO::PARAM_STR);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }


	#       Actualiza la informacion de un Socio a la BD
    # ----------------------------------------------------------
    
    public static function mdlActualizaSocio($datos){

        $stmt = Conexion::conectar()->prepare("UPDATE `socios` SET `nombres`=:nombres, `apellidos`=:apellidos,
		`telefono`=:telefono, `contacto`=:contacto, `nombreG`=:nombreG, `tipoSocio`=:tipoSocio, `fechaNacimiento`=:fechaNacimiento WHERE idSocio = :socioId;");

        $stmt -> bindParam(":socioId", $datos["socioId"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt -> bindParam(":contacto", $datos["contacto"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombreG",$datos["nombreG"],PDO::PARAM_STR);
        $stmt -> bindParam(":tipoSocio", $datos["tipoSocio"], PDO::PARAM_STR);
        $stmt -> bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    public static function mdlActualizaPrecio($datos){

        $stmt = Conexion::conectar()->prepare("UPDATE `precios` SET `categoria`=:categoria, `costo`=:costo  WHERE id = :id;");

        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt -> bindParam(":costo", $datos["costo"], PDO::PARAM_INT);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    	#LISTA todos los registros de una tabla
	#--------------------------------------------

	public static function mdlLista($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		//$stmt->close();

	}

        	#LISTA todos los registros de una tabla
	#--------------------------------------------
    public static function mdlListaFiltro($grupo){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM `socios` WHERE `nombreG` = '$grupo' ");
		$stmt->execute();
        
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		//$stmt->close();

	}

    public static function mdlListaPrecios($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();
		return $stmt->fetchAll();
	}


    	#BUSCA UN Socio
	#-------------------------------------

	public static function mdlBusca($usuario, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idSocio = :id");

		$stmt->bindParam(":id", $usuario, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		//$stmt->close();
	}

    public static function mdlBuscaPrecioEditar($precio){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM `precios` WHERE id = :id");

		$stmt->bindParam(":id", $precio, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();
    }

    public static function mdlBuscaGrupo($grupo){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM `grupos` WHERE id=:id");

        $stmt->bindParam(":id", $grupo, PDO::PARAM_INT);

        $stmt -> execute();
        return $stmt -> fetch();

    }

    public static function mdlActualizaGrupo($datos,$idGrupo){

        $stmt = Conexion::conectar()->prepare("UPDATE `grupos` SET `nombreG`=:nombreG WHERE `id`=$idGrupo");

        
        $stmt -> bindParam(":nombreG", $datos, PDO::PARAM_STR);

        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    public static function mdlBorrarGrupo($idGrupo){

        $stmt = Conexion::conectar()->prepare("DELETE FROM `grupos` WHERE `id`=$idGrupo");

        if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}

    }

    public static function mdlBuscaPrecio($usuario){

		$stmt = Conexion::conectar()->prepare("SELECT p.costo
                                                FROM precios as p
                                                INNER JOIN socios as s
                                                ON p.categoria = s.tipoSocio
                                                WHERE s.idSocio = :id");

		$stmt->bindParam(":id", $usuario, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		//$stmt->close();
	}


    	#BORRAR Socio
	#-------------------------------------
	public static function mdlBorrarSocio($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idJugador = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		//$stmt -> close();
	}

    public static function mdlBorrarPrecio($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		//$stmt -> close();
	}

    public static function mdlActualizarAsistencia($idSocio) {

        $statement = Conexion::conectar() -> prepare("INSERT INTO asistencia VALUES (NULL, :idSocio, now());");

        $statement -> bindParam(":idSocio", $idSocio, PDO::PARAM_INT);

        if ($statement -> execute()) {
            return "success";
        } else {
            return "error";
        }
    }

    public static function mdlRegistraUltimoPago($idSocio) {
        $statement = Conexion::conectar() -> prepare("UPDATE socios SET fechaUltimoPago = CURRENT_DATE() WHERE idSocio = :idSocio;");

        $statement -> bindParam(":idSocio", $idSocio, PDO::PARAM_INT);

        if ($statement -> execute()) {
            return "success";
        } else {
            return "error";
        }
    }
    public static function mdlRegistrarMensualidad($idSocio, $mensualidad) {
        $statement = Conexion::conectar() -> prepare("INSERT INTO `pagos` VALUES (NULL, :idSocio, :mensualidad, now()) ");

        $statement -> bindParam(":idSocio", $idSocio, PDO::PARAM_INT);
        $statement -> bindParam(":mensualidad", $mensualidad, PDO::PARAM_INT);

        if ($statement -> execute()) {
            return "success";
        } else {
            return "error";
        }
    }

    public static function mdlUltimoSocio() {
        $statement = Conexion::conectar() -> prepare("SELECT * FROM socios ORDER BY idSocio DESC");

        $statement -> execute();

        return $statement -> fetchAll();
    }


    public static function mdlRepoMensualidades(){

        $stmt = Conexion::conectar()->prepare("SELECT sum(`cantidad`) as mensualidad, COUNT(`id`) as socios, (SELECT COUNT(`idSocio`) FROM `socios`) as totalSocios FROM `pagos` 
                                                WHERE MONTH(`fecha`) = MONTH(CURDATE());");
         
        $stmt -> execute();
        return $stmt->fetch();

    }

    public static function mdlCumples(){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM `socios` WHERE MONTH(`fechaNacimiento`) = MONTH(CURDATE()) ORDER BY `fechaNacimiento`;");
         
        $stmt -> execute();
        return $stmt->fetchAll();

    }

}// Class

?>