<?php
require 'includes/config/database.php';
require './includes/funciones.php';
incluirTemplate('header');

// Importamos la conexión
$db = conectarDB();

// Escribimos el Query
$query = "SELECT * FROM propiedades";

// Consultar la DB
$resultadoConsulta = mysqli_query($db, $query);


$resultado = $_GET['resultado'] ?? null;
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Anuncio creado correctamente</p>
    
        <?php endif ?>

    <a href="admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
            <tr>
                <td><?php echo $propiedad['id']; ?></td>
                <td><?php echo $propiedad['titulo']; ?></td>
                <td><img class="imagen-tabla" src="/imagenes/<?php echo $propiedad['imagen'] ?>"></td>
                <td>$ <?php echo $propiedad['precio'] ?></td>
                <td>
                    <a href="#" class="boton-rojo-block">Eliminar</a>
                    <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'] ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endwhile ?>
        </tbody>
    </table>

</main>

<?php

mysqli_close($db);
incluirTemplate('footer');

?>