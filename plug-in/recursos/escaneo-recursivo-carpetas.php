<?php
$directorio = opendir("../../usuario");
while($archivo = readdir($directorio)) {
 $i=0;
    if ((!is_file($archivo)) && ($archivo!='.') && ($archivo!='..')) { // Si la devolución de la carpeta es ¨.¨ (dir. actual) o ¨..¨ (saltar al dir. anterior) lo omite.
        	$usuario = array($i => $archivo );
        	echo "<p>".$usuario[$i]."</p>";
	} else {
		//
	}
	clearstatcache(); // Se limpia la caché, debido a que el software está pensado para una numerosa creación de usuarios. En estos casos, la caché puede inutilizar algunas funciones del plug-in RECURSOS.
}

?>