<?php include_once("../template/main/include/style.php"); ?>
<div class="box mainMultimedia">
    <div class="column">
        <p>Colocá el código HTML del video o imágen que querés que aparezca al principio del tema. Tu código anterior era:</p>
        <textarea id="old"><?php include_once("../template/main/include/mainMultimedia.php"); ?></textarea>
    </div>

    <div class="column">
        <p>Tu código actual...</p>
        <form action="../template/main/configuration/function/edit.php" method="post">
        <!-- Recordar agregarle id="video" al código del usuario, para que vía javascript se adapte a todo el ancho de la pantalla --> 
            <textarea name="htmlCode"></textarea>
            <input type="hidden" value="mainMultimedia" /> <!-- Le envío el valor "mainMultimedia" para que la función a la que llamo
            sepa que tiene que editar <3 -->
            <input type="submit" value="Actualizar" />
        </form>
    </div>
</div>