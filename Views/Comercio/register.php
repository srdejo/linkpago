<form action='Controllers/comercio_controller.php' method='post'>
	<input type='hidden' name='action' value='register'>
	<input type='hidden' name='rol_id' value="2">
	<div class="form-floating mb-3">
		<input type="text" class="form-control" id="floatingInput" placeholder="Tienda Pepita" name='nombre' required>
		<label for="floatingInput">Nombre</label>
	</div>
	<div class="form-floating mb-3">
		<input type="text" class="form-control" id="floatingInput" placeholder="111.222.333.444 - 2" name='nit' required>
		<label for="floatingInput">Nit</label>
	</div>
	<div class="form-floating mb-3">
		<input type="text" class="form-control" id="floatingInput" placeholder="Cr 00 # 00-15" name='direccion' required>
		<label for="floatingInput">Direccion</label>
	</div>
	<div class="form-floating mb-3">
		<input type="text" class="form-control" id="floatingInput" placeholder="Pepita" name='usuario' required>
		<label for="floatingInput">Usuario</label>
	</div>
	<div class="form-floating mb-3">
		<input type="password" class="form-control" id="floatingInput" placeholder="Tienda Pepita" name='clave' required>
		<label for="floatingInput">Contraseña</label>
	</div>

	<input type='submit' value='Guardar' class="btn btn-success float-end">
</form>