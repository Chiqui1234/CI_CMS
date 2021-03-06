<!--    /plug-in/blog 
        Ésta función, además de crear el post, también lo agrega a la lista correspondiente
        y crea $owner, para que sólo el autor pueda eliminar el post (o en su defecto, un
        administrador)   -->
<!--    El post se crea en $category/$title/ junto a sus datos. Con "dato" me refiero a:
        - El post mismo
        - Imágenes (si hubiera)
        - Almacenamiento de comentarios (si existe un plug-in en un futuro)
        - Tags (para futuras búsquedas)
        - Alias del autor                                                           -->
<?php
if(strpos($_SERVER['PHP_SELF'], "panel/mod") || strpos($_SERVER['PHP_SELF'], "panel/function")) {
    require_once("../../internal/info.php");
} else if(strpos($_SERVER['PHP_SELF'], "internal")) {
    require_once("info.php");
} else {
    require_once("internal/info.php");
}

function addPost($title, $tag, $portrait, $category, $post, $color1, $color2) {

    $prohibitedWords = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "=", " ", "á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "Ä", "Ë", "Ï", "Ö", "Ü", "ä", "ë", "ï", "ö", "ü");
    $friendlyTitle = htmlspecialchars(strip_tags(str_replace($prohibitedWords, "", $title))); // Suprimo espacios y caracteres raros del link

    /* $category/$title es igual a: */ $superRoute = locacion().$category."/".$friendlyTitle;

    if(!file_exists($superRoute)) {
    require_once(locacion()."function/purify.php");

    $start = array($title, $tag, $portrait, $category, $post, $color1, $color2); // Saneo los datos
    $end = sanear($start, 7);
    
    /* Guardo el autor en $category/$title/author.php */ $owner = $_COOKIE["emailCookie"]; // Suele ser el alias del usuario
        
        mkdir($superRoute, 0775); /* Antes de crear cualquier archivo, creo su carpeta :D */

                                                         $ownerFile = fopen($superRoute."/author.php", "w");
                                                         fwrite($ownerFile, "<?php \$owner = '".$owner."'; ?>");
                                                         fclose($ownerFile); // Ya teniendo el archivo creado y editado, lo cierro
    /* Guardo los tags en $category/$title/tag.php */    $tagFile = fopen($superRoute."/tags.php", "a");
                                                         $tagArray = explode(" ", $tag); // Separo los tags en elementos dentro de un array
                                                         $n = count($tagArray);
                                                          for($i=0;$i < $n;$i++){
                                                             fwrite($tagFile, "<?php \$tag".$i." = ".$tagArray[$i]."; ?>"); // Creo una variable con el prefijo "tag" por cada tag encontrado
                                                          }
                                                          fwrite($tagFile, "<?php \$n=".$n."; ?>"); // Guardo la cantidad de tags, para saber hasta dónde recorrer en caso de búsqueda
                                                         fclose($tagFile);
    
    /* Ahora creo el post en la carpeta que le corresponde. En $htmlPost tengo la plantilla HTML del post, dónde le inserto el título, el dueño
    del post, su contenido y otros datos */
    require_once("htmlPost.php"); // Importo la función. 
    $htmlPostFinal = htmlPost($end); /* Con la función importada, ahora le paso los valores del creador del post (comúnmente el creador de posts se visualiza desde panel.php y se trae,
    por lo menos, de panel/include/posts.php) y me devuelve el código completo; que almaceno en mi variable $htmlPostFinal. */
    if(isset($htmlPostFinal)) {
        /* Antes de guardar el archivo, debo convertir las etiquetas a código real */
        $search = array("[b]", "[/b]",
        "[i]", "[/i]",
        "[u]", "[/u]",
        "[li]", "[/li]",
        "[info]", "[/info]",
        "[img]", "[/img]",
        "[br]",
        "[h1]", "[/h1]".
        "[link]", "[/link]",
        "[circle]", "[/circle]",
        "[rect]", "[/rect]"); // Circle y Rect sirven para darle forma a una imágen, para que el párrafo se adapte a él
        $replace = array("<strong>", "</strong>",
        "<i>", "</i>",
        "<u>", "</u>",
        "<ul><li>", "</li></ul>",
        "<div id='info'><div class='logo'></div>", "</div>",
        "<img src='", "' width='100%' />",
        "<br />",
        "<h1>", "</h1>",
        "<a href=\"", "\">link</a>",
        "<div id='circle' style='background-image:url(\"", "\");'></div>",
        "<div id='rect' style='background-image:url(\"", "\");'></div>");
        $htmlPostFinalReplace = str_replace($search, $replace, $htmlPostFinal);

        $htmlPostFile = fopen($superRoute."/index.php", "w"); // Creo el index.php (post) dentro de la carpeta. Esto está bueno porque incluso, nos ahorra el mod_rewrite del .htaccess para tener "URLs amigables"
        fwrite($htmlPostFile, $htmlPostFinalReplace); // Escribo el post
        fclose($htmlPostFile); // Cierro :D
                                                          /* Agrego el post al listado del usuario */
                                                          require("addPostToList.php");
                                                          addPostToList($end, locacion()."user/".$_COOKIE["emailCookie"]."/mis-posts.php", $friendlyTitle);
                                                          /* Por último, agrego el post al listado */
                                                          addPostToList($end, locacion().$category."/list.php", $friendlyTitle);



    echo '<a href="'.$superRoute.'">$superRoute</a>';
    }
    
    } else {
        echo '<p>El nombre del post ya existe.</p>';
    }
}
?>