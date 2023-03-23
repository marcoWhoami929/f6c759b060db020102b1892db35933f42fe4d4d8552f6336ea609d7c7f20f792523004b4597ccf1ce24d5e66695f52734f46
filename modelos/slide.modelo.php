<?php

require_once "conexion.php";

class ModeloSlide
{

	/*=============================================
	MOSTRAR SLIDE
	=============================================*/

	static public function mdlMostrarSlide($tabla)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY orden ASC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	CREAR SLIDE
	=============================================*/

	static public function mdlCrearSlide($tabla, $datos, $orden)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(title,subtitle,action,image,active,textButton,buttonActive,orden) VALUES (:title,:subtitle,:action,:image,:activeSlide,:textButton,:buttonActive,:orden)");

		$stmt->bindParam(":image", $datos["image"], PDO::PARAM_STR);
		$stmt->bindParam(":activeSlide", $datos["activeSlide"], PDO::PARAM_INT);
		$stmt->bindParam(":title", $datos["title"], PDO::PARAM_STR);
		$stmt->bindParam(":subtitle", $datos["subtitle"], PDO::PARAM_STR);
		$stmt->bindParam(":textButton", $datos["textButton"], PDO::PARAM_STR);
		$stmt->bindParam(":action", $datos["action"], PDO::PARAM_STR);
		$stmt->bindParam(":buttonActive", $datos["buttonActive"], PDO::PARAM_INT);
		$stmt->bindParam(":orden", $orden, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR ORDEN SLIDE
	=============================================*/

	static public function mdlActualizarOrdenSlide($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden = :orden WHERE id = :id");

		$stmt->bindParam(":orden", $datos["orden"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR SLIDE
	=============================================*/

	static public function mdlActualizarSlide($tabla, $rutaFondo, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name = :nameSlide,title = :title,subtitle = :subtitle,action = :action,image =:image,active = :activeSlide,textButton = :textButton,buttonActive = :buttonActive  WHERE id = :id");

		$stmt->bindParam(":nameSlide", $datos["nameSlide"], PDO::PARAM_STR);
		$stmt->bindParam(":title", $datos["title"], PDO::PARAM_STR);
		$stmt->bindParam(":subtitle", $datos["subtitle"], PDO::PARAM_STR);
		$stmt->bindParam(":action", $datos["action"], PDO::PARAM_STR);
		$stmt->bindParam(":image", $rutaFondo, PDO::PARAM_STR);
		$stmt->bindParam(":activeSlide", $datos["activeSlide"], PDO::PARAM_INT);
		$stmt->bindParam(":textButton", $datos["textButton"], PDO::PARAM_STR);
		$stmt->bindParam(":buttonActive", $datos["buttonActive"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ELIMINAR SLIDE
	=============================================*/

	static public function mdlEliminarSlide($tabla, $id)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
}
