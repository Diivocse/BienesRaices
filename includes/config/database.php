<?php

function conectarDB(): mysqli
{
    $db = MySqli_connect('localhost', 'root', 'root', 'bienesraices_crud');

    if (!$db) {
        echo "Error no se pudo conectar";
        exit;
    }
/*     echo "<pre>";
    var_dump($_POST);
    echo "</pre>"; */
    return $db;
}
