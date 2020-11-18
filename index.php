<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
      	<meta charset="UTF-8">
      	<meta property="og:url"           		content="http://landingpage.eshost.com.ar/" />
      	<meta property="og:type"          	  content="website" />
      	<meta property="og:title"         		content="landingpage" />
      	<meta property="og:description"       content="Contenido Alternativo" />
      	<meta property="og:image"         	  content="http://landingpage.eshost.com.ar/images/galeria/galeria694.jpg" />
  </head>
  <body>

  </body>
</html>
<?php

require_once "models/gestorSlide.php";
require_once "models/gestorArticulos.php";
require_once "models/gestorGaleria.php";
require_once "models/gestorVideos.php";
require_once "models/gestorMensajes.php";
require_once "models/gestorAlbum.php";

require_once "controllers/template.php";
require_once "controllers/gestorSlide.php";
require_once "controllers/gestorArticulos.php";
require_once "controllers/gestorGaleria.php";
require_once "controllers/gestorVideos.php";
require_once "controllers/gestorMensajes.php";
require_once "controllers/gestorAlbum.php";

$template = new TemplateController();
$template -> template();
			