<?php
function htmlList(array $info, $friendlyRoute) {
    require_once("../../internal/info.php");

    $dateData = getdate(); 
    $day = $dateData["mday"];
    $month = $dateData["mon"];
    $hours = $dateData["hours"];
    $minutes = $dateData["minutes"];

    $template = '
    <li style="background-image:url(\''.$info[2].'\');"><a href="'.$friendlyRoute.'">
    <div class="title">'.$info[0].'</div>
    <div class="category">'.$day.'/'.$month.' a las '.$hours.':'.$minutes.'</div>
    </a></li>
    ';
    
    return $template;
}
?>