<?php
require 'includes/app.php';

incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Guía para decoración del hogar</h1>

    <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp">
        <source srcset="build/img/destacada2.jpg" type="image/jpg">
        <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">
    </picture>


    <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, illum? Molestiae alias porro reiciendis
        commodi magnam minus aut earum ducimus, aperiam eaque quas nesciunt doloremque cum, dicta modi a beatae?</p>
    </div>
</main>

<?php
incluirTemplate('footer');
?>