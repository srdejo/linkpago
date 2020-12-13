<p>Bienvenido al register usuario..!</p>

<form action='Controllers/usuario_controller.php' method='post'>
	<input type='hidden' name='action' value='register'>
	<table>
		<tr>
			<td><label>Usuario:</label></td>
			<td><input type='text' name='usuario'></td>
		</tr>
		<tr>
			<td><label>Contraseña: </label></td>
			<td><input type='password' name='clave'></td>
		</tr>
		<tr>
			<td><label>Rol:</label></td>
			<td><select name='rol_id'>
					<option selected>Seleccione un rol</option>
					<?php
					foreach ($roles as $rol) { ?>
						<option value="<?php echo $rol->id;?>"><?php echo $rol->rol;?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
	</table>

	<input type='submit' value='Guardar'>
</form>