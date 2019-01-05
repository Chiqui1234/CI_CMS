<?php
$htmlCode = $_REQUEST['htmlCode'];
$file = $_REQUEST['file'];
$route = "../../include/".$file.".php";
if($file === "mainMultimedia" || $file === "footer") {
    $fileToEdit = fopen($route, "w") OR DIE("<div id='root'>No se puede editar el archivo, ¿quizás hay un problema de permisos?</div>");
    fwrite($fileToEdit, $htmlCode);
    fclose($fileToEdit);
    echo "<div id='root'>Archivo editado: ".$route." || <a href=''>Volver</a></div>";
} else {
    echo "<div id='root'>Nombre de archivo no soportado.</div>";
}
?>