<p>Bienvenido al register peticion pago..!</p>
<form action='Controllers/peticion_pago_controller.php' method='post'>
    <input type='hidden' name='action' value='register'>
    <table>
        <tr>
            <td><label>Descripción pago:</label></td>
            <td><input type='text' name='descripcion'></td>
        </tr>
        <tr>
            <td><label>Monto: </label></td>
            <td><input type='text' name='monto'></td>
        </tr>
        <tr>
            <td><label>Comisión: </label></td>
            <td><input type='text' name='comision'></td>
        </tr>
        <tr>
            <td><label>Franquisia Tarjeta:</label></td>
            <td><input type='text' name='franquisia'></td>
        </tr>
        <tr>
            <td><label>Comercio: </label></td>
            <td>
                <select name='comercio_id'>
                    <option selected>Seleccione un comercio</option>
                    <?php
                    foreach ($comercios as $comercio) { ?>
                        <option value="<?php echo $comercio->id; ?>"><?php echo $comercio->nombre; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
        <td><label>Forma pago: </label></td>
            <td>
                <select name='forma_pago_id'>
                    <option selected>Seleccione una forma de pago</option>
                    <?php
                    foreach ($forma_pagos as $forma_pago) { ?>
                        <option value="<?php echo $forma_pago->id; ?>"><?php echo $forma_pago->forma_pago; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
    </table>

    <input type='submit' value='Guardar'>
</form>