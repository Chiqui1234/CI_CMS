<!doctype html>
<html lang="es">

 <head>
 	<?php include_once("internal/info.php"); ?>
 	<title>Chiqui's | El tanquesito empresarial</title>
 	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
	<link rel="stylesheet" href="plug-in/blog/css/estilo.css" />
	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
<body>
<!-- JS SDK para Facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>
<!-- -->

<?php
if( (isset($_COOKIE["emailCookie"])) && (isset($_COOKIE["contrasenaCookie"])) ) {
	$rutaUsuario = "user/".strip_tags(htmlspecialchars($_COOKIE["emailCookie"]));
		include_once($rutaUsuario."/credenciales.php");
 		include_once($rutaUsuario."/opciones-de-perfil.php");
 		include_once($rutaUsuario."/configuracion.php");
}
?>

<div id="portada" style="background-image:url(img/portada/space1.jpg);"></div>

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
 	<div id="titulo">El tanquesito empresarial</div>
	<div id="autor">mariarossi@outlook.com</div>
	<div id="fecha">27.12.18</div>
 </div>
<div id="contenido">
<div id="post">wadsadasda</div>
<br />
<hr />
<br />
<div class='fb-comments' data-href='localhost/el-tanquesito-empresarial.php' data-width='100%'' data-numposts='2'></div>
</div>
</body>
</html>