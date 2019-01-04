<?php include_once("plug-in/recursos/inicio.php"); ?>
<li>
	<div class="nombre"><?php echo $nombreRecursos." ".$versionRecursos; ?></div>
	<div class="descripcion"><?php echo $descripcionRecursos; ?></div>
	<div class="autor">Autor: <a href="<?php echo $linkRecursos; ?>"><?php echo $autorRecursos; ?></a> | <a href="plug-in/recursos/index.php">Configuración</a></div>
</li>