<?php

// Cómo subir el archivo
$fichero = $_FILES["file"];
$name = $_POST["nameMagazine"];

// Cargando el fichero en la carpeta "subidas"
move_uploaded_file($fichero["tmp_name"], "../revistas/" . $name . ".pdf");

// Redirigiendo hacia atrás
header("Location: " . $_SERVER["HTTP_REFERER"]);
