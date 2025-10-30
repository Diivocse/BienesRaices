<?php

/** 
 *      actualizar.php
 *      Este modulo sirve para la actualización de los registros digitados previamente en crear.php
 *      que se actualizan en el area admin del proyecto.
 *
 *      Incluimos las librerias o requisos necesarios del proyecto
 *     • 'includes/app.php': principalmente nos permite conectar a la base de datos
 *     • use Intervention\Image\ImageManager as Image: permite manejar las imagenes del proyecto con vía una librería de composer "Intervention"
 *       trae lo necesario para el manejo de las imagenes.
 *     • use App\Propiedad: Trae el objeto que dispone de funciones previamente trabajadas
 */

require 'includes/app.php';

use Intervention\Image\ImageManager as Image;
use App\Propiedad;
use Intervention\Image\Drivers\Gd\Driver;

estaAutenticado();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('location: /admin');
}

$db = conectarDB();

$propiedad = Propiedad::find($id);

$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

$errores = Propiedad::getErrores();

// Inicializamos los valores de los campos para sostener valores previos digitados previamente por el usuario ante un posible error o no tificación de los campos
 
$titulo = $propiedad->titulo;
$precio = $propiedad->precio;
$descripcion = $propiedad->descripcion;
$habitaciones = $propiedad->habitaciones;
$imagen = $propiedad->imagen;
$wc = $propiedad->wc;
$estacionamiento = $propiedad->estacionamiento;
$vendedores_id = $propiedad->vendedores_id;

/**
 *      Sentencia IF para identificar si el metodo del servidor y de la solicitud es igual a 'POST'
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $args = $_POST['propiedad'];
    $propiedad->sincronizar($args);
    $errores = $propiedad->validar();

    $nombreImagen = md5(uniqid(rand(), true) . ".jpg");
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new Image(Driver::class);
        $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    if (empty($errores))
    {
        $imagen->save(CARPETA_IMAGENES . $nombreImagen);
        $propiedad->guardar();
    }
}

incluirTemplate('header');

?>


<main class="contenedor seccion">
    <h1>Actualizar propiedad</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../bienesraices_inicio/includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer')
?>

<!-- NOTAS -->

<!-- Tener en cuenta en los formularios agregar las caracteristicas de Method GET / POST e igual de action que procesará el formulario -->