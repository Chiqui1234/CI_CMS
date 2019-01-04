<?php
function captchaVisual() {
  $grado = rand(-75,75);
  if($grado < 0) {
    $opcion="ascendente";
  } else if($grado > 0) {
    $opcion="descendente";
  } else {}
  echo "<h3>¿Esta línea asciende o desciende?</h3>";
  echo "<div style='clear: both;'><input type='hidden' name='opcionCorrecta' value='".$opcion."' /><select name='opcion'><option value='ascendente'>Asciende</option><option value='descendente'>Desciende</option></select></div>";
  echo "<div style='width: 100%;height:50px;clear:both;margin-top:30px;'><div style='width: 50px;height:1px;float: left;clear:both;border: 4px solid #212121;transform: rotate(".$grado."deg);'></div></div>";
}
function captchaNumero() {
  $a = rand(0,5);
  $b = rand(0,5);
  $rta = $a+$b;
  echo "¿Cuánto es ".$a." más ".$b."?";
  echo "<div style='clear: both;'><input type='hidden' name='opcionCorrecta' value='".$rta."' /><input type='text' name='opcion' placeholder='Resultado...' />";
}
?>
