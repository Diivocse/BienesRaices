<?php
require 'includes/funciones.php';

incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Casa en venta frente al bosque</h1>

    <picture>
        <source srcset="build/img/destacada.webp" type="image/webp">
        <source srcset="build/img/destacada.jpg" type="image/jpg">
        <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">
    </picture>

    <div class="resumen-propiedad">
        <p class="precio">$3.000.000</p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                <p>3</p>
            </li>
            <li>
                <img class="icono" class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                <p>3</p>
            </li>
            <li>
                <img class="icono" class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                <p>4</p>
            </li>
        </ul>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, illum? Molestiae alias porro reiciendis commodi magnam minus aut earum ducimus, aperiam eaque quas nesciunt doloremque cum, dicta modi a beatae?</p>
    </div>
</main>


<?php
incluirTemplate('footer');
?>