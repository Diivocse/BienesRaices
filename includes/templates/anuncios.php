<?php 
/* Conexión a la base de datos */
require __DIR__ . '/../config/database.php';
$db = conectarDB();

/* Consulta Query */
$query = "SELECT * FROM propiedades LIMIT $limite";

/* Obtener resultados  */
$resultado = mysqli_query($db, $query);


?>

<div class="contenedor-anuncios">
    <?php 
        while($propiedad = mysqli_fetch_assoc($resultado)):

    ?>
    <div class="anuncio">

            <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Anuncio">

        <div class="contenido-anuncio">
            <h3><?php echo truncarTexto($propiedad['titulo'])  ?></h3>
            <p><?php echo $propiedad['descripcion'] ?></p>
            <p class="precio">$<?php echo $propiedad['precio'] ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p><?php echo $propiedad['wc'] ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                    <p><?php echo $propiedad['estacionamiento'] ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                    <p><?php echo $propiedad['habitaciones'] ?></p>
                </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $propiedad['id'] ?>" class="boton-amarillo-block">ver casas</a>
        </div>
    </div> <!-- anuncio -->
    <?php endwhile; ?>
</div> <!-- contenedor-anuncios -->

<?php mysqli_close($db); ?>