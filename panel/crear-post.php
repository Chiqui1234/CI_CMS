<?php include_once("info.php"); ?>
<!doctype html>
<html lang="es">

 <head>
 	<title><?php echo $nombreDelSitio; ?> | Crear post</title>
 	<?php include_once("header-html.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>

<?php
include_once("../function/sesion.php"); // Importo el chequeo de LogIn
if(chequeoSesionActiva()) {
	if( isset($_REQUEST["titulo"]) && isset($_REQUEST["texto"]) ) { // Si se recibe un título y un texto, se puede postear. Podemos prescindir de una portada y una sinopsis, aunque ésta última se extrae del texto por defecto

			if(empty($start[0])) {
				$start[0] = "img/portada/blackwidow-chroma.jpg";
			}
		
		include_once("../funcion/sanear.php"); // Importo la función de saneamiento de datos
		$start = array(
			$_REQUEST["portada"],
			$_REQUEST["tipo"], // ¿Texto o video? Si es un texto el icono será /img/icon/news.svg, si es un video, será /img/icon/video.svg
			$_REQUEST["titulo"],
			$_REQUEST["sinopsis"],
			$_REQUEST["texto"],
			$_REQUEST["fecha"] = date("d.m.y")
		);
		sanear($start, 6); // Portada[0], Tipo [1], Título[2], Sinopsis[3], Texto[4] (contenido del post) y Fecha[5].

		if($start[1] == "texto") { // Determino que icono usar para identificar el contenido que está a punto de crearse
			$tipoImg = "img/icon/news.svg";
		} else {
			$tipoImg = "img/icon/video.svg";
		}

		$duracion = "15m"; // Próximamente tendré que llamar a una función que determine cuánto se tarda en leer el post o extraiga el tiempo del video
		$favsImg = ""; // La ruta al logo de tu navegador, con una estrella en una esquina

		/*Esta variable se inserta dentro de la plantilla estándard */
		$post = '<div id="centrado">
			<div id="navegador">
				<div id="informacion">
					<div id="infoRapida"> <!-- No más de 32px de ancho -->
						<div class="tipoDePost" style="background-image:url('.$tipoImg.');"></div>
						<div class="duracion">'.$duracion.'</div>
					</div>
					<div id="titulo">'.$start[2].'</div>
					<div id="autor">Por <strong>'.$emailUsuario.'</strong> el '.$start[5].'.</div>
				</div>

				<div id="accesoRapido"> <!-- No más de 32px de ancho -->
					<div class="guardar"></div> <!-- Botón para guardar post en favoritos de la cuenta -->
					<div class="favs" style="background-image:url('.$favsImg.');"></div> <!-- Representado por el logo de tu navegador y una estrellita en una esquina, sirve para guardar en favoritos de tu web browser -->
				</div>
			</div>

			<div id="post">
			'.$start[4].'
			</div>
		</div>
		';
	} else {
		echo '<div id="centrado">Te faltó escribir el título o contenido del post.</div>';
	}

/* Caracteres que serán removidos del nombre de archivo .php, ya que podrían romper la dirección web en
	el servidor, además de que complica la escritura de ésta.
	Además, recorta el nombre de archivo a un máximo de 65 caracteres. */
$caracteresAReemplazar = array("¿", "?", "¡", "!", "¬", "|", "°", "'", '"', "#", "$", "%", "&", "/", "(", ")", "=", "á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", " ");
$nombreArchivo = strtolower(str_replace($caracteresAReemplazar, "-", $tituloSaneado));
$numeroArchivoAleatorio = rand(0, 9999);
$enlaceArchivo = $_SERVER['HTTP_HOST']."/".$nombreArchivo.".php";

// Para código CSC (Código simplificado de Chiqui)
$codigoAReemplazar = array("[", "]", "[/");
$codigoReemplazador = array("<", ">", "</");
$textoSaneadoCodeado = strtolower(str_replace($codigoAReemplazar, $codigoReemplazador, $textoSaneado));

// Plantilla para agregar post al listado del blog
$paginaAlListado = '
<a href="'.$nombreArchivo.'.php"><li style="background-image:url('.$portadaSaneada.');">
		<div id="texto">
			<div class="titulo">'.$tituloSaneado.'</div>
			<div class="sinopsis">'.$sinopsisSaneada.'</div>
		</div>
</li></a>';

// Escribimos en el archivo /plug-in/lista/1.php
$lista = fopen("../plug-in/blog/lista/1.php", "r+");
$contenidoExistente = file_get_contents("../plug-in/blog/lista/1.php");
fwrite($lista, $paginaAlListado);
fwrite($lista, $contenidoExistente);
fclose($lista);

// Plantilla para agregar post al listado del blog
$postAlListado = '<a href="'.$nombreArchivo.'.php"><li>'.$tituloSaneado.'</li></a>';

/* Debido a que el usuario acaba de crear un post, también debe tomar las credenciales, tomar $post
y convertirla a TRUE	*/
$credencialesCaptura = fopen($rutaUsuario."/credenciales.php", "w");
$nuevasCredenciales = '<?php $post=true; $emailUsuario="'.strip_tags(htmlspecialchars($_COOKIE["emailCookie"])).'"; $contrasenaUsuario="'.strip_tags(htmlspecialchars($_COOKIE["contrasenaCookie"])).'"; $diaDeRegistro="'.$diaDeRegistro.'"; $rank='.$rank.'; /* 0: administrador | 1: autor | 2: visitante */ ?>';
fwrite($credencialesCaptura, $nuevasCredenciales);
fclose($credencialesCaptura);

//
// Le agregamos el post al perfil de su autor
$listaCreador = fopen($rutaUsuario."/mis-posts.php", "r+");
	if($post) {
		$listaExistente = file_get_contents($rutaUsuario."/mis-posts.php"); /* Si $post es true, tiene que tomar
		el archivo dónde se listan los posts, así no sobre-escribe los posts anteriores */
	} else {}
fwrite($listaCreador, $postAlListado);
	if($post) {
		fwrite($listaCreador, $listaExistente); /* Si $post es true, tiene que tomar
		el archivo dónde se listan los posts, así no sobre-escribe los posts anteriores */
	} else {}
fclose($listaCreador);
//
$paginaDelPost = '<!doctype html>
<html lang="es">

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
<div class='fb-comments' data-href='".$enlaceArchivo."' data-width='100%'' data-numposts='2'></div>
</div>
</body>
</html>";
?>

<div id="contenido" style="margin-top:62px;">

<?php
if(file_exists("../".$nombreArchivo.".php")) {
	$rutaDelArchivo = "../".$nombreArchivo.'-'.$numeroArchivoAleatorio.".php";
	echo '<p>Este nombre de post ya existe. Igualmente, será publicado con una <strong>cifra aleatoria</strong> al final de la	dirección, para evitar sobreescribir un post de otro redactor.</p>';
	echo '<p>Ingresá a tu post: <a href="'.$rutaDelArchivo.'">'.$tituloSaneado.'</a>.</p>';
	echo '<p>¡Gracias por tu aporte! Recordá que <a href="usuario/'.$emailUsuario.'/backup/index.php">acá</a> tenés tus backups de todo lo que escribiste.</p>';
	$post = fopen($rutaDelArchivo, "w");
			fwrite($post, $paginaDelPost);
			fclose($post);
	// Tengo que crear el archivo especial para el listado
	// Esto me va a servir para cuándo esté desarrollando al buscador
	// Buscará directamente en plug-in/blog/lista/
	$postListadoTemplate = '<li>
							<div id="titulo">example</div>
							<div id="subtitulo">example sub</div>
							<div id="descripcion">descripcion sub</div>
							</li>';
	$postListado = fopen("../plug-in/blog/lista/".$nombreArchivo."-".$numeroArchivoAleatorio.".php", "w");
			fwrite($postListado, $postListadoTemplate);
			fclose($postListado);
 } else {
 	$rutaDelArchivo = "../".$nombreArchivo.'.php';
 	$post = fopen($rutaDelArchivo, "w");
			fwrite($post, $paginaDelPost);
			fclose($post);
 	echo "<p>Gracias por tu aporte, ¡en serio!</p>";
 	echo '<p>Tenés tu entrada en el <a href="'.$rutaDelArchivo.'">siguiente link</a>.</p>';
 	echo '<p>Recordá que <a href="usuario/'.$emailUsuario.'/backup/index.php">acá</a> tenés tus backups de todo lo que escribiste.</p>';
 }
} else {
	echo '<div id="centrado" style="margin-top: 62px;">No iniciaste sesión, así que no tenés permisos para crear un post.</div>';
}
?>
</div>
</body>
</html>
