<!doctype html>
    <html lang="es">
    
     <head>
         <?php require_once("../../internal/info.php"); /* Bajo dos directorios porque el post está en $category/$title */ ?>
         <title>Segundo testeo | <?php echo $nombreDelSitio; ?></title>
         <?php include_once(locacion()."internal/header.php"); ?> <!-- Para insertar estilos CSS -->
         <meta charset="UTF-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
     </head>
    <body>
    <style>
    :root {
        --linkColor: #ff3b35;
	    --linkHover: #ffc637;
    }
    </style>
    <?php include_once(locacion()."template/main/include/nav.php"); ?>
    
    <div id="root">
        <div class="portrait" style="background-image:url('https://i.imgur.com/modfrSL.jpg');">
        <div class="title">Segundo testeo</div>
        <?php require_once("author.php"); ?>
        <div class="author">@<?php echo $owner; ?></div>
        </div>
            <div class="post">
                <div id='rect' style='background-image:url("https://i.imgur.com/modfrSL.jpg");'></div>
Foto del Nissan 370Z en Avant Garde, sacada de Imgur!

Recordá que el creador de posts, por ahora, es bastante básico. Falta un botón para links, emojis y un detector de saltos de línea. Pero ésto va caminando...
            </div>
        <div class="comments"><?php include_once("../../plug-in/fancyComments/include/mini.php"); ?></div>
    </div>
    </body>
    </html>
    