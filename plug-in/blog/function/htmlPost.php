<?php
function htmlPost(array $info) { /* $info es un array y contiene: $title, $tag, $portrait, $category, $post; En ese órden. */
    require_once("../../internal/info.php");
    $comments='<div class="comments"><?php include_once("../../plug-in/fancyComments/include/mini.php"); ?></div>'; /* Debería decir:
    <div class="comments"><?php include_once("../fancyComments/include/mini.php"); ?></div>
    Si existe el plug-in fancyComments (u otro, esta variable puede modificarse por otro instalador de algún plug-in de
    comentarios ;D) */

    $template = '<!doctype html>
    <html lang="es">
    
     <head>
         <?php require_once("../../internal/info.php"); /* Bajo dos directorios porque el post está en $category/$title */ ?>
         <title>'.$info[0].' | <?php echo $nombreDelSitio; ?></title>
         <?php include_once(locacion()."internal/header.php"); ?> <!-- Para insertar estilos CSS -->
         <meta charset="UTF-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
     </head>
    <body>
    
    <?php include_once(locacion()."template/main/include/nav.php"); ?>
    
    <div id="root">
        <div class="portrait" style="background-image:url(\''.$info[2].'\');">
        <div class="title">'.$info[0].'</div>
        <div class="author">@'.$_COOKIE["emailCookie"].'</div>
        </div>
            <div class="post">
                '.$info[4].'
            </div>
        '.$comments.'
    </div>
    </body>
    </html>
    ';
    
    return $template;
}
?>