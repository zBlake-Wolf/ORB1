<?php
// panel_usuario.php — Simulación de panel de administración sin base de datos
session_start();

if (!isset($_SESSION['productos'])) {
  $_SESSION['productos'] = [];
}

// Agregar producto
if (isset($_POST['agregar'])) {
  $nuevo = [
    'id' => uniqid(),
    'nombre' => $_POST['nombre'],
    'descripcion' => $_POST['descripcion'],
    'precio' => $_POST['precio'],
    'imagen' => isset($_FILES['imagen']['name']) && $_FILES['imagen']['name'] != ''
      ? 'uploads/' . $_FILES['imagen']['name']
      : 'img/default.jpg'
  ];

  if (!is_dir("uploads")) mkdir("uploads");
  if (!empty($_FILES['imagen']['tmp_name'])) {
    move_uploaded_file($_FILES['imagen']['tmp_name'], $nuevo['imagen']);
  }

  $_SESSION['productos'][] = $nuevo;
}

// Eliminar producto
if (isset($_GET['eliminar'])) {
  $_SESSION['productos'] = array_filter($_SESSION['productos'], function($p) {
    return $p['id'] != $_GET['eliminar'];
  });
  header("Location: panel_usuario.php");
  exit;
}

// Simular actualización
if (isset($_POST['actualizar'])) {
  foreach ($_SESSION['productos'] as &$p) {
    if ($p['id'] == $_POST['id']) {
      $p['nombre'] = $_POST['nombre'];
      $p['descripcion'] = $_POST['descripcion'];
      $p['precio'] = $_POST['precio'];
      break;
    }
  }
  unset($p);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>ORBI | Panel de Usuario</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; }
    body {
      font-family: 'Poppins', sans-serif;
      background: #fff;
      color: #333;
      margin: 0;
      padding: 0;
    }

    header {
      background: #ff4d6d;
      color: #fff;
      padding: 15px 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 100;
    }
    header h1 { margin: 0; font-size: 1.4em; }
    header a {
      color: #fff;
      text-decoration: none;
      background: #ff758f;
      padding: 6px 14px;
      border-radius: 15px;
      transition: 0.3s;
    }
    header a:hover { background: #ffb3c1; }

    main {
      max-width: 1000px;
      margin: 30px auto;
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #ff4d6d;
      margin-bottom: 20px;
    }

    form {
      background: #fff0f3;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(255,77,109,0.2);
      margin-bottom: 40px;
    }

    form input, form textarea {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ffb3c1;
      border-radius: 8px;
    }

    form button {
      background: #ff4d6d;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    form button:hover { background: #ff758f; }

    .productos {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .producto {
      background: #fff0f3;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(255,77,109,0.1);
      padding: 15px;
      text-align: center;
    }

    .producto img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
    }

    .producto h3 { color: #ff4d6d; margin: 10px 0 5px; }
    .producto p { color: #444; font-size: 0.9em; }

    .botones {
      margin-top: 10px;
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .botones a, .botones button {
      border: none;
      padding: 7px 12px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 0.9em;
      transition: 0.3s;
      color: #fff;
      text-decoration: none;
    }

    .editar { background: #ff758f; }
    .eliminar { background: #ff4d6d; }
    .editar:hover { background: #ffa6c1; }
    .eliminar:hover { background: #ff8fa3; }
  </style>
</head>
<body>
  <header>
    <h1>🍬 ORBI | Panel del Usuario</h1>
    <a href="index.php">Volver al inicio</a>
  </header>

  <main>
    <h2>Sube o edita tus dulces 🎁</h2>

    <form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" id="id">
      <label>Nombre:</label>
      <input type="text" name="nombre" required>

      <label>Descripción:</label>
      <textarea name="descripcion" rows="2"></textarea>

      <label>Precio:</label>
      <input type="number" name="precio" required>

      <label>Imagen:</label>
      <input type="file" name="imagen" accept="image/*">

      <button type="submit" name="agregar">Agregar Producto</button>
    </form>

    <section class="productos">
      <?php foreach ($_SESSION['productos'] as $p): ?>
        <div class="producto">
          <img src="<?= htmlspecialchars($p['imagen']) ?>" alt="Producto">
          <h3><?= htmlspecialchars($p['nombre']) ?></h3>
          <p><?= htmlspecialchars($p['descripcion']) ?></p>
          <p><b>$<?= htmlspecialchars($p['precio']) ?></b></p>

          <div class="botones">
            <form method="POST" style="display:inline;">
              <input type="hidden" name="id" value="<?= $p['id'] ?>">
              <input type="hidden" name="nombre" value="<?= $p['nombre'] ?>">
              <input type="hidden" name="descripcion" value="<?= $p['descripcion'] ?>">
              <input type="hidden" name="precio" value="<?= $p['precio'] ?>">
              <button class="editar" name="actualizar">Actualizar</button>
            </form>
            <a class="eliminar" href="?eliminar=<?= $p['id'] ?>" onclick="return confirm('¿Eliminar este producto?')">Eliminar</a>
          </div>
        </div>
      <?php endforeach; ?>
    </section>
  </main>
</body>
</html>
