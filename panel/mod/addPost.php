<!--    Intermediario entre el usuario y la función addPost() en 
        /plug-in/blog/function/addPost.php                              -->
<?php
    require_once("../../plug-in/blog/function/addPost.php");
    addPost($_REQUEST["title"], $_REQUEST["tag"], $_REQUEST["portrait"], 
            $_REQUEST["category"], $_REQUEST["post"], $_REQUEST["color1"], $_REQUEST["color2"]);
    
?>