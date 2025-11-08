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

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

estaAutenticado();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('location: /admin');
}

$propiedad = Propiedad::find($id);
$vendedores = Vendedor::all();


$errores = Propiedad::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Asignar los atributos
        $args = $_POST['propiedad'];
        $propiedad->sincronizar($args);
 
        $errores = $propiedad->validar();
        
        //Revisar que el arreglo de errores esté vacío
        if (empty($errores)) {
            
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                
                //Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
 
                //Realiza un resize a la imagen con intervention
                $manager = new ImageManager(new Driver());
                $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);
 
                /*Setear la imagen*/
                $propiedad->setImagen($nombreImagen);
 
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
 
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