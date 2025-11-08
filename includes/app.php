<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . "/../vendor/autoload.php";

use App\ActiveRecord;

// Conexión a base da datos.
$db = conectarDB();
ActiveRecord::setDB($db);