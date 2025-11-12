<fieldset>
    <legend>Información General</legend>

    <label for="nombre">nombre:</label>
    <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Nombre Vendedor" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" name="vendedor[apellido]" id="precio" placeholder="Apellido Propiedad" value="<?php echo s($vendedor->apellido); ?>">

    <!-- <label for="imagen">Imagen:</label>
    <input type="file" name="vendedor[telefono]" id="imagen" accept="image/jpeg, image/png"> -->

</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="telefono">Telefono</label>
    <input type="text" name="vendedor[telefono]" id="telefono" placeholder="Telefono Vendedor" value="<?php echo s($vendedor->telefono); ?>">
</fieldset>