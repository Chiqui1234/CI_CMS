<!doctype html>
    <html lang="es">
    
     <head>
         <?php require_once("../../internal/info.php"); /* Bajo dos directorios porque el post está en $category/$title */ ?>
         <title>Bienvenido a CI_CMS | <?php echo $nombreDelSitio; ?></title>
         <?php include_once(locacion()."internal/header.php"); ?> <!-- Para insertar estilos CSS -->
         <meta charset="UTF-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
     </head>
    <body>
    
    <?php include_once(locacion()."template/main/include/nav.php"); ?>
    
    <div id="root">
        <div class="portrait" style="background-image:url('https://www.6seconds.org/wp-content/uploads/2015/07/Welcome-beach.jpg');"></div>
        <div class="title">Bienvenido a CI_CMS</div>
        <div class="author">Chiqui1234</div>
            <div class="post">
                Si podés ver este post, ¡quiere decir que <strong>todo</strong> funcionó bien!
            </div>
        <div class="comments"><?php include_once("../../plug-in/fancyComments/include/mini.php"); ?></div>
    </div>
    </body>
    </html>
    