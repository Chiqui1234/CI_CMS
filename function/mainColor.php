<?php
function mainColor($img) {
  $image=imagecreatefromjpeg($img);
  $thumb=imagecreatetruecolor(1,1);
  imagecopyresampled($thumb,$image,0,0,0,0,1,1,imagesx($image),imagesy($image));
  $mainColor=strtoupper(dechex(imagecolorat($thumb,0,0)));
  echo "<p style='color=#".$mainColor.";'>".(($mainColor - $mainColor % 100000) / 100000)."</p>";
  return "#".$mainColor;
}
?>
