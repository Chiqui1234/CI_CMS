<?php include_once("info.php"); ?>
<!doctype html>
<html lang="es">

 <head>
 	<title><?php echo $nombreDelSitio; ?> | Registrarme</title>
 	<?php include_once(locacion()."internal/header.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>
<?php
require_once(locacion()."function/purify.php");
require_once(locacion()."panel/function/addUser.php");

    $start = array(
        $_REQUEST["alias"],
        $_REQUEST["email"],
        $_REQUEST["contrasena"],
        $_REQUEST["contrasenaRepetida"]
    );
    $end = sanear($start, 4);
    crearUsuario($end[0], $end[1], $end[2], $end[3], 2, 0, 0);

?>
</body>
</html>