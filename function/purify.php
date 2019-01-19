<?php
/* Esta función recibe entrada de datos del usuario y las devuelve saneadas */
function sanear(/*array */$start, $n) {
    // $start = array dónde se introduce cada variable a sanear
    // $n cantidad de variables a sanear
    $end = array($n);
    for($i = 0; $i < $n;$i++) {
        $end[$i] = htmlspecialchars(strip_tags($start[$i])); // Se desformatea el texto y eliminan etiquetas HTML
    }
    return $end; // Se devuelve cada valor del array en el mismo órden en el que se envió
}
    /* ONLY FOR TESTING! c:
        $test = array("<script>alert('hack');</script>", "<b>hereje</b>", "<html lang='es'>"); // Load the function with 3 arguments
        var_dump(sanear($test, 3)); // Dump to see how htmlspecialchars & strip_tags works ;D
    */
?>