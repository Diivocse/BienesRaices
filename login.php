<?php
require 'includes/funciones.php';

incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Ingresar</h1>
    <fieldset>
        <form class="formulario">
            <legend>Ingresa tus datos</legend>
            <label for="email">E-Mail</label>
            <input type="text" placeholder="Tu Email" id="email">

            <label for="password"></label>
            <input type="password" placeholder="Tu password" id="password">
    </fieldset>
        <input type="submit" value="Iniciar sección" class="boton boton-verde">
    </form>
</main>

<?php
include 'includes/templates/footer.php'
?>