<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIENES RAICEZ</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/"><img src="/build/img/logo.svg" href="#" alt="LogoBienes"></a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="nosotros.php">nosotros</a>
                        <a href="anuncios.php">anuncios</a>
                        <a href="blog.php">blog</a>
                        <a href="contacto.php">contacto</a>
                    </nav>
                </div>
            </div> <!-- Cierre de la .barra -->


            <?php
            
            echo $inicio ?  '<h1>Venta de casas y departamentos exclusivos de lujo</h1>' : '';
            
            if ($inicio) {
                echo "<h1>Venta de casas y departamentos exclusivos de lujo</h1>";
            }
            ?>
        </div>

    </header>