<?php
require 'includes/app.php';

$auth = estaAutenticado();
if(!$auth){
    header('location: /');
}


$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('location: /admin');
}
// Base de datos


$db = conectarDB();

// Tener los datos de la propiedad
$consulta = "SELECT * FROM propiedades WHERE id =" . "{$id}";
/* echo $consulta; */
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);

/* echo "<pre>";
echo var_dump($resultado);
echo "</pre>"; */



// Consultar los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);



// Arreglo con mensajes de errores
$errores = [];

// Inicializamos los valores de los campos para "guardar" valores previos digitados antes de un posible error o no tificación
$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$imagenPropiedad = $propiedad['imagen'];

$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedores_id'];

// Validar que el usuario haya enviado el formulario
// Si el formulario se envía, procesar los datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /*  echo "<pre>";
    var_dump($_POST);
    echo "</pre>"; */

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y-m-d');

    // Asignar files a una variable
    $imagen = $_FILES['imagen'];

    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }

    if (!$precio) {
        $errores[] = "Debes seleccionar un precio";
    }

    if (strlen($descripcion) < 5) {
        $errores[] = "Debes agregar una descripción mayor a 10 caracteres";
    }

    if (!$habitaciones) {
        $errores[] = "Debes seleccionar el número de habitaciones";
    }

    if (!$wc) {
        $errores[] = "Debes seleccionar el número de baños";
    }

    if (!$estacionamiento) {
        $errores[] = "Debes agregar el número de estacionamiento";
    }

    if (!$vendedorId) {
        $errores[] = "Debes seleccionar el vendedor";
    }

    // Validar el tamaño de imagen (1mb)
    $medida = 1000 * 1000;

    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada";
    }


    // Manejador de errores | Revisar que el arreglo (array) esté vacio. Que no contenga ningún error de los validadores

    if (empty($errores)) {
        /* Subida de archivos */
        // Crear Carpeta
        $carpetaImagenes = '././imagenes';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $nombreImagen = '';

        if ($imagen['name']) {
            // Eliminar la imagen al actualizar
            unlink($carpetaImagenes . '/' . $propiedad['imagen']);

            // Generar un nombre único para las imagenes subidas
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreImagen);
        } else {
            $nombreImagen = $propiedad['imagen'];
        }



        // Insertar en la base de datos.
        $query = " UPDATE propiedades SET titulo = '{$titulo}', precio = {$precio}, imagen = '{$nombreImagen}', descripcion = '{$descripcion}', habitaciones = {$habitaciones}, wc = {$wc}, estacionamiento = {$estacionamiento}, vendedores_id = {$vendedorId} WHERE id = {$id}";

        /* echo $query; */

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            // Redireccionar al usuario
            header('location: /admin?resultado=2');
        }
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
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

            <img src="/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small" alt="Imagen de la propiedad">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" name="habitaciones" id="habitaciones" placeholder="EJ: 3" min="1" max="9" value="<?php echo $habitaciones ?>">

            <label for="wc">Baños:</label>
            <input type="number" name="wc" id="wc" placeholder="EJ: 3" min="1" max="9" value="<?php echo $wc ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" name="estacionamiento" id="estacionamiento" placeholder="EJ: 3" min="1" max="9" value="<?php echo $estacionamiento ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedores</legend>
            <select name="vendedor">
                <option disabled selected>— Selecciona un vendedor —</option>

                <?php while ($vendedor = mysqli_fetch_assoc($resultado)): ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? "selected" : ''; ?> value="<?php echo $vendedor['id']; ?>">
                        <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
                <?php endwhile; ?>

            </select>
        </fieldset>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer')
?>

<!-- NOTAS -->

<!-- Tener en cuenta en los formularios agregar las caracteristicas de Method GET / POST e igual de action que procesará el formulario -->