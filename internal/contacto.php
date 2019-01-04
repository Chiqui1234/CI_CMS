<div id="contacto">

	<div id="contenido">
	 <div class="email"></div>
	 <div class="tituloSector">Contactanos</div>
	 <div id="reCentrado"><form action="plug-in/formulario-de-contacto/contacto.php" method="post">
		<input type="text" placeholder="Tu nombre completo" name="nombreContacto" />
		<input type="text" placeholder="El email al que querés recibir respuesta" name="emailContacto" />
		<textarea name="mensajeContacto"></textarea>
		<?php include_once("plug-in/captchau/invocador.php");
		captchaNumero(); ?>
		<input type="submit" name="submitt" value="Enviar e-mail" />
	 </form></div>
	</div>

</div>
