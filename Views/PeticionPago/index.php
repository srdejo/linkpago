<div class="row mb-2">
	<div class="col-2">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Generar Link
		</button>
	</div>
</div>

<table class="table table-hover">
	<thead>
		<tr>
			<td>Descripcion</td>
			<td>Monto</td>
			<td>Estado</td>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($pagos as $pago) { ?>

			<tr>
				<td><?php echo $pago->descripcion; ?></td>
				<td><?php echo $pago->monto; ?></td>
				<?php if ($pago->estado == 'PAGO') { ?>
					<td><?php echo $pago->estado; ?></td>
				<?php } else { ?>
					<td><a href="?controller=pago&action=token&token=<?php echo $pago->forma_pago_id; ?>" title="Pagar"><?php echo $pago->estado; ?></a></td>
				<?php } ?>
			</tr>
		<?php } ?>

	</tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nuevo Link de Pago</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php require_once('register.php') ?>
			</div>
		</div>
	</div>
</div>