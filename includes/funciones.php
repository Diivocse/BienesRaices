<?php
// require 'app.php';

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLANTES_URL . "/{$nombre}.php";
}

function truncarTexto(string $trunk)
{

    return (strlen($trunk) >= 50) ? substr($trunk, 0, 50) . "..." : $trunk;
}

function estaAutenticado(): bool
{
    session_start();
    $auth = $_SESSION['login'];
    if ($auth) {
        return true;
    }
    return false;
}
