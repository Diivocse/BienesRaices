<?php
// require 'app.php';

define('TEMPLANTES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . '/funciones.php');

function pre($valor)
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
}

function guardar(){
     $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id ) 
        VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id') ";
}

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLANTES_URL . "/{$nombre}.php";
}

function truncarTexto(string $trunk)
{
    return (strlen($trunk) >= 50) ? substr($trunk, 0, 50) . "..." : $trunk;
}
