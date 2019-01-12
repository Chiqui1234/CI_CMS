<!doctype html>
    <html lang="es">
    
     <head>
         <?php require_once("../../internal/info.php"); /* Bajo dos directorios porque el post está en $category/$title */ ?>
         <title>Testeo de addPostToList() | <?php echo $nombreDelSitio; ?></title>
         <?php include_once(locacion()."internal/header.php"); ?> <!-- Para insertar estilos CSS -->
         <meta charset="UTF-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
     </head>
    <body>
    
    <?php include_once(locacion()."template/main/include/nav.php"); ?>
    
    <div id="root">
        <div class="portrait" style="background-image:url('https://st.motortrendenespanol.com/uploads/sites/45/2014/12/2015-Nissan-370Z-Nismo-front-three-quarters1.jpg');">
        <div class="title">Testeo de addPostToList()</div>
        <div class="author">@Chiqui1234</div>
        </div>
            <div class="post">
                test!
            </div>
        <div class="comments"><?php include_once("../../plug-in/fancyComments/include/mini.php"); ?></div>
    </div>
    </body>
    </html>
    