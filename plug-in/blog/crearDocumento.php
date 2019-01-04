<?php
/* PLUG-IN: BLOG V1.0
-----------------------------------------------------------------------------------
-- Este archivo contiene las funciones necesarias para la creación de entradas y --
-- todo lo que ello implica: crear la entrada, agregarla al listado, agregarla   --
-- al perfil de su creador, editar $post como "TRUE" en caso de que no haya			 --
-- creado un post antes (y así habilitar el mostrador de post en perfil.php).		 --
*/
function crearEntrada($titulo, $fecha, $autor, $texto, $tags) {
	$titulo = strip_tags(htmlspecialchars($titulo));
	$fecha = strip_tags(htmlspecialchars($fecha));
	$autor = strip_tags(htmlspecialchars($autor));
	$texto = strip_tags(htmlspecialchars($texto));
	$tags = strip_tags(htmlspecialchars($tags));
	include_once("entradaHTML.php"); /* La base para crear la página de la entrada,
	que se guarda en $entradaHTML */
	if(!file_exists("../".$titulo.".php")) {
		$entrada = fopen("../".$titulo.".php", "w");
		fwrite($entrada, $entradaHTML);
		fclose($entrada);
	} else {
		$entrada = fopen("../".$titulo."-".rand(0,99999).".php", "w");
		fwrite($entrada, $texto);
		fclose($entrada);
	}
}
function agregarEntradaAlListado($titulo, $autor) {
	include_once("entradaListado.php"); /* La base para agregar la página/entrada al
	listado. El código se guarda en la variable $entradaListado */
	// Escribimos en el archivo que contiene el listado: /plug-in/blog/lista/1.php
	$lista = fopen("../plug-in/blog/lista/1.php", "r+");
	$contenidoExistente = file_get_contents("../plug-in/blog/lista/1.php");
	fwrite($lista, $paginaAlListado);
	fwrite($lista, $contenidoExistente);
	fclose($lista);
}

?>
