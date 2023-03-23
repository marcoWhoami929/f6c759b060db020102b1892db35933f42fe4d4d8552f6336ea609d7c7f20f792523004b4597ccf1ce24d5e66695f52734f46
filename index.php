<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/banner.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/subcategorias.controlador.php";
require_once "controladores/cabeceras.controlador.php";
require_once "controladores/comercio.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/slide.controlador.php";
require_once "controladores/sucursales.controlador.php";
require_once "controladores/revista.controlador.php";
require_once "controladores/videos.controlador.php";

require_once "modelos/administradores.modelo.php";
require_once "modelos/banner.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/subcategorias.modelo.php";
require_once "modelos/cabeceras.modelo.php";
require_once "modelos/comercio.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/slide.modelo.php";
require_once "modelos/sucursales.modelo.php";
require_once "modelos/revista.modelo.php";
require_once "modelos/videos.modelo.php";

require_once "modelos/rutas.php";

$plantilla = new ControladorPlantilla();
$plantilla->plantilla();
