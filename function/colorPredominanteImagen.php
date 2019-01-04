<?php
function colorPredominanteImagen($imgLink) {
  $imagen=imagecreatefromjpeg($imgLink);
  $thumb=imagecreatetruecolor(1,1); imagecopyresampled($thumb,$imagen,0,0,0,0,1,1,imagesx($imagen),imagesy($imagen));
  return strtoupper(dechex(imagecolorat($thumb,0,0)));
}
function colorTextoIdeal($imgLink) {
  // 5d546b... de 5 para abajo el fondo es oscuro, asi que hay que poner un texto claro!
  $fondo = colorPredominanteImagen($imgLink);
  if($fondo[0] == '1' || $fondo[0] == '2' || $fondo[0] == '3' || $fondo[0] == '4' || $fondo[0] == '5') {
      return "fff";
  } else {
    return "000";
  }
}
?>
