<!doctype html>
    <html lang="es">
    <head>
      <?php include_once("../../internal/info.php"); ?>
      <title><?php echo $nombreDelSitio; ?></title>
      <?php include_once("../../internal/header.php"); ?> <!-- Para insertar estilos CSS -->
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      <?php
      if( file_exists("credenciales.php") ) {
      include_once("credenciales.php");
        if(!$active) {
          $editarCredenciales = fopen("credenciales.php", "r+");
          $nuevasCredenciales = "<?php $activoUsuario=0; $aliasUsuario=test; $emailUsuario="santiagogimenez@outlook.com.ar"; $contrasenaUsuario="test1234"; $diaDeRegistro="01.05.19"; $rank=2; /* 0: administrador | 1: autor | 2: visitante */ ?>");
          fwrite($editarCredenciales, $nuevasCredenciales);
          fclose($editarCredenciales);
          echo "<p>¡Tu cuenta fue activada!</p>";
        } else {
          echo "<p>Tu cuenta fue activada anteriormente.</p>";
        }
      }
      ?>
    </body>
    </html>