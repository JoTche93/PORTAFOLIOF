<?php
include 'db.php'; // Conexión a la base de datos
$proyectos = $conn->query("SELECT * FROM proyectos ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Portafolio Público</title>
  <link rel="stylesheet" href="./assets/css/styles.css">
  
</head>
<body>

<header>
  <h1>Portafolio de Proyectos</h1>
  <a href="login.php" class="btn">Iniciar sesión</a>
</header>

<main  class="conProyectos">
  <?php while ($proyecto = $proyectos->fetch_assoc()): ?>
    <div class="proyecto">
      <header>
      <h3><?php echo htmlspecialchars($proyecto['titulo']); ?></h3>
    </header> 

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
</main>

<footer>
  &copy; <?php echo date("Y"); ?> JoTche - Portafolio Público
</footer>

</body>
</html>
