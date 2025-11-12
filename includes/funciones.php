<?php
// require 'app.php';

define('TEMPLANTES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . '/funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function debug($valor)
{
    echo "<pre>";
    var_dump($valor);
    echo "</pre>";
    exit;
}

function estaAutenticado()
{
    session_start();
    if (!$_SESSION['login']) {
        header('Location: /');
    }
    return true;
}

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLANTES_URL . "/{$nombre}.php";
}

function truncarTexto(string $trunk)
{
    return (strlen($trunk) >= 50) ? substr($trunk, 0, 50) . "..." : $trunk;
}

// ———————————————————————————————————————————————————————————————————————————
// Sanitizar / escapar código HTML
// ———————————————————————————————————————————————————————————————————————————

function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

function mostrarNotificacion($codigo)
{
    $mensaje = '';
    switch($codigo):
        case 1:
            $mensaje = "Creado correctamente";
            break;
        case 2:
            $mensaje = "Actualizado correctamente";
            break;
        case 3:
            $mensaje = "Eliminado correctamente";
            break;
        default:
            $mensaje = false;
            break;

    endswitch;
}
