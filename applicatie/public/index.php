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
  <title>Pizzeria Sole Machina</title>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/header.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/footer.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/all.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/index.css">
</head>

<body>
  <!-- Header + Navigation -->
  <?php require_once BASE_DIR . '/templates/elements/header.php'; ?>

  <!-- Main content -->
  <main id="main-index">
    <section class="flex-container pagina-titel">
      <h1>Welkom bij Pizzeria Sole Machina</h1>
    </section>

    <div class="grid-container grid-container-homepage">

      <div class="grid-item grid-item-homepage">
        <a href="pages/frontend/acties.html"><img src="assets/images/homepage/onze-acties.png" alt="Actie pizzas"></a>
      </div>

      <div class="grid-item grid-item-homepage">
        <a href="pages/frontend/pizza.html"><img src="assets/images/homepage/onze-pizzas.png"
            alt="Ons pizza aanbod"></a>
      </div>

      <div class="grid-item grid-item-homepage">
        <a href="pages/focaccia.html"><img src="assets/images/homepage/onze-focaccia.png"
            alt="Ons focaccia aanbod"></a>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php require_once BASE_DIR . '/templates/elements/footer.php'; ?>

</body>

</html>