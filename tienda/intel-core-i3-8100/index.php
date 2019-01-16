<?php include_once("../../internal/info.php"); ?>
<?php require_once(locacion()."plug-in/payPayShop/db/prices.php"); ?>
<!doctype html>
<html lang="es">

 <head>
 	<title>Intel Core i3 8100 | Tienda</title>
 	<?php include_once(locacion()."internal/header.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>

<div id="root"> <!-- El root de la tienda es levemente distinto en comparación con el del template original -->
  <!-- Navegación -->
  <?php include_once(locacion()."template/main/include/nav.php"); ?>

  <?php include_once(locacion()."template/main/include/sidebar.php"); ?>
  
    <div class="image" style="background-image:url('img.jpg');"></div>
    <div class="imgSelector"><ul>
        <li></li>
        <li></li>
    </ul></div>

</div> <!-- Cierre "root" -->
</body>
</html>
