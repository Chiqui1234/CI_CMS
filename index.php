<?php include_once("internal/info.php"); ?>
<!doctype html>
<html lang="es">

 <head>
 	<title><?php echo $nombreDelSitio; ?></title>
 	<?php include_once("internal/header.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>
    
    <?php include_once("function/sesion.php");isLogIn(); ?>

<div id="root">
  <!-- Navegación -->
  <?php include_once("template/main/include/nav.php"); ?>

  <?php include_once("template/main/include/sidebar.php"); ?>
  
    <div class="portrait"><?php include_once("template/main/include/mainMultimedia.php"); ?></div>

  <div id="category">Notas</div>
  <?php include_once("notas/list.php"); ?>

  <div id="category">Reviews</div>
  <?php include_once("reviews/list.php"); ?>
</div> <!-- Cierre "root" -->
</body>
</html>
