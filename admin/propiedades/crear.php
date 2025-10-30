<?php

use App\propiedad;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

require 'includes/app.php';

// Funciones
estaAutenticado();
$db = conectarDB();
// Propiedad vacía para inincializar los campos
$propiedad = new propiedad();

// Consultar los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo con mensajes de errores
$errores = propiedad::getErrores();


// Validar que el usuario haya enviado el formulario
// Si el formulario se envía, procesar los datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propiedad = new propiedad($_POST['propiedad']);

    // Generar un nombre único para las imagenes subidas
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new Image(Driver::class);
        $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    $errores = $propiedad->validar();

    if (empty($errores)) {


        
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        $imagen->save(CARPETA_IMAGENES . $nombreImagen);

        $resultado = $propiedad->guardar();

        if ($resultado) {
            // Redireccionar al usuario
            header('Location: /admin?resultado=1');
        }
    }
}

incluirTemplate('header');
?>


<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="crear.php" enctype="multipart/form-data">
        <?php include '../bienesraices_inicio/includes/templates/formulario_propiedades.php'; ?>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer')
?>

<!-- NOTAS -->
<!-- Tener en cuenta en los formularios agregar las caracteristicas de Method GET / POST e igual de action que procesará el formulario -->