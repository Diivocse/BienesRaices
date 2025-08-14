<?php
# Importar la base de datos
require 'includes/config/database.php';
$db = conectarDB();

# Crear email y password
$email = 'correo@correo.com';
$password = '123123';
$passwordHash = password_hash($password, PASSWORD_DEFAULT); 

# Consulta query
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";
echo $query;


# Agregarlo a la base de datos
mysqli_query($db, $query);

?>