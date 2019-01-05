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
  <?php include_once("function/sesion.php");
  isLogIn();
?>

<!-- Header / Menú -->
<?php include_once("template/main/include/nav.php"); ?>

<?php include_once("template/main/include/sidebar.php"); ?>

<div id="contenido">
  <div id="portada"><?php include_once("template/main/include/mainMultimedia.php"); ?></div>
</div>

<!-- Arranca lo bueno -->
<!--<div id="centrado">-->
  
  <div id="reviews">

      <div id="separador" style="width: 70%;">
            <div class="texto" id="reviewsNav">Reviews</div>
      </div>

      <ul>
        <li style="background-image:url('reviews/el-tanquesito-empresarial/portada-thumb.jpg');"><div id="caja"><div id="titulo">El tanquesito empresarial</div></div></li>
        <li style="background-image:url('reviews/review-a-un-x370-gaming-xpower/portada-thumb.jpg');"><div id="caja"><div id="titulo">Review a un X370 Gaming XPower</div></div></li>
        <li style="background-image:url('reviews/revisitando-hawai/portada-thumb.jpg');"><div id="caja"><div id="titulo">Revisitando Hawai</div></div></li>
        <li style="background-image:url('reviews/review-a-fedora-29/portada-thumb.jpg');"><div id="caja"><div id="titulo">Review a Fedora 29</div></div></li>
      </ul>

  </div>



  <div id="notas">
      <div id="separador" style="width: 70%;">
            <div class="texto" id="notasNav">Notas</div>
      </div>

    <div id="ver-todo"><a href="blog.php">ver todo</a></div>
    <div class="lista"><ul>
      <?php include_once("notas/notas.php"); ?>
    </ul></div>
    <div class="imagen"><div class="subtitulo">SATA 3 vs NVME: De la teoría a la práctica hay un largo trecho</div></div>
  </div>

<!-- </div> Cierre del id=centrado --> 

<!-- Pie de página -->
<?php include_once("template/main/include/footer.php"); ?>
<script src="template/main/js/video-responsive.js"></script>
</body>
</html>
