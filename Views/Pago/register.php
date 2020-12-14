<p>Bienvenido al register pago..!</p>
<form action='Controllers/pago_controller.php' method='post'>
    <input type='hidden' name='action' value='register'>
    <input type='hidden' name='token' value='<?php echo $token; ?>'>
    <input type='hidden' name='peticion_pago_id' value='<?php echo $peticion_pago->id; ?>'>
    <table>
        <tr>
            <td><label>Descripción pago:</label></td>
            <td><?php echo $peticion_pago->descripcion; ?></td>
        </tr>
        <tr>
            <td><label>Monto: </label></td>
            <td><?php echo $peticion_pago->monto; ?></td>
        </tr>
        <?php if ($peticion_pago->forma_pago_id === 2) { ?>
            <tr>
                <td><label>Comisión: </label></td>
                <td><?php echo $peticion_pago->comision; ?></td>
            </tr>
        <?php } else { ?>
            <tr>
                <td><label>Franquisia Tarjeta:</label></td>
                <td><?php echo $peticion_pago->franquisia; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td><label>Comercio: </label></td>
            <td>
                <?php
                foreach ($comercios as $comercio) {
                    if ($comercio->id === $peticion_pago->comercio_id) { ?>
                        <?php echo $comercio->nombre; ?>
                <?php }
                } ?>
            </td>
        </tr>
        <tr>
            <td><label>Forma pago: </label></td>
            <td>
                <?php
                foreach ($forma_pagos as $forma_pago) {
                    if ($forma_pago->id === $peticion_pago->forma_pago_id) {  ?>
                        <?php echo $forma_pago->forma_pago; ?>
                <?php }
                } ?>
            </td>
        </tr>
        <tr>
            <td colspan="2"><h3><br>Datos de la persona</h3></td>
        </tr>
        <tr>
            <td><label>Nombre:</label></td>
            <td><input type='text' name='nombre'></td>
        </tr>
        <tr>
            <td><label>Apellido:</label></td>
            <td><input type='text' name='apellido'></td>
        </tr>
        <tr>
            <td><label>Dirección:</label></td>
            <td><input type='text' name='direccion'></td>
        </tr>
        <tr>
            <td><label>Correo:</label></td>
            <td><input type='text' name='correo'></td>
        </tr>
        <tr>
            <td><label>Telefono:</label></td>
            <td><input type='text' name='telefono'></td>
        </tr>
        <tr>
            <td colspan="2"><h3><br>Información del pago</h3></td>
        </tr>

        <?php if ($peticion_pago->forma_pago_id === 2) { ?>
            <tr>
                <td><label>Referencia de pago: </label></td>
                <td><input type='text' name='referencia_efecty'></td>
            </tr>
        <?php } else { ?>
            <tr>
                <td><label>Numero de tarjeta:</label></td>
                <td><input type='text' name='numero_tarjeta'></td>
            </tr>
        <?php } ?>
    </table>

    <input type='submit' value='Guardar'>
</form>