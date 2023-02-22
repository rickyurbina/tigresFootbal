<?php

require_once "conexion.php";

class mdlProductos {

    #       Agregar un Producto a la BD
    # ---------------------------------------------
    
    public static function mdlRegistraProducto($datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO `productos`(`idProducto`, `nombre`, `marca`, `contenido`, `costo`, `precioPublico`, `stock`, `imagen`) VALUES (NULL, :nombre, :marca, :contenido, :costo, :precioPublico, :stock, :imagen)");
    
         $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
         $stmt -> bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
         $stmt -> bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
         $stmt -> bindParam(":costo", $datos["costo"], PDO::PARAM_INT);
         $stmt -> bindParam(":precioPublico", $datos["precioPublico"], PDO::PARAM_INT);
         $stmt -> bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
         $stmt -> bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }


	#       Actualiza la informacion de un Producto a la BD
    # ----------------------------------------------------------
    
    public static function mdlActualizaProducto($datos){

        $stmt = Conexion::conectar()->prepare("UPDATE `Productos` SET `nombre`=:nombre, `marca`=:marca,
		`contenido`=:contenido, `costo`=:costo, `precioPublico`=:precioPublico, `stock`=:stock, `imagen`=:imagen WHERE idProducto = :productId;");

        $stmt -> bindParam(":productId", $datos["productId"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
        $stmt -> bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
        $stmt -> bindParam(":costo", $datos["costo"], PDO::PARAM_INT);
        $stmt -> bindParam(":precioPublico", $datos["precioPublico"], PDO::PARAM_INT);
        $stmt -> bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
        $stmt -> bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    	#LISTA ProductoS
	#-------------------------------------

	public static function mdlListaProducto($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		//$stmt->close();

	}


    	#BUSCA UN Producto
	#-------------------------------------

	public static function mdlBusca($usuario, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idProducto = :id");

		$stmt->bindParam(":id", $usuario, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		//$stmt->close();
	}


    	#BORRAR Producto
	#-------------------------------------
	public static function mdlBorrarProducto($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idProducto = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		//$stmt -> close();
	}


}// Class

?>