<?php
function addPostToList(array $end, $route, $friendlyTitle) {
    require_once("htmlList.php"); // Importo la función que tiene el template, haciendo de cuenta que estoy un directorio abajo
    $htmlListFinal = htmlList($end, $end[3]."/".$friendlyTitle);
    $htmlListFile = fopen($route, "a"); // Acá agrego el post a la lista. $route es relativa al directorio raíz
    fwrite($htmlListFile, $htmlListFinal);
    fclose($htmlListFile);
}
?>