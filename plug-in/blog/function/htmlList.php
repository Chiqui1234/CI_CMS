<?php
function htmlList(array $info, $friendlyRoute) {
    require_once("../../internal/info.php");

    $template = '
    <li style="background-image:url(\''.$info[2].'\');"><a href="'.$friendlyRoute.'">
    <div class="title">'.$info[0].'</div>
    <div class="category">En <span>'.$info[3].'</span></div>
    </a></li>
    ';
    
    return $template;
}
?>