<!doctype html>
    <html lang="es">
    
     <head>
         <?php require_once("../../internal/info.php"); /* Bajo dos directorios porque el post está en $category/$title */ ?>
         <title>Primer testeo | <?php echo $nombreDelSitio; ?></title>
         <?php include_once(locacion()."internal/header.php"); ?> <!-- Para insertar estilos CSS -->
         <meta charset="UTF-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
     </head>
    <body>
    <style>
    :root {
        --linkColor: #353197;
	    --linkHover: #315bbe;
    }
    </style>
    <?php include_once(locacion()."template/main/include/nav.php"); ?>
    
    <div id="root">
        <div class="portrait" style="background-image:url('http://evilnapsis.com/wp-content/uploads/2015/08/php-2.jpg');">
        <div class="title">Primer testeo</div>
        <?php require_once("author.php"); ?>
        <div class="author">@<?php echo $owner; ?></div>
        </div>
            <div class="post">
                <div id='circle' style='background-image:url("https://i.imgur.com/2wph6cn.png");'></div>
¡Ésta es la <strong>primer prueba</strong>! ¿Qué tal se ve?
<ul><li>Ítem 1</li></ul> <ul><li>Ítem 2</li></ul>
Está re copada ;D
<strong>CI_CMS</strong> es la abreviación de <i>ChiquiCMS</i>. El sistema está basado en HTML5 + CSS3 + PHP7, pero habrá una nueva versión bajo NodeJs con alguna base de datos 
linda, como MongoDB.
Seguramente habrás notado que el color del post (en este caso, azúl) aplica a toda la plantilla: desde el mismo post, <a href="../../index.php">los links</a> y la navegación.
            </div>
        <div class="comments"><?php include_once("../../plug-in/fancyComments/include/mini.php"); ?></div>
    </div>
    </body>
    </html>
    