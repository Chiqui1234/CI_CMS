<?php
function deleteUser($user, $postStatus, $postMoveTo) {
    // $user = el usuario a eliminar
    // $postStatus = ¿los posts se eliminarán o se moverán a otro usuario?
    // $postMoveTo = en caso de mover a otro usuario, ¿cuál?
    $route = locacion()."user/".$user;
    if($rank == 0) {
        if(file_exists($route)) {
            if($postStatus && $postMoveTo !== NULL) {
                /* mis-posts.php del usuario al que se moverán los posts, simplemente se le modifica dicho archivo con un include_once.
                Y además, se reemplaza la variable $author de cada post, por $postMoveTo */
            } else {
                unlink($route); // Si no hay que eliminar ningún user, borramos todo su contenido DE UNA
            }
        } // Cierre file_exists
    } /* Cierre $rank==0 */ else {
        echo "No tenés el rango necesario para eliminar usuarios, gatito de leche.";
    }
}
?>