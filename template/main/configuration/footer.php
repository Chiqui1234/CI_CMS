<?php include_once("../template/main/include/style.php"); ?>
<div class="box footer">
    <div class="column">
        <p>Colocá el código HTML de tu footer. Tu código anterior era:</p>
        <textarea id="old"><?php include_once("../template/main/include/footer.php"); ?></textarea>
    </div>

    <div class="column">
        <p>¿Cuál será tu código actual?</p>
        <form action="../template/main/configuration/function/edit.php" method="post">
        <!-- Recordar agregarle id="video" al código del usuario, para que vía javascript se adapte a todo el ancho de la pantalla --> 
            <textarea name="htmlCode"></textarea>
            <input type="hidden" name="file" value="footer" /> <!-- Le envío el valor "footer" para que la función a la que llamo
            sepa que tiene que editar <3 -->
            <input type="submit" value="Actualizar" />
        </form>
    </div>
</div>