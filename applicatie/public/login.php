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
  <title>Pizzeria Sole Machina - Login</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/header.css">
  <link rel="stylesheet" href="../../assets/css/footer.css">
  <link rel="stylesheet" href="../../assets/css/all.min.css">
  <link rel="stylesheet" href="../../assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="../../assets/css/login.css">
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
        <button class="btn-secondary" onclick="location.href='login.html'">Inloggen</button>
      </div>

      <div class="header-cart bg-primary-colour-scheme">
        <a href="cart.php" class="bg-primary-colour-scheme"><i
            class="fa-solid fa-cart-shopping bg-primary-colour-scheme"></i></a>
      </div>
    </div>
  </header>

  <!-- Main content -->
  <main id="main-login">
    <section class="flex-container pagina-titel">
      <h1>Inloggen</h1>
    </section>

    <div class="flex-container flex-container-cart">
      <!-- Registreren -->
      <section>
        <div class="flex-container">
          <form action="#" method="POST" class="register-form">
            <h2>Registreren</h2>

            <label for="title">Aanspreekvorm:</label>
            <select id="title" name="title" required>
              <option value="" disabled selected>Selecteer je aanspreekvorm</option>
              <option value="Heer">Heer</option>
              <option value="Mevrouw">Mevrouw</option>
              <option value="Anders">Anders</option>
            </select>

            <label for="first-name">Voornaam:</label>
            <input type="text" id="first-name" name="first_name" pattern="[A-Za-z\s]+" maxlength="15" required>

            <label for="last-name">Achternaam:</label>
            <input type="text" id="last-name" name="last_name" pattern="[A-Za-z\s]+" maxlength="15" required>

            <label for="geboortedatum">Geboortedatum:</label>
            <input type="date" id="geboortedatum" name="geboortedatum" required>

            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" minlength="3" required>

            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password" minlength="8" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" minlength="5" placeholder="gebruiker@provider.nl" required>

            <label for="mobile">Mobiele Nummer:</label>
            <input type="text" id="mobile" name="mobile" placeholder="06-00000000" pattern="06-\d{8}" title="Must be in the format 06-XXXXXXXX"
              required>

            <label for="postcode">Postcode:</label>
            <input type="text" id="postcode" name="postcode" placeholder="1111 AB" pattern="\d{4}\s[A-Z]{2}" required>

            <label for="address">Adres:</label>
            <input type="text" id="address" name="address" minlength="5" required>

            <button type="submit" class="btn-secondary">Registreren</button>
          </form>
        </div>
      </section>

      <!-- Inloggen -->
      <section>
        <div class="flex-container">
          <form action="#" method="POST" class="login-form">
            <h2>Inloggen</h2>
            <label for="login-username">Gebruikersnaam:</label>
            <input type="text" id="login-username" name="login-username" minlength="3" maxlength="15" required>
            <label for="login-password">Wachtwoord:</label>
            <input type="password" id="login-password" name="login-password" minlength="8" maxlength="15" required>
            <button type="submit" class="btn-secondary">Inloggen</button>
          </form>
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