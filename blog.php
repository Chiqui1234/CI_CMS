<?php
include_once("internal/info.php");
?>
<!doctype html>
<html lang="es">

 <head>
 	<title><?php echo $nombreDelSitio; ?> | Blog</title>
 	<?php include_once("internal/header.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>
  <?php include_once("function/sesion.php");
  if(isLogIn()) {
    include_once("internal/importUser.php");
  } else {
    //
  }?>
<?php include_once("internal/nav.php"); ?>
<div id="blog" style="margin-top:62px;">
	<ul>
	<?php include_once("plug-in/blog/lista/1.php"); ?>
	<!--<iframe src="plug-in/blog/lista/1.php"></iframe>-->
	</ul>

	<!--<div id="navegadorDePaginas">
		<ul>
		 <li><a onclick="document.getElementById('main').innerHTML = '<iframe src=\'plug-in/blog/lista/1.php\'></iframe>'">1</a></li>
		 <li><a onclick="document.getElementById('main').innerHTML = '<iframe src=\'plug-in/blog/lista/2.php\'></iframe>'">2</a></li>
		</ul>
	</div>-->

</div>
</body>
</html>
