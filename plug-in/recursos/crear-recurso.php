<!doctype html>
<html lang="es">

 <head>
   <title>Configuración | Recursos</title>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
 
<body>
<?php
if(isset($_FILES['recurso'])){
      /* Variables extras  */
      $titulo = strip_tags(htmlspecialchars($_REQUEST["titulo"]));
      $descripcion = strip_tags(htmlspecialchars($_REQUEST["descripcion"]));
      $clave = strip_tags(htmlspecialchars($_REQUEST["clave"]));
      $caracteresAReemplazar = array("¿", "?", "¡", "!", "¬", "|", "°", "'", '"', "#", "$", "%", "&", "/", "(", ")", "=", "á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", " ");
      $tituloEscapado = strtolower(str_replace($caracteresAReemplazar, "_", $titulo));
      //
      $errors= array();
      $file_name = $_FILES['recurso']['name'];
      $file_size =$_FILES['recurso']['size'];
      $file_tmp =$_FILES['recurso']['tmp_name'];
      $file_type=$_FILES['recurso']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['recurso']['name'])));
      
      $expensions= array("zip","ZIP");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="Esta extensión no está permitida, debe ser en formato zip (archivo comprimido).";
      }
      
      if($file_size > 4194304){
         $errors[]='El archivo debe ser menor a 4MB.';
      }
      
      if(empty($errors)==true){
         if(file_exists("recurso/".$file_name)) {
            $numeroArchivoAleatorio = rand(0, 9999);
            $file_name = $numeroArchivoAleatorio."-".$file_name;
            move_uploaded_file($file_tmp,"recurso/".$file_name);
            echo "¡El recurso se subió con éxito!";
         } else {
            move_uploaded_file($file_tmp,"recurso/".$file_name);
            echo "¡El recurso se subió con éxito!";
         }
      }else{
         print_r($errors);
      }
      /* Ahora creamos la entrada en lista-recursos.php */
      // Plantilla para agregar recurso a lista-recursos.php
      $plantillaRecursoListado = '
      <li>
      <div id="left">
      <div class="titulo">'.$titulo.'</div>
      <div class="descripcion">'.$descripcion.'</div>
      </div>
      <div id="right">
      <?php if($'.$tituloEscapado.'==true) { ?>
      <p>Ya tenés acceso a este recurso. Podés acceder <a href="'.$tituloEscapado.'.php">desde acá</a>.</p>
      <?php } else { ?>
      <p>No tenés acceso a este recurso. ¿Deseás comprarlo? Si ya tenés una clave, <a href="'.$tituloEscapado.'.php">ingresala acá</a>: </p>
      <?php } ?>
      </div>
      </li>
      ';
      // Escribimos en el archivo lista-recursos.php, la que importamos desde recursos.php
      $lista = fopen("lista-recursos.php", "r+");
      $contenidoExistenteL = file_get_contents("lista-recursos.php");
      fwrite($lista, $plantillaRecursoListado);
      fwrite($lista, $contenidoExistenteL);
      fclose($lista);
      //
      // TENEMOS QUE EDITAR RECURSIVAMENTE TODOS LOS ARCHIVOS "recursos adquiridos.php" de cada usuario, para agregar el recurso que se está creando y setearlo a false (volverá a TRUE cuándo se adquiera).
      // Así que escaneamos y editamos el archivo recursos-adquiridos.php de cada usuario.
      $plantillaRecursosAdquiridos = "
      <?php $".$tituloEscapado." = false; ?>";
      $directorio = opendir("../../usuario");
      echo "<h1>Estos usuarios no tienen acceso al recurso</h1>
      <p>Salvo que lo activen mediante la clave: ".$clave.".</p>";
      echo "<textarea style=\"width:50%;height:100px;overflow-y:auto;\">";
      while($archivo = readdir($directorio)) {
       $i=0;
       if ((!is_file($archivo)) && ($archivo!='.') && ($archivo!='..')) { // Si la devolución de la carpeta es ¨.¨ (dir. actual) o ¨..¨ (saltar al dir. anterior) lo omite.
         $usuario = array($i => $archivo );
         $recursosAdquiridos = fopen("../../usuario/".$usuario[$i]."/recursos-adquiridos.php", 'r+');
         $recursosExistentes = file_get_contents("../../usuario/".$usuario[$i]."/recursos-adquiridos.php");
         fwrite($recursosAdquiridos, $plantillaRecursosAdquiridos);
         fwrite($recursosAdquiridos, $recursosExistentes);
         fclose($recursosAdquiridos);
         echo $usuario[$i]."\n";
       } else {
         //
       }
       clearstatcache(); // Se limpia la caché, debido a que el software está pensado para una numerosa creación de usuarios. En estos casos, la caché puede inutilizar algunas funciones del plug-in RECURSOS.
      }
      echo "</textarea>";
      // También debemos crear el archivo "$tituloEscapado.php" para el que quiera comprar/agregar la clave a su cuenta y, así, acceder a los recursos; o bien acceder a éste recurso si ya lo tiene
      $paginaAgregar = '
      <!doctype html>
<html lang="es">

 <head>
   <?php include_once("internal/info.php"); ?>
   <title><?php echo $nombreDelSitio; ?> | Agregar recurso a mi cuenta</title>
   <?php include_once("internal/header.php"); ?> <!-- Para insertar estilos CSS -->
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
 
<body>
<?php
if( (isset($_COOKIE["emailCookie"])) && (isset($_COOKIE["contrasenaCookie"])) ) {
   $rutaUsuario = "user/".strip_tags(htmlspecialchars($_COOKIE["emailCookie"]));
   include_once($rutaUsuario."/credenciales.php");
   include_once($rutaUsuario."/recursos-adquiridos.php");

   echo "No hay opción de compra para este recurso, se te otorgará cuándo vayas a la charla correspondiente.";
} else {
   ?>
   <p>Mensaje bonito por si no estás logueado, prontamente agregaremos soporte a los que no están logueados :D</p>
   <?php
}
?>
</body>
</html>';
      $crearPaginaDeRecurso = fopen("../../".$tituloEscapado.".php", "w");
      fwrite($crearPaginaDeRecurso, $paginaAgregar);
      fclose($crearPaginaDeRecurso);
      ?>
   <ul>
      <li>Archivo enviado: <?php echo $_FILES['recurso']['name'];  ?></li>
      <li>Tamaño (MB): <?php echo $_FILES['recurso']['size']/1000000;  ?></li>
      <li>Tipo: <?php echo $_FILES['recurso']['type'];  ?></li>
      <li><a href="<?php echo '../../'.$tituloEscapado.'.php'; ?>">Accedé a tu recurso</a></li>
   </ul>
<?php } else {
   echo "No se eligió ningún archivo .zip para subir.";
}
?>
</body>
</html>