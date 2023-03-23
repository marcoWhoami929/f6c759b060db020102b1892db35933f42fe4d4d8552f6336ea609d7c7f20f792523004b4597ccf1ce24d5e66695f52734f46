<?php

require_once "conexion.php";

class ModeloComercio
{

	/*=============================================
	SELECCIONAR PLANTILLA
	=============================================*/

	static public function mdlSeleccionarPlantilla($tabla)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR LOGO O ICONO
	=============================================*/

	static public function mdlActualizarLogoIcono($tabla, $id, $item, $valor)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id = :id");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR COLORES
	=============================================*/

	static public function mdlActualizarColores($tabla, $id, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET about = :nuestraEmpresa,topBarMessage = :messageSuperior,topBar = :barraSuperior, topText = :textoSuperior, background = :colorFondo, textColor = :colorTexto,phone =:phoneSuperior,email = :emailSuperior  WHERE id = :id");

		$stmt->bindParam(":barraSuperior", $datos["barraSuperior"], PDO::PARAM_STR);
		$stmt->bindParam(":textoSuperior", $datos["textoSuperior"], PDO::PARAM_STR);
		$stmt->bindParam(":colorFondo", $datos["colorFondo"], PDO::PARAM_STR);
		$stmt->bindParam(":colorTexto", $datos["colorTexto"], PDO::PARAM_STR);
		$stmt->bindParam(":messageSuperior", $datos["messageSuperior"], PDO::PARAM_STR);
		$stmt->bindParam(":nuestraEmpresa", $datos["nuestraEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":phoneSuperior", $datos["phoneSuperior"], PDO::PARAM_STR);
		$stmt->bindParam(":emailSuperior", $datos["emailSuperior"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR SCRIPT
	=============================================*/

	static public function mdlActualizarScript($tabla, $id, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET apiFacebook = :apiFacebook, pixelFacebook = :pixelFacebook, apiGoogleAnalytics = :googleAnalytics WHERE id = :id");

		$stmt->bindParam(":apiFacebook", $datos["apiFacebook"], PDO::PARAM_STR);
		$stmt->bindParam(":pixelFacebook", $datos["pixelFacebook"], PDO::PARAM_STR);
		$stmt->bindParam(":googleAnalytics", $datos["googleAnalytics"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	SELECCIONAR COMERCIO
	=============================================*/

	static public function mdlSeleccionarComercio($tabla)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt = null;
	}
}
