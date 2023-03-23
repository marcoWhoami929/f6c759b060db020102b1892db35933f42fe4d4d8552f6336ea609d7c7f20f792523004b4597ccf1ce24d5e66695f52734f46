<?php

require_once "conexion.php";

class ModeloVideos
{

    /*=============================================
	MOSTRAR VIDEOS
	=============================================*/

    static public function mdlMostrarVideos($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	ACTIVAR VIDEOS
	=============================================*/

    static public function mdlActualizarEstadoVideo($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	CREAR VIDEO
	=============================================*/

    static public function mdlIngresarVideo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(title, state, image, url) VALUES (:title, :state, :image, :url)");

        $stmt->bindParam(":url", $datos["ruta"], PDO::PARAM_STR);
        $stmt->bindParam(":image", $datos["img"], PDO::PARAM_STR);
        $stmt->bindParam(":state", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":title", $datos["titulo"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
	EDITAR VIDEOS
	=============================================*/

    static public function mdlEditarVideo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET title = :title,image = :image, url = :url WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $stmt->bindParam(":url", $datos["ruta"], PDO::PARAM_STR);
        $stmt->bindParam(":title", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":image", $datos["img"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
	ELIMINAR VIDEO
	=============================================*/

    static public function mdlEliminarVideo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}
