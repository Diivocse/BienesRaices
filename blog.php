<?php
require 'includes/funciones.php';

incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Nuestro blog</h1>

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
                <p>Esctiro el:
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
                <p>Esctiro el:
                    <span>20/1024</span> por<span> admin</span>
                    <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para
                        darle vida a tu espacio</p>
                </p>
            </a>
        </div>
    </article>

    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="build/img/blog3.webp" type="image/webp">
                <source srcset="build/img/blog3.jpg" type="image/webp">
                <img loading="lazy" src="build/img/blog3.jpg" alt="Texto entrada Blog">
            </picture>
        </div>

        <div class="texto-entrada">
            <a href="entrada.php">
                <h4>Guía para la decoración de tu hogar</h4>
                <p>Esctiro el:
                    <span>20/1024</span> por<span> admin</span>
                    <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para
                        darle vida a tu espacio</p>
                </p>
            </a>
        </div>
    </article>

    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="build/img/blog4.webp" type="image/webp">
                <source srcset="build/img/blog4.jpg" type="image/webp">
                <img loading="lazy" src="build/img/blog4.jpg" alt="Texto entrada Blog">
            </picture>
        </div>

        <div class="texto-entrada">
            <a href="entrada.php">
                <h4>Guía para la decoración de tu hogar</h4>
                <p>Esctiro el:
                    <span>20/1024</span> por<span> admin</span>
                    <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para
                        darle vida a tu espacio</p>
                </p>
            </a>
        </div>
    </article>
</main>

<?php
incluirTemplate('footer');
?>