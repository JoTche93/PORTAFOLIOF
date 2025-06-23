<?php
include 'db.php'; // Conexión a la base de datos
$proyectos = $conn->query("SELECT * FROM proyectos ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <title>Portafolio de JoTche | Desarrollador Web</title>
        <meta name="description" content="Portafolio de JoTche, desarrollador web apasionado por el código, el GYM y el anime. Conoce mis proyectos y habilidades.">
        <meta name="keywords" content="JoTche, portafolio, desarrollador web, HTML, CSS, JavaScript, anime, programación">
        <meta name="author" content="JoTche">
        <meta name="robots" content="index, follow">
    
        <!-- Open Graph para compartir en redes -->
        <meta property="og:title" content="Portafolio de JoTche | Desarrollador Web">
        <meta property="og:description" content="Explora mis proyectos, habilidades y pasiones. Programación, anime y mucho más.">
        <meta property="og:image" content="https://media.tenor.com/X1nlfLKP6toAAAAM/cat-eat.gif">
        <meta property="og:url" content="https://tudominio.netlify.app">
        <meta property="og:type" content="website">
    
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="favicon.ico">
    
        <!-- Estilos y fuentes -->
        <link rel="stylesheet" href="./assets/css/stylepubli.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet" alt="Foto animada de gato comiendo">
        <link rel="icon" type="image/x-icon" href="./favicon.ico">

    </head>
<body>
    <!-- Encabezado con el nombre del estudiante y menú de navegación -->
    <header>
        <h1>JoTche</h1>
        <nav>
            <ul>
                <li><a href="#sobre-mi">Sobre Mí</a></li>
                <li><a href="#proyectos">Proyectos</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
        <a href="login.php" class="btn">Iniciar sesión</a>
    </header>
    
    <main>
        <!-- Sección de información personal con diseño moderno -->
        <section id="sobre-mi" class="section">
            <div class="content">
                <img src="https://media.tenor.com/X1nlfLKP6toAAAAM/cat-eat.gif" alt="Foto de perfil" class="perfil"> <!-- Imagen de perfil -->
                <div>
                    <h2>Sobre Mí</h2>
                    <p>Programar, GYM y Anime si eso es lo que me agrada.</p>
                    <h3>Habilidades</h3>
                    <ul>
                        <li>HTML5</li>
                        <li>CSS3</li>
                        <li>JavaScript</li>
                    </ul>
                </div>
            </div>
        </section>
        
        <!-- Sección de proyectos con un diseño estilizado -->
        <section id="proyectos" class="section">
            <h2>Proyectos</h2>
            <div class="proyectos-container">
            
            <?php while ($proyecto = $proyectos->fetch_assoc()): ?>
    <div class="proyecto">
      
      <h3><?php echo htmlspecialchars($proyecto['titulo']); ?></h3>
     

      <?php if (!empty($proyecto['imagen'])): ?>
        <img src="uploads/<?php echo htmlspecialchars($proyecto['imagen']); ?>" alt="Imagen del proyecto">
      <?php endif; ?>

      
      <p><?php echo nl2br(htmlspecialchars($proyecto['descripcion'])); ?></p>
      <?php if (!empty($proyecto['url_github'])): ?>
        <a class="btn" href="<?php echo htmlspecialchars($proyecto['url_github']); ?>" target="_blank">Ver en GitHub</a><br>
      <?php endif; ?>
      <?php if (!empty($proyecto['url_produccion'])): ?>
        <a class="btn" href="<?php echo htmlspecialchars($proyecto['url_produccion']); ?>" target="_blank">Ver en Producción</a>
      <?php endif; ?>
    </div>
  <?php endwhile; ?>


            </div>
        </section>
    </main>
    
    <!-- Sección de contacto con diseño moderno -->
    <footer id="contacto" class="section">
        <h2>Contacto</h2>
        <p>Email: <a href="mailto:correo@ejemplo.com">jestrada2019@alu.uct.cl</a></p>
        <div class="redes">
            <a href="https://x.com/illojuan" target="_blank">Twitter</a>
            <a href="https://www.instagram.com/jotche_/" target="_blank">Instagram</a>
            <a href="https://github.com/JoTche93" target="_blank">GitHub</a>
        </div>
        <section id="formulario" class="fade-in">
            
            <form id="contactForm" novalidate>
              <label for="nombre">Nombre:</label>
              <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre" maxlength="50">
        
              <label for="email">Correo electrónico:</label>
              <input type="email" id="email" name="email" required placeholder="tucorreo@ejemplo.com">
        
              <label for="mensaje">Mensaje:</label>
              <textarea id="mensaje" name="mensaje" required placeholder="Escribe tu mensaje..." maxlength="300"></textarea>
        
              <button type="submit">Enviar</button>
            </form>
        
            <p id="successMsg"></p>
          </section>
    </footer>
    <script src="./assets/js/script.js"></script>
</body>
</html>
