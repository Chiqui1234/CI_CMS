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

<?php require("data.php"); ?>
<?php require("../../plug-in/payPayShop/business.php"); ?>

<div id="root">
  <!-- Navegación -->
  <?php include_once(locacion()."template/main/include/nav.php"); ?>

  <?php include_once(locacion()."template/main/include/sidebar.php"); ?>

<div id="store">
    <div id="image" style="background-image:url('img0.jpg');"></div>
    
    <div class="imgSelector"><ul>
        <li><a href="#">1</a></li>
        <li><a href="#image2">2</a></li>
    </ul></div>

    <div class="cartTools">
        <?php require(locacion()."plug-in/payPayShop/include/addToCart.php"); 
        addToCartBtn("data.php");?>
    </div>
</div>

</div> <!-- Cierre "root" -->
</body>
</html>
