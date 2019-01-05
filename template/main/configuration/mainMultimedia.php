<?php include_once("../template/main/include/style.php"); ?>
<div class="box mainMultimedia">
    <div class="column"><h3>Editar portada de tu plantilla</h3>
        <p>Colocá el código HTML que te proporciona YouTube, Vimeo, MEGA u otro.</p>
        <form action="../template/main/configuration/function/edit.php" method="post">
        <!-- Recordar agregarle id="video" al código del usuario, para que vía javascript se adapte a todo el ancho de la pantalla --> 
            <textarea name="htmlCode"></textarea>
            <input type="hidden" name="file" value="mainMultimedia" /> <!-- Le envío el valor "mainMultimedia" para que la función a la que llamo
            sepa que tiene que editar <3 -->
            <input type="submit" value="Actualizar" />
        </form>
    </div>
</div>