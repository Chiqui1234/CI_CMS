<?php
$location = "../../../";
require("../business.php"); // Vital para comprobar que la cuenta a dónde se pagará no fue modificada

require("../../../function/purify.php");
// Recibo todos los datos
$start = array (
    $_REQUEST["cmd"],
    $_REQUEST["business"], // ID de mi empresa
    $_REQUEST["lc"],
    $_REQUEST["item_name"], // Nombre del producto
    $_REQUEST["item_name_url"], // URL del producto
    $_REQUEST["item_number"], // Unidades del item_name
    $_REQUEST["amount"],
    $_REQUEST["currency_code"],
    $_REQUEST["button_subtype"],
    $_REQUEST["no_note"],
    $_REQUEST["cn"],
    $_REQUEST["no_shipping"],
    $_REQUEST["add"],
    $_REQUEST["bn"]
);
$end = sanear($start, 14);

$dataFile = $location."tienda/".$end[4]."/data.php";

// Chequeo que no se hayan manipulado

if( file_exists($dataFile) && $end[0] === "_cart" && $end[1] === $businessCode && $end[2] === "AL" ) {
    require($dataFile); // Importo el producto en cuestión
    echo "end[3]: ".$end[3];
    echo "<br/>productName: ".$productName;
    echo "<br/>end[6]: ".$end[6];
    echo "<br/>price: ".$price;
    if($end[3] === $productName && $end[6] === $price) {
    echo '<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
        <input type="hidden" name="cmd" value="'.$end[0].'">
        <input type="hidden" name="business" value="'.$end[1].'">
        <input type="hidden" name="lc" value="'.$end[2].'">
        <input type="hidden" name="item_name" value="'.$end[3].'">
        <input type="hidden" name="item_number" value="'.$end[5].'">
        <input type="hidden" name="amount" value="'.$end[6].'">
        <input type="hidden" name="currency_code" value="'.$end[7].'">
        <input type="hidden" name="button_subtype" value="'.$end[8].'">
        <input type="hidden" name="no_note" value="'.$end[9].'">
        <input type="hidden" name="cn" value="'.$end[10].'">
        <input type="hidden" name="no_shipping" value="'.$end[11].'">
        <input type="hidden" name="add" value="'.$end[12].'">
        <input type="hidden" name="bn" value="'.$end[13].'">
         <div id="payPayBtn">
            <input type="submit" name="submit" value="" alt="PayPal - The safer, easier way to pay online!">
         </div>
        </form>';
    } else {
        require($location."error/form.php");
        echo "Error 10000: edición desautorizada (y ejecución) de datos críticos de un plugin";
        //formReporter(10000); // Error 10000: edición desautorizada (y ejecución) de datos críticos de un plugin
    }
} else {
    require($location."error/form.php");
    echo "Error 10010: manipulación de formularios de un plugin";
    //formReporter(10010); // Error 10010: manipulación de formularios de un plugin
}
?>
