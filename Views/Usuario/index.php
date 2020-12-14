<div class="row justify-content-md-center">
	<form action='Controllers/usuario_controller.php' method='post' class="col-md-auto">
		<input type='hidden' name='action' value='login'>
		<div class="mb-3">
			<h3>Token Danny</h3>
		</div>
		<div class="mb-3">
			<label for="usuario">Usuario</label>
			<input type="text" class="form-control" id="usuario" name="usuario">
		</div>
		<div class="mb-3">
			<label for="clave">Contraseña</label>
			<input type="password" class="form-control" name="clave" id="clave">
		</div>
		<div class="d-grid gap-2">
			<button class="btn btn-primary" type="submit">Ingresar</button>
		</div>
	</form>
</div>