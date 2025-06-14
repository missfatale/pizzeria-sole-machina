<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/boostrap.php';

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizzeria Sole Machina - Cart</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/header.css">
  <link rel="stylesheet" href="../../assets/css/footer.css">
  <link rel="stylesheet" href="../../assets/css/all.min.css">
  <link rel="stylesheet" href="../../assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="../../assets/css/cart.css">
  <link rel="stylesheet" href="../../assets/css/order.css">
</head>

<body>
  <!-- Header + Navigation -->
  <header id="header">
    <nav id="hamburger-navigation">
      <div id="hamburger-menu-toggle">
        <input type="checkbox" id="hamburger-menu-checkbox">

        <span></span>
        <span></span>
        <span></span>

        <ul id="hamburger-menu-list">
          <li><a href="../../index.html">Home</a></li>
          <li><a href="acties.php">Acties</a></li>
          <li><a href="pizza.php">Pizza</a></li>
          <li><a href="focaccia.php">Focaccia</a></li>
          <li><a href="dranken.php">Dranken</a></li>
          <li><a href="privacyverklaring.php">Privacyverklaring</a></li>
        </ul>
      </div>
    </nav>

    <div class="header-title hidden">
      <h2 class="bg-primary-colour-scheme">
        <a href="../../index.html" class="bg-primary-colour-scheme">Pizzeria Sole Machina</a>
      </h2>
    </div>

    <nav class="header-navbar hidden">
      <ul class="header-navbar-list bg-primary-colour-scheme">
        <li><a href="acties.php">Acties</a></li>
        <li><a href="pizza.php">Pizza</a></li>
        <li><a href="focaccia.php">Focaccia</a></li>
        <li><a href="dranken.php">Dranken</a></li>
      </ul>
    </nav>

    <div class="header-flex-container bg-primary-colour-scheme">
      <div class="header-buttons bg-primary-colour-scheme">
        <a href="order.html" class="bg-primary-colour-scheme">Gebruiker</a>
      </div>

      <div class="header-cart bg-primary-colour-scheme">
        <a href="cart.php" class="bg-primary-colour-scheme"><i
            class="fa-solid fa-cart-shopping bg-primary-colour-scheme"></i></a>
      </div>
    </div>
  </header>

  <!-- Main content -->
  <main id="main-order">
    <section class="flex-container pagina-titel order-recent">
      <h1>Recente order</h1>
    </section>

    <div class="flex-container flex-container-cart">
      <!-- Order -->
      <section id="section-latest-order">

        <div class="cart-item cart-header">
          <div class="flex-container pagina-titel bg-white order-status">
            <h2>Status: In de oven</h2>
          </div>
        </div>

        <div class="cart-item">
          <div class="cart-item-image bg-white">
            <img src="../../assets/images/pizza/margherita-speciaal.jpg" alt="Margherita pizza punt" height="100">
          </div>

          <div class="cart-item-information bg-white">
            <h3>Margherita</h3>
            <p>Klassieke pizza met tomatensaus, mozzarella en peterselie.</p>
          </div>
        </div>

        <div class="cart-item">
          <div class="cart-item-image bg-white">
            <img src="../../assets/images/pizza/pepperoni.jpg" alt="Margherita pizza punt" height="100">
          </div>
          <div class="cart-item-information bg-white">
            <h3>Pepperoni</h3>
            <p>Pizza met tomatensaus, mozzarella en pepperoni.</p>
          </div>
        </div>

        <div class="flex-container pagina-titel order-historie">
          <h2>Order Historie</h2>
        </div>
      </section>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-primary-colour-scheme">
    <div class="footer-navbar bg-primary-colour-scheme hidden">
      <a class="text-primary-colour bg-primary-colour-scheme" href="privacyverklaring.php">Privacyverklaring</a>
    </div>

    <div class="footer-copyright">
      <p class="text-primary-colour bg-primary-colour-scheme">© 2024 <a href="../../index.html"
          class="bg-primary-colour-scheme">Pizzeria Sole Machina</a>. Alle rechten voorbehouden.</p>
    </div>
  </footer>
</body>

</html>