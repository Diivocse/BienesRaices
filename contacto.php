<?php
require 'includes/funciones.php';

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Contacto</h1>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen">
    </picture>

    <h2>Llene el formulario de de contacto</h2>

    <form action="" class="formulario">
        <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu nombre" id="nombre">

            <label for="email">E-Mail</label>
            <input type="text" placeholder="Tu Email" id="email">

            <label for="telefono">Telefono</label>
            <input type="tel" placeholder="Tu telefono" id="telefono">

            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje">Mensaje</textarea>
        </fieldset>

        <fieldset>
            <legend><label for="">Vende o compra</label></legend>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>
            <label for="opciones">Vende o compra</label>
            <select id="opciones">
                <option value="" disabled selected>— Seleccionar —</option>

                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>

            </select>

            <label for="presupuesto">Precio o presupuesto</label>
            <input type="text" typer="number" placeholder="Tu precio o presupuesto" id="presupuesto">
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>
            <p>¿Cómo desea ser contactaco?</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                <label for="contactar-telefono">Email</label>
                <input name="contacto" type="radio" value="email" id="contactar-email">
            </div>

            <p>Si eligió telefono, elija la fecha y la hora</p>
            <label for="fecha">Fecha: </label>
            <input type="date" id="fecha">

            <label for="fecha">Hora: </label>
            <input type="time" id="hora" min="09:00" max="18:00">
        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
