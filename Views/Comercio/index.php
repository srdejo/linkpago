<div class="row mb-2">
	<div class="col-2">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Registrar un comercio
		</button>
	</div>
</div>

<table class="table table-hover">
	<thead>
		<tr>
			<td>Nombre</td>
			<td>Nit</td>
			<td>Direccion</td>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($comercios as $comercio) { ?>

			<tr>
				<td><?php echo $comercio->nombre; ?></td>
				<td><?php echo $comercio->nit; ?></td>
				<td><?php echo $comercio->direccion; ?></td>
			</tr>
		<?php } ?>

	</tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nuevo comercio</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php require_once('register.php') ?>
			</div>
		</div>
	</div>
</div>