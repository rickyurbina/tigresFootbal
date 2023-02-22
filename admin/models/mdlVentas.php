<?php

require_once "conexion.php";

class VentasModel {
  public static function mdlAgregarVenta($datosVenta) {
    $statement = Conexion::conectar() -> prepare("INSERT INTO ventas VALUES (null, :idCliente, :productos, :pago, :total, :debe, now());");

    $statement -> bindParam(":idCliente", $datosVenta['idCliente'], PDO::PARAM_INT);
    $statement -> bindParam(":productos", $datosVenta['productos'], PDO::PARAM_STR);
    $statement -> bindParam(":pago", $datosVenta['pago'], PDO::PARAM_INT);
    $statement -> bindParam(":total", $datosVenta['totalVenta'], PDO::PARAM_INT);
    $statement -> bindParam(":debe", $datosVenta['debe'], PDO::PARAM_INT);

    if ($statement -> execute()) {
      return "success";
    } else {
      return "error";
    }
  }


  # ------------------------------------------------------------------------------------
  # Actualiza el campo `debe` en la tabla de ventas despues de registrar un abono
  # ------------------------------------------------------------------------------------
  public static function mdlUpdtVenta($datosAbono) {
    $statement = Conexion::conectar() -> prepare("UPDATE `ventas` SET `debe`= `debe` - :cantidad, `pago` = `pago`+:cantidad WHERE `idVenta` = :idVenta;");

    $statement -> bindParam(":idVenta", $datosAbono['idVenta'], PDO::PARAM_INT);
    $statement -> bindParam(":cantidad", $datosAbono['cantidad'], PDO::PARAM_INT);

    if ($statement -> execute()) {
      return "success";
    } else {
      return "error";
    }
  }

  public static function mdlAgregarAbono($datosAbono) {
    $statement = Conexion::conectar() -> prepare("INSERT INTO abonos VALUES (null, :idVenta, :cantidad, now());");

    $statement -> bindParam(":idVenta", $datosAbono['idVenta'], PDO::PARAM_INT);
    $statement -> bindParam(":cantidad", $datosAbono['cantidad'], PDO::PARAM_INT);

    if ($statement -> execute()) {
      return "success";
    } else {
      return "error";
    }
  }

  public static function mdlListarVentas() {
    $statement = Conexion::conectar() -> prepare("SELECT * FROM ventas ORDER BY idVenta DESC;");

    $statement -> execute();

    return $statement -> fetchAll();
  }

  public static function mdlListaAdeudos() {
    $statement = Conexion::conectar() -> prepare("SELECT v.idVenta, v.productos, v.pago, v.total, v.debe, v.fecha, s.nombres, s.apellidos
                                                  from ventas as v
                                                  INNER JOIN socios as s
                                                  on v.idCliente = s.idSocio
                                                  WHERE v.debe > 0
                                                  ORDER BY v.fecha DESC;");

    $statement -> execute();

    return $statement -> fetchAll();
  }

  public static function mdlRepoVentaProductos(){

    $stmt = Conexion::conectar()->prepare("SELECT sum(`pago`) as cobrado, COUNT(`idVenta`) as pagos, sum(`debe`) as adeudo FROM `ventas` 
                                                  WHERE MONTH(`fecha`) = MONTH(CURDATE());");
     
    $stmt -> execute();
    return $stmt->fetch();

  }
}
