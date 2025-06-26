<?php
require 'app.php';

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLANTES_URL . "/{$nombre}.php";
}
