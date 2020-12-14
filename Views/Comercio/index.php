<table border='1'>
	<tr>
		<td>Nombre</td>
		<td>Nit</td>
		<td>Direccion</td>
		<td colspan=2 >Acciones</td>
	</tr>
<?php
	foreach ($comercios as $comercio) { ?>
		
			<tr>
				<td><?php echo $comercio->nombre; ?></td>
				<td><?php echo $comercio->nit;?></td>
				<td><?php echo $comercio->direccion;?></td>
				<td><a href="Controllers/comercio_controller.php?action=update&id=<?php echo $comercio->id ?>">Actualizar</a> </td>
				<td><a href="Controllers/comercio_controller.php?action=delete&id=<?php echo $comercio->id ?>">Eliminar</a> </td>
			</tr>		
	<?php } ?>
</table>