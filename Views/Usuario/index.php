<table border='1'>
	<tr>
		<td>Usuario</td>
		<td>Rol</td>
		<td>Email</td>
		<td colspan=2 >Acciones</td>
	</tr>
<?php
	foreach ($usuarios as $usuario) { ?>
		
			<tr>
				<td><?php echo $usuario->usuario; ?></td>
				<td><?php echo $usuario->rol;?></td>
				<td><a href="Controllers/usuario_controller.php?action=update&usuario=<?php echo $usuario->usuario ?>">Actualizar</a> </td>
				<td><a href="Controllers/usuario_controller.php?action=delete&usuario=<?php echo $usuario->usuario ?>">Eliminar</a> </td>
			</tr>		
	<?php } ?>
</table>