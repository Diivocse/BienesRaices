<?php
require 'includes/app.php';
use App\Propiedad;

# Obtenemos el ID de la solicitud
$id = $_GET['id'];
$id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
if(!$id){
    header('Location: / ');
}

$propiedad = Propiedad::find($id);

# Consulta con el ID de la solicitud


incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad->titulo; ?></h1>

    <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen de la propiedad">
    </picture>

    <div class="resumen-propiedad">
        <p class="precio">$<?php echo $propiedad->precio; ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                <p><?php echo $propiedad->wc; ?></p>
            </li>
            <li>
                <img class="icono" class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                <p><?php echo $propiedad->estacionamiento; ?></p>
            </li>
            <li>
                <img class="icono" class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                <p><?php echo $propiedad->habitaciones; ?></p>
            </li>
        </ul>

        <p><?php echo $propiedad->descripcion; ?></p>
    </div>
</main>


<?php
incluirTemplate('footer');
?>