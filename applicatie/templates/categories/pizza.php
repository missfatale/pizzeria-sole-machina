<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizzeria Sole Machina - Pizza</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/header.css">
  <link rel="stylesheet" href="../../assets/css/footer.css">
  <link rel="stylesheet" href="../../assets/css/all.min.css">
  <link rel="stylesheet" href="../../assets/css/fontawesome.min.css">
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
          <li><a href="pizza.html">Pizza</a></li>
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
        <li><a href="pizza.html">Pizza</a></li>
        <li><a href="focaccia.php">Focaccia</a></li>
        <li><a href="dranken.php">Dranken</a></li>
      </ul>
    </nav>

    <div class="header-flex-container bg-primary-colour-scheme">
      <div class="header-buttons bg-primary-colour-scheme">
        <button class="btn-secondary" onclick="location.href='login.html'">Inloggen</button>
      </div>

      <div class="header-cart bg-primary-colour-scheme">
        <a href="cart.php" class="bg-primary-colour-scheme"><i
            class="fa-solid fa-cart-shopping bg-primary-colour-scheme"></i></a>
      </div>
    </div>
  </header>

  <!-- Main content -->
  <main id="main-pizza">
    <section class="flex-container pagina-titel">
      <h1>Pizza</h1>
    </section>

    <div class="grid-container">
      <article class="grid-item">
        <img src="../../assets/images/pizza/margherita-speciaal.jpg" alt="Margherita pizza punt">
        <h3>Margherita</h3>
        <p>Klassieke pizza met tomatensaus, mozzarella en peterselie.</p>
        <div class="flex-container bg-white">
          <p class="horizontal-flex-start-self">€ 8,99</p>
          <button type="submit" class="btn-primary uppercase horizontal-flex-end-self grid-button"
            onclick="location.href='cart.html'">Add</button>
        </div>
      </article>

      <article class="grid-item">
        <img src="../../assets/images/pizza/margherita.jpg" alt="Margherita speciaal pizza punt">
        <h3>Margherita Speciaal</h3>
        <p>House special, pizza met tomatensaus, mozzerella en basilicum.</p>
        <div class="flex-container bg-white">
          <p class="horizontal-flex-start-self">€ 9,50</p>
          <button type="submit" class="btn-primary uppercase horizontal-flex-end-self grid-button"
            onclick="location.href='cart.html'">Add</button>
        </div>
      </article>

      <article class="grid-item">
        <img src="../../assets/images/pizza/pepperoni.jpg" alt="Pepperoni pizza punt">
        <h3>Pepperoni</h3>
        <p>Pizza met tomatensaus, mozzarella en pepperoni.</p>
        <div class="flex-container bg-white">
          <p class="horizontal-flex-start-self">€ 10,99</p>
          <button type="submit" class="btn-primary uppercase horizontal-flex-end-self grid-button"
            onclick="location.href='cart.html'">Add</button>
        </div>
      </article>

      <article class="grid-item">
        <img src="../../assets/images/pizza/bbq-chicken.jpg" alt="BBQ Chicken pizza punt">
        <h3>BBQ Chicken</h3>
        <p>Pizza met tomatensaus, mozzarella, bbq chicken en een bbq saus.</p>
        <div class="flex-container bg-white">
          <p class="horizontal-flex-start-self">€ 12,50</p>
          <button type="submit" class="btn-primary uppercase horizontal-flex-end-self grid-button"
            onclick="location.href='cart.html'">Add</button>
        </div>
      </article>

      <article class="grid-item">
        <img src="../../assets/images/pizza/buffalo-chicken.jpg" alt="Buffalo Chicken pizza punt">
        <h3>Buffalo Chicken</h3>
        <p>Pizza met tomatensaus, mozzarella en buffalo chicken.</p>
        <div class="flex-container bg-white">
          <p class="horizontal-flex-start-self">€ 12,50</p>
          <button type="submit" class="btn-primary uppercase horizontal-flex-end-self grid-button"
            onclick="location.href='cart.html'">Add</button>
        </div>
      </article>

      <article class="grid-item">
        <img src="../../assets/images/pizza/spinach-mushrooms.jpg" alt="Spinazie Champignon pizza punt">
        <h3>Spinazie Champignon</h3>
        <p>Pizza met tomatensaus, mozzarella, spinazie en champignons.</p>
        <div class="flex-container bg-white">
          <p class="horizontal-flex-start-self">€ 14.99</p>
          <button type="submit" class="btn-primary uppercase horizontal-flex-end-self grid-button"
            onclick="location.href='cart.html'">Add</button>
        </div>
      </article>
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