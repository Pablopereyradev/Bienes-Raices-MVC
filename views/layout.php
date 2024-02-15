
<?php 
    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)) {
        $inicio = false;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" href="/src/img/icono-casa.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $nombrePagina ?? 'Bienes Raices'; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/" class="logo">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>
                <div class="mobile-menu">
                        <img src="/build/img/barras.svg" alt="Icono Menu Responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                    <nav id="navegacion" class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/anuncios">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
        </div> <!-- contenedor -->
    </header>
    
<?php echo $contenido; ?>


<footer class="site-footer seccion">
    <div class="contenedor contenedor-footer">
        <nav class="navegacion">
            <a href="/nosotros">Nosotros</a>
            <a href="/anuncios">Anuncios</a>
            <a href="/blog">Blog</a>
            <a href="/contacto">Contacto</a>
        </nav>
        <p class="copyright">Sitio creado por <a target="blank" href="https://pablopereyradev.netlify.app/">Pablo Pereyra</a></p>
        <p class="copyright">Todos los Derechos Reservados <?php echo date('Y'); ?> &copy; </p>
    </div>
</footer>

<script src="../build/js/bundle.min.js"></script>
</body>

</html>