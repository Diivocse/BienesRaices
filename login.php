<?php

use Dom\Mysql;

require 'includes/app.php';

$db = conectarDB();

# Control de errores
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "Verifica el correo, no es valido o tiene errores";
    }

    if (!$password) {
        $errores[] = "Verifica el correo, no es valido o tiene errores";
    }

    # Validar si existe un usuario
    if (empty($errores)) {
        $query = "SELECT * FROM usuarios WHERE email = '$email';";

        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {
            # Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);
            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                # Iniciamos la super variable _Session
                session_start();

                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('location: /admin');
            } else {
                $errores[] = "Contraseña incorrecta";
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Ingresar</h1>

    <?php
    foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php
    endforeach; ?>

    <fieldset>
        <form method="POST" class="formulario">
            <legend>Ingresa tus datos</legend>
            <label for="email">E-Mail</label>
            <input type="text" name="email" placeholder="Tu Email" id="email" >

            <label for="password"></label>
            <input type="password" name="password" placeholder="Tu password" id="password" >
    </fieldset>
    <input type="submit" value="Iniciar sección" class="boton boton-verde">
    </form>
</main>

<?php
include 'includes/templates/footer.php'
?>