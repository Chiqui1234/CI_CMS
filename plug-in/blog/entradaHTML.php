$entradaHTML = '<!doctype html><html lang="es">
 <head>
 	<?php include_once("internal/info.php"); ?>
 	<title>'.$nombreDelSitio.' | '.$tituloSaneado.'</title>
 	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
	<link rel="stylesheet" href="plug-in/blog/css/estilo.css" />
	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
<body>
<!-- JS SDK para Facebook -->
<?php include_once("plug-in/facebook-sdk/source.php"); ?>
<?php include_once("function/chequeoSesionActiva.php");
chequeoSesionActiva(); ?>

<div id="portada" style="background-image:url('.$portadaSaneada.');"></div>

 <div id="menu">
 	<div class="left"><a onclick="window.history.back()"><img src="img/icon/volver.svg" width="32px" /></a></div>
 	<div class="right">
	 <ul>
	 	<?php
	 		if( ($rank==0) || ($rank==1) ) {
	 		?>
	 		<li><a href="panel.php#crearPost">REDACTAR</a></li>
	 		<?php
	 		}
	 	?>
	 	<li><a href="blog.php">BLOG</a></li>
	 	<li><a href="index.php">INICIO</a></li>
	 </ul>
	</div>
 </div>

 <div id="info">
 	<div id="titulo">'.$tituloSaneado.'</div>
	<div id="autor">'.$autorSaneado.'</div>
	<div id="fecha">'.$fecha.'</div>
 </div>
<div id="contenido">
<div id="post">'.$textoSaneadoCodeado."</div>
<br />
<hr />
<br />
<div class="fb-comments" data-href='.$enlaceArchivo.' data-width="100%" data-numposts="2"></div>
</div>
</body>
</html>
';
