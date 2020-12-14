<p>Bienvenido al register comercio..!</p>

<form action='Controllers/comercio_controller.php' method='post'>
	<input type='hidden' name='action' value='register'>
	<input type='hidden' name='rol_id' value="2">
	<table>
		<tr>
			<td><label>Nombre:</label></td>
			<td><input type='text' name='nombre'></td>
		</tr>
		<tr>
			<td><label>Nit: </label></td>
			<td><input type='text' name='nit'></td>
		</tr>
		<tr>
			<td><label>Direccion: </label></td>
			<td><input type='text' name='direccion'></td>
		</tr>
		<tr>
			<td><label>Usuario:</label></td>
			<td><input type='text' name='usuario'></td>
		</tr>
		<tr>
			<td><label>Contraseña: </label></td>
			<td><input type='password' name='clave'></td>

		</tr>
	</table>

	<input type='submit' value='Guardar'>
</form>