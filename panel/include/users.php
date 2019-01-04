<div class="box users">

	<div class="column">
	 <!-- La carpeta "mod" incluye únicamente los archivos que llaman a las funciones.
	 Las funciones de uso exclusivo administrativo (como crear un usuario) permanecen
	 dentro de la carpeta /panel/functions -->
	 <form action="mod/addUser.php" method="post">
		<input type="text" name="alias" id="alias" placeholder="Nombre de usuario / Alias" onkeyup="userRoute()" />
		<input type="text" name="email" placeholder="E-mail" />
		<select name="rank">
			<option value=0>Administrador</option>
			<option value=1>Redactor</option>
			<option value=2>Comentador</option>
		</select>
	</div>

	<div class="column">
		<input type="password" name="contrasena" placeholder="Contraseña" />
		<input type="password" name="contrasenaRepetida" placeholder="Repetí la contraseña" />
		<select name="active">
			<option value=1>Activar cuenta</option>
			<option value=0>No activar cuenta</option>
		</select>
	</div>

	<div class="column">
		<p id="route"></p>
		<script>
		function userRoute() {
			document.getElementById("route").innerHTML = "La ruta del usuario es /" + document.getElementById("alias").value;
		}</script>
	</div>

	<div class="column">
		<p style="text-align: center;">Todos los campos son obligatorios.</p>
		<input type="submit" value="Crear Usuario" />
	 </form>
	</div>

	
</div>