<!doctype html>
<html lang="es">

 <head>
 	<?php include_once("internal/info.php"); ?>
 	<title><?php echo $nombreDelSitio; ?></title>
     <?php include_once("internal/header.php"); ?> <!-- Para insertar estilos CSS -->
     <link rel="stylesheet" href="plug-in/buscador/css/estilo.css" />
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
 <body>

<!-- Header / Menú -->
<?php include_once("internal/nav.php"); ?>

<?php include_once("internal/sidebar.php"); ?>

<div id="contenido">
<?php
    $busqueda = $_REQUEST["busqueda"];
    $palabrasBusqueda = explode(" ", $busqueda); // Explode crea un array
?>
<div id="tags"><?php
$i = 0;
for($i=0;$i < 5;$i++){ // Va a buscar 5 tags (que tenga más de 3 caracteres)
    if( strlen($palabrasBusqueda[$i]) > 3 ) {
    echo "#".$palabrasBusqueda[$i]." "; // Imprime las palabras de búsqueda como "tags"
    }
}?>
<div id="buscador">

<form action="buscar.php" method="get">
	<input type="text" name="busqueda" value="<?php echo $busqueda; ?>" placeholder="Buscá lo que quieras..." />
    <input type="submit" value="" />
</form>
</div>

<?php 
/*
    1) Abro el archivo dentro de un bucle para extraer el nombre (desde blog/lista/)
    2) Comparo ese nombre de archivo con $palabrasBusqueda
    3) Si hay coincidencia, expongo ese link
    ahora estoy forzando una búsqueda para comprobar el algoritmo
*/
for($i=0;$i < 10;$i++) {
    $archivoAbierto = fopen("plug-in/blog/lista/esto-es-una-prueba.php", "r");
    fclose($archivoAbierto);
    if( preg_match($palabrasBusqueda[$i], $archivoAbierto, $matches) ) {
        echo "Super test";
    }
    echo $matches[$i];
}
?>
<p>No encontré ningún resultado para tu búsqueda</p>
</div>
 </body>
 </html>