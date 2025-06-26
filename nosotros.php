<?php
require 'includes/funciones.php';

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Conoce sobre nosotros</h1>

    <div>
        <picture>
            <source srcset="build/img/nosotros.webp" type="image/webp">
            <source srcset="build/img/nosotros.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
        </picture>
    </div>
    <div class="texto-nosotros">
        <blockquote>
            25 años de experiencia
        </blockquote>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A saepe odio laboriosam velit sint, repellendus illo tempore fugiat ipsam doloremque nam reprehenderit exercitationem minima ratione ullam id dicta ipsa! Optio.</p>

        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit nostrum corrupti repellendus accusantium. Culpa sed doloremque illo, nulla reiciendis vel perferendis maiores maxime totam impedit, esse voluptatem placeat qui officiis.</p>
    </div>

    <section class="contenedor seccion">
        <h1>Más sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>seguridad</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, placeat quidem, pariatur minus
                    suscipit aliquid voluptatum fuga ex ea sunt non hic? Accusantium dignissimos, libero nesciunt
                    quibusdam officia velit minus!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>precio</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, placeat quidem, pariatur minus
                    suscipit aliquid voluptatum fuga ex ea sunt non hic? Accusantium dignissimos, libero nesciunt
                    quibusdam officia velit minus!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>tiempo</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, placeat quidem, pariatur minus
                    suscipit aliquid voluptatum fuga ex ea sunt non hic? Accusantium dignissimos, libero nesciunt
                    quibusdam officia velit minus!</p>
            </div>
        </div>
    </section>
</main>

<?php
incluirTemplate('footer');
?>
