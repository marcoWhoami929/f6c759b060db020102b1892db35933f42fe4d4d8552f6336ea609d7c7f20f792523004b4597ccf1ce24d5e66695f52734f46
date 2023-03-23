<?php

require_once "../controladores/slide.controlador.php";
require_once "../modelos/slide.modelo.php";

class AjaxSlide
{

	public $id;
	public $nameSlide;
	public $image;
	public $activeSlide;
	public $subirFondo;
	public $title;
	public $subtitle;
	public $textButton;
	public $action;
	public $buttonActive;
	public $orden;


	/*=============================================
	CREAR SLIDE
	=============================================*/

	public function ajaxCrearSlide()
	{

		$datos = array(
			"image" => $this->image,
			"activeSlide" => $this->activeSlide,
			"title" => $this->title,
			"subtitle" => $this->subtitle,
			"textButton" => $this->textButton,
			"action" => $this->action,
			"buttonActive" => $this->buttonActive
		);

		$respuesta = ControladorSlide::ctrCrearSlide($datos);

		echo $respuesta;
	}

	/*=============================================
	ACTUALIZAR ORDEN SLIDE
	=============================================*/

	public function ajaxOrdenSlide()
	{

		$datos = array(
			"id" => $this->id,
			"orden" => $this->orden
		);

		$respuesta = ControladorSlide::ctrActualizarOrdenSlide($datos);

		echo $respuesta;
	}

	/*=============================================
	CAMBIAR SLIDE
	=============================================*/

	public function ajaxCambiarSlide()
	{

		$datos = array(
			"id" => $this->id,
			"nameSlide" => $this->nameSlide,
			"activeSlide" => $this->activeSlide,
			"buttonActive" => $this->buttonActive,
			"image" => $this->image,
			"subirFondo" => $this->subirFondo,
			"title" => $this->title,
			"subtitle" => $this->subtitle,
			"textButton" => $this->textButton,
			"action" => $this->action,
		);

		$respuesta = ControladorSlide::ctrActualizarSlide($datos);

		echo $respuesta;
	}
}

/*=============================================
CREAR SLIDE
=============================================*/

if (isset($_POST["crearSlide"])) {

	$crearSlide = new AjaxSlide();
	$crearSlide->image = $_POST["image"];
	$crearSlide->activeSlide = $_POST["activeSlide"];
	$crearSlide->title = $_POST["title"];
	$crearSlide->subtitle = $_POST["subtitle"];
	$crearSlide->textButton = $_POST["textButton"];
	$crearSlide->action = $_POST["action"];
	$crearSlide->buttonActive = $_POST["buttonActive"];
	$crearSlide->ajaxCrearSlide();
}

/*=============================================
ACTUALIZAR ORDEN
=============================================*/

if (isset($_POST["idSlide"])) {

	$ordenSlide = new AjaxSlide();
	$ordenSlide->id = $_POST["idSlide"];
	$ordenSlide->orden = $_POST["orden"];
	$ordenSlide->ajaxOrdenSlide();
}

/*=============================================
CAMBIAR SLIDE
=============================================*/

if (isset($_POST["id"])) {

	$slide = new AjaxSlide();
	$slide->id = $_POST["id"];
	$slide->nameSlide = $_POST["nameSlide"];
	$slide->activeSlide = $_POST["activeSlide"];
	$slide->buttonActive = $_POST["buttonActive"];

	// CAMBIAR FONDO 

	$slide->image = $_POST["image"];

	if (isset($_FILES["subirFondo"])) {

		$slide->subirFondo = $_FILES["subirFondo"];
	} else {

		$slide->subirFondo = null;
	}


	$slide->title = $_POST["title"];
	$slide->subtitle = $_POST["subtitle"];
	$slide->textButton = $_POST["textButton"];
	$slide->action = $_POST["action"];
	$slide->ajaxCambiarSlide();
}
