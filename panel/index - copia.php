<!-- PANEL DE CONTROL -->
<!doctype html>
<html lang="es">

 <head>
 	<?php include_once("../internal/info.php"); ?>
 	<title><?php echo $nombreDelSitio; ?> | Panel de control</title>
	<link rel="stylesheet" href="css/panel.css" /> 
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>
<?php
include_once(locacion()."function/sesion.php");
if( chequeoSesionActiva() ) {
	include_once(locacion()."internal/importUser.php");
if( ($rank==0) || ($rank==1) ) { ?>
<div id="sidebar">
	<ul>
	<?php include_once("mod/panel-menu.php"); ?>
	</ul>
</div>

<!-- Acá se colocan noticias sobre el CMS, un resúmen del internal -->
<div id="root">

<h1>Panel de control de <?php echo $nombreDelSitio; ?></h1>
<h5>Chiqui v<?php echo $version; ?></h5>
	<div id="caja">
	 <div class="dash">
	 	<p>Tenés <a href="#misPosts">2 post</a>.</p>
	 	<p>Te registraste el día 2.</p>
	 </div>
	</div>

	<div id="caja">
	 <div class="dash">
	 	<p>La web cuenta con 2 usuarios.</p>
	 	<?php
	 		  if($rank==0) {
				echo '<p>Sos administrador.</p>';
				echo '<p><a href="#plugins">Administrar plugins</a>.</p>';
	 		} else if($rank==1) {
	 			echo '<p>Sos redactor.</p>';
	 		} else if($rank==2) {
	 			echo '<p>Sos un visitante del sitio.</p>';
	 		} else {}
	 	?>
	 </div>
	</div>
</div>

<!-- Acá arrancan todas las solapas. ¡Que comiencen los juegos del hambre! -->
<?php
if( ($rank=0) || ($rank=1) ) { ?>
<div id="crearPost">
<?php include_once("plug-in/blog/codigo_csc.php"); ?>
	<script>function insertAtCaret(areaId, text) {
  var txtarea = document.getElementById(areaId);
  if (!txtarea) {
    return;
  }

  var scrollPos = txtarea.scrollTop;
  var strPos = 0;
  var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
    "ff" : (document.selection ? "ie" : false));
  if (br == "ie") {
    txtarea.focus();
    var range = document.selection.createRange();
    range.moveStart('character', -txtarea.value.length);
    strPos = range.text.length;
  } else if (br == "ff") {
    strPos = txtarea.selectionStart;
  }

  var front = (txtarea.value).substring(0, strPos);
  var back = (txtarea.value).substring(strPos, txtarea.value.length);
  txtarea.value = front + text + back;
  strPos = strPos + text.length;
  if (br == "ie") {
    txtarea.focus();
    var ieRange = document.selection.createRange();
    ieRange.moveStart('character', -txtarea.value.length);
    ieRange.moveStart('character', strPos);
    ieRange.moveEnd('character', 0);
    ieRange.select();
  } else if (br == "ff") {
    txtarea.selectionStart = strPos;
    txtarea.selectionEnd = strPos;
    txtarea.focus();
  }

  txtarea.scrollTop = scrollPos;
}</script>
<div id="cerrar"><a href="#">X</a></div>
 <form action="internal/crear-post.php" method="post" style="clear:both;">
	<input type="text" placeholder="Título del post" name="titulo" class="tituloInput" />
	 <div id="herramientas">
	  <ul>
	 	<li><a href="#" onclick="insertAtCaret('textareaid', '<?php echo $b; ?>');return false;">N</a></li>
	 	<li><a href="#" onclick="insertAtCaret('textareaid', '<?php echo $i; ?>');return false;">I</a></li>
	 	<li><a href="#" onclick="insertAtCaret('textareaid', '<?php echo $s; ?>');return false;">S</a></li>
	 	<li><a href="#" onclick="insertAtCaret('textareaid', '<?php echo $span; ?>');return false;">Énfasis</li>
	 	<li><a href="#" onclick="insertAtCaret('textareaid', '<?php echo $youtube; ?>');return false;">Youtube</a></li>
	  </ul>
	 </div>
	<textarea id="textareaid" name="texto" placeholder="Contenido de tu entrada..."></textarea>
	<script type="text/javascript">
		function abrir() {
			document.getElementByTagName("cajaPortada").style.display="block";
		}
	</script>
 	<div id="seleccionPortada">
 		<div class="titulo"><a onclick="abrir();">Portada</a></div>
 		<div class="cajaPortada">
 			<input type="text" name="portada" placeholder="Link de tu portada" />
 			<input type="file" name="portadaArchivo" value="Subí la imágen de tu portada" />
 		</div>
 	</div>

 	<div id="seleccionTags">
 		<div class="titulo">Tags</div>
 		<div class="cajaTags">
 			<input type="text" name="tags" placeholder="Colocá los tags de tu entrada, separados por coma" />
 		</div>
 	</div>

    <input type="submit" value="Crear post" />
 </form>
</div>

<div id="misPosts">
<div id="cerrar"><a href="#">X</a></div>
 <ul>
  <?php
  include_once($rutaUsuario."/mis-posts.php");
  ?>
 </ul>
</div>

<?php include_once("mod/users.php"); ?>

<div id="plugins">
	<div id="cerrar"><a href="#">X</a></div>
	 <div class="left">
	 	<form action="plug-in/instalar-plugin.php" method="post">
		<input type="file" name="zip" />
		<input type="submit" value="Subir plugin" />
	 	</form>
	 </div>

	 <div class="right">
	 	<p style="clear: both;"><a href="http://cms.olivaires.com.ar">¿Cómo desarrollar un plugin para Chiqui CMS?</a></p>
	 </div>

		<div class="center"><h3>Plugins instalados</h3>
		<ul>
		 <?php include_once("plug-in/instalado/recursos.php"); ?>
		</ul></div>
</div>

<?php }
		} else {
			echo '<div id="centrado"><p>No tenés permiso para acceder al panel de control.</p></div>';
		}
	} else {
		echo '<div id="centrado"><p>No estás logueado, por ende, no tenés permisos para ingresar al panel administrativo.</p></div>';
	}
	?>
</body>
</html>
