<p>Bienvenido al update comercio..!</p>

<form action='comercio_controller.php' method='post'>
	<input type='hidden' name='action' value='update'>
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
	</table>
		
	<input type='submit' value='Actualizar'>
</form>