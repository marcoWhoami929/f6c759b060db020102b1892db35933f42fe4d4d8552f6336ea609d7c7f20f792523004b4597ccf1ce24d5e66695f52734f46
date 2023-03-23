<?php

require_once "../controladores/comercio.controlador.php";
require_once "../modelos/comercio.modelo.php";

class AjaxComercio
{

	/*=============================================
	CAMBIAR LOGOTIPO
	=============================================*/

	public $imagenLogo;

	public function ajaxCambiarLogotipo()
	{

		$item = "logo";
		$valor = $this->imagenLogo;

		$respuesta = ControladorComercio::ctrActualizarLogoIcono($item, $valor);

		echo $respuesta;
	}

	/*=============================================
	CAMBIAR ICONO
	=============================================*/

	public $imagenIcono;

	public function ajaxCambiarIcono()
	{

		$item = "icono";
		$valor = $this->imagenIcono;

		$respuesta = ControladorComercio::ctrActualizarLogoIcono($item, $valor);

		echo $respuesta;
	}


	/*=============================================
	CAMBIAR COLORES
	=============================================*/

	public $barraSuperior;
	public $textoSuperior;
	public $colorFondo;
	public $colorTexto;
	public $messageSuperior;
	public $nuestraEmpresa;
	public $phoneSuperior;
	public $emailSuperior;

	public function ajaxCambiarColor()
	{

		$datos = array(
			"barraSuperior" => $this->barraSuperior,
			"phoneSuperior" => $this->phoneSuperior,
			"emailSuperior" => $this->emailSuperior,
			"textoSuperior" => $this->textoSuperior,
			"colorFondo" => $this->colorFondo,
			"colorTexto" => $this->colorTexto,
			"messageSuperior" => $this->messageSuperior,
			"nuestraEmpresa" => $this->nuestraEmpresa
		);

		$respuesta = ControladorComercio::ctrActualizarColores($datos);

		echo $respuesta;
	}

	/*=============================================
	CAMBIAR REDES SOCIALES
	=============================================*/

	public $redesSociales;

	public function ajaxCambiarRedes()
	{

		$item = "socialNetworks";
		$valor = $this->redesSociales;

		$respuesta = ControladorComercio::ctrActualizarLogoIcono($item, $valor);

		echo $respuesta;
	}

	/*=============================================
	CAMBIAR SCRIPT
	=============================================*/

	public $apiFacebook;
	public $pixelFacebook;
	public $googleAnalytics;

	public function ajaxCambiarScript()
	{

		$datos = array(
			"apiFacebook" => $this->apiFacebook,
			"pixelFacebook" => $this->pixelFacebook,
			"googleAnalytics" => $this->googleAnalytics
		);

		$respuesta = ControladorComercio::ctrActualizarScript($datos);

		echo $respuesta;
	}
}

/*=============================================
CAMBIAR LOGOTIPO
=============================================*/
if (isset($_FILES["imagenLogo"])) {

	$logotipo = new AjaxComercio();
	$logotipo->imagenLogo = $_FILES["imagenLogo"];
	$logotipo->ajaxCambiarLogotipo();
}

/*=============================================
CAMBIAR ICONO
=============================================*/
if (isset($_FILES["imagenIcono"])) {

	$icono = new AjaxComercio();
	$icono->imagenIcono = $_FILES["imagenIcono"];
	$icono->ajaxCambiarIcono();
}

/*=============================================
CAMBIAR COLORES
=============================================*/

if (isset($_POST["barraSuperior"])) {

	$colores = new AjaxComercio();
	$colores->barraSuperior = $_POST["barraSuperior"];
	$colores->textoSuperior = $_POST["textoSuperior"];
	$colores->colorFondo = $_POST["colorFondo"];
	$colores->colorTexto = $_POST["colorTexto"];
	$colores->messageSuperior = $_POST["messageSuperior"];
	$colores->nuestraEmpresa = $_POST["nuestraEmpresa"];
	$colores->phoneSuperior = $_POST["phoneSuperior"];
	$colores->emailSuperior = $_POST["emailSuperior"];
	$colores->ajaxCambiarColor();
}


/*=============================================
CAMBIAR REDES SOCIALES
=============================================*/

if (isset($_POST["redesSociales"])) {

	$redesSociales = new AjaxComercio();
	$redesSociales->redesSociales = $_POST["redesSociales"];
	$redesSociales->ajaxCambiarRedes();
}

/*=============================================
CAMBIAR SCRIPT
=============================================*/

if (isset($_POST["apiFacebook"])) {

	$script = new AjaxComercio();
	$script->apiFacebook = $_POST["apiFacebook"];
	$script->pixelFacebook = $_POST["pixelFacebook"];
	$script->googleAnalytics = $_POST["googleAnalytics"];
	$script->ajaxCambiarScript();
}
