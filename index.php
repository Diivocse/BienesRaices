<?php
require 'includes/app.php';

incluirTemplate('header', $inicio = true);
?>

<main class="contenedor seccion">
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
</main>

<section class="seccion contenedor">
    <h2>Casas y depas en venta</h2>


    <?php
    include 'includes/templates/anuncios.php';
    ?>

    <div class="alinear-derecha">
        <a href="anuncios.php" class="boton-verde">VER TODAS</a>
    </div>
    
</section> <!-- seccion contenedor -->

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>lorem</p>
    <a href="contacto.php" class="boton-amarillo">CONTACTANOS</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/webp">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Esctiro el:
                        <span>20/1024</span> por<span> admin</span>
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y
                            ahorrando dinero</p>
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/webp">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p class="informacion-meta">Escrito el:
                        <span>20/1024</span> por<span> admin</span>
                        <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para
                            darle vida a tu espacio</p>
                    </p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>El personal se comportó de una excelente forma, muy buena atención y la casa que me
                ofrecieron cumple con todas mis expectativas
                <p>Diego Ocampo</p>
            </blockquote>
        </div>
    </section>

</div>

<?php
incluirTemplate('footer');
?>