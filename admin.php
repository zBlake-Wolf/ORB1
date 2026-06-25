<?php
// admin.php — Panel de productos ORBI (versión sin BD)
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ORBI | Panel de Productos</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: "Poppins", sans-serif;
      background: #fff;
      color: #333;
      overflow-x: hidden;
    }
    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background: rgba(245, 61, 94, 0.9);
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      z-index: 100;
      backdrop-filter: blur(6px);
    }
    header .logo {
      font-weight: 700;
      font-size: 1.5em;
    }
    header nav a {
      color: #fff;
      text-decoration: none;
      margin-left: 20px;
      font-weight: 500;
      transition: 0.3s;
    }
    header nav a:hover {
      color: #ffe3ec;
    }

    main {
      margin-top: 100px;
      padding: 40px;
    }

    h1 {
      text-align: center;
      color: #ff4d6d;
      margin-bottom: 30px;
    }

    /* --- Barra de búsqueda y botones --- */
    .controls {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 15px;
      flex-wrap: wrap;
      margin-bottom: 30px;
    }

    .controls input[type="text"] {
      padding: 10px 15px;
      width: 250px;
      border: 2px solid #ff4d6d;
      border-radius: 10px;
      outline: none;
      transition: 0.3s;
    }
    .controls input[type="text"]:focus {
      box-shadow: 0 0 10px rgba(255, 77, 109, 0.4);
    }

    .btn {
      background: #ff4d6d;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 10px;
      cursor: pointer;
      font-weight: 500;
      transition: 0.3s;
    }
    .btn:hover {
      background: #ff758f;
      transform: scale(1.05);
    }

    /* --- Cuadrícula de productos --- */
    .productos {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 25px;
    }

    .producto {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(255, 77, 109, 0.15);
      overflow: hidden;
      transition: 0.3s;
    }
    .producto:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(255, 77, 109, 0.25);
    }

    .producto img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .producto-info {
      padding: 15px;
      text-align: center;
    }

    .producto-info h3 {
      color: #ff4d6d;
      font-size: 1.2em;
      margin-bottom: 8px;
    }

    .producto-info p {
      font-size: 0.95em;
      color: #555;
      margin-bottom: 10px;
    }

    .producto-info .acciones button {
      background: #ff758f;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 8px 10px;
      margin: 3px;
      cursor: pointer;
      font-size: 0.9em;
      transition: 0.3s;
    }

    .producto-info .acciones button:hover {
      background: #ff4d6d;
    }

    footer {
      text-align: center;
      padding: 20px;
      color: #777;
      font-size: 0.9em;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <header>
    <div class="logo">ORBI</div>
    <nav>
      <a href="index.php">Inicio</a>
      <a href="#">Mi Cuenta</a>
      <a href="#">Cerrar Sesión</a>
    </nav>
  </header>

  <main>
    <h1>Mis Productos</h1>

    <div class="controls">
      <input type="text" placeholder="Buscar producto...">
      <button class="btn">Buscar</button>
      <button class="btn">Agregar Producto</button>
    </div>

    <section class="productos">
      <!-- Producto ejemplo -->
      <div class="producto">
        <img src="img/p1.jpg" alt="Dulce 1">
        <div class="producto-info">
          <h3>Paleta de Fresa</h3>
          <p>Deliciosa paleta con sabor a fresa natural 🍓</p>
          <div class="acciones">
            <button>Actualizar</button>
            <button>Eliminar</button>
          </div>
        </div>
      </div>

      <div class="producto">
        <img src="img/p2.jpg" alt="Dulce 2">
        <div class="producto-info">
          <h3>Gomitas Ácidas</h3>
          <p>Perfectas para estudiantes valientes 😋</p>
          <div class="acciones">
            <button>Actualizar</button>
            <button>Eliminar</button>
          </div>
        </div>
      </div>

      <div class="producto">
        <img src="img/p3.jpg" alt="Dulce 3">
        <div class="producto-info">
          <h3>Chocolate Escolar</h3>
          <p>El clásico para las tardes de estudio 🍫</p>
          <div class="acciones">
            <button>Actualizar</button>
            <button>Eliminar</button>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>© 2025 ORBI — Panel de Productos | Luis Ramirez</footer>

</body>
</html>
