<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" name="propiedad[titulo]" id="titulo" placeholder="Titulo Propiedad" value="<?php echo s($propiedad->titulo) ?>">

    <label for="precio">Precio:</label>
    <input type="text" name="propiedad[precio]" id="precio" placeholder="Precio Propiedad" value="<?php echo s($propiedad->precio) ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" name="propiedad[imagen]" id="imagen" accept="image/jpeg, image/png">

    <?php if ($propiedad->imagen) : ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
    <?php endif; ?>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion) ?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" name="propiedad[habitaciones]" id="habitaciones" placeholder="EJ: 3" min="1" max="9" value="<?php echo s($propiedad->habitaciones) ?>">

    <label for="wc">Baños:</label>
    <input type="number" name="propiedad[wc]" id="wc" placeholder="EJ: 3" min="1" max="9" value="<?php echo s($propiedad->wc) ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" name="propiedad[estacionamiento]" id="estacionamiento" placeholder="EJ: 3" min="1" max="9" value="<?php echo s($propiedad->estacionamiento) ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <label for="vendedores">Vendedores</label>
    <select name="propiedad[vendedores_id]" id="vendedor">
        <option selected disabled>— Seleccione un vendedor</option>
        <?php foreach($vendedores as $vendedor): ?>
            <option <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : '' ; ?> value="<?php echo s($vendedor->id); ?>"><?php echo s($vendedor->nombre); ?></option>    
        <?php endforeach; ?>
    </select>
</fieldset>