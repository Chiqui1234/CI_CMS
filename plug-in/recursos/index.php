<!doctype html>
<html lang="es">

 <head>
 	<title>Configuración | Recursos</title>
 	<meta charset="UTF-8" />
 	<link rel="stylesheet" href="css/panel.css" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 </head>
 
<body>
<?php include_once("inicio.php"); ?>
<h1><?php echo $nombreRecursos." ".$versionRecursos; ?></h1>
<p><?php echo $descripcionRecursos; ?></p>
<ul>
	<li><?php if($estadoRecursos) {
		echo '<a href="desactivar.php">Desactivar</a>';
		} else {
		echo '<a href="activar.php">Activar</a>';
		} ?></li>
</ul>
<br />
 <div id="crearRecurso">
 	<h2>Crear recurso</h2>
 	<?php $clave = md5(rand(0, 99999)); ?>
 	<form action="crear-recurso.php" method="post" enctype="multipart/form-data">
 		<input type="text" placeholder="Título del recurso" name="titulo" style="width: 200px;" /><br />
 		<textarea name="descripcion" placeholder="Descripción del recurso" style="width: 220px;"></textarea><br /><br />
 		<input type="hidden" value="<?php echo $clave; ?>" name="clave" />
 		<p>Clave generada: <strong><?php echo $clave; ?></strong></p>
 		<input type="file" name="recurso" /><br /><br />
 		<input type="submit" name="submit" value="Subir recurso" />
 	</form>
 </div>

 <div id="recursosCreados">
 	<h2>Recursos subidos</h2>
 	<ul>
 	<?php
 	$recursosCarpeta = opendir("recurso");
 	while($imprimirRecursos = readdir($recursosCarpeta)){
 		if( ($imprimirRecursos != ".") && ($imprimirRecursos != "..") ) {
 			echo "<li>".$imprimirRecursos."</li>";
 		} else {}
 	}
 	?>
 	</ul>
 </div>
</body>
</html>