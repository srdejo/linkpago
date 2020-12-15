<form action='Controllers/peticion_pago_controller.php' method='post'>
    <input type='hidden' name='action' value='register'>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Tienda Pepita" name='descripcion' required>
        <label for="floatingInput">Descripción pago</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Tienda Pepita" name='monto' required>
        <label for="floatingInput">Monto</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Tienda Pepita" name='comision' required>
        <label for="floatingInput">Comisión</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Tienda Pepita" name='franquisia' required>
        <label for="floatingInput">Franquisia Tarjeta</label>
    </div>
    <div class="form-floating mb-3">
        <select name='comercio_id' class="form-select" id="floatingSelect">
            <option selected>Seleccione un comercio</option>
            <?php
            foreach ($comercios as $comercio) { ?>
                <option value="<?php echo $comercio->id; ?>"><?php echo $comercio->nombre; ?></option>
            <?php } ?>
        </select>
        <label for="floatingInput">Comercio</label>
    </div>
    <div class="form-floating mb-3">
        <select name='forma_pago_id' class="form-select" >
            <option selected>Seleccione una forma de pago</option>
            <?php
            foreach ($forma_pagos as $forma_pago) { ?>
                <option value="<?php echo $forma_pago->id; ?>"><?php echo $forma_pago->forma_pago; ?></option>
            <?php } ?>
        </select>
        <label for="floatingInput">Forma pago</label>
    </div>

    <input type='submit' value='Generar' class="btn btn-success float-end">
</form>