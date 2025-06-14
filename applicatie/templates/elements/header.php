<header id="header">
    <nav id="hamburger-navigation">
        <div id="hamburger-menu-toggle">
            <input type="checkbox" id="hamburger-menu-checkbox">

            <span></span>
            <span></span>
            <span></span>

            <ul id="hamburger-menu-list">
                <li><a href="<?php echo BASE_URL; ?>/public/index.php">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>/public/frontend/acties.php">Acties</a></li>
                <li><a href="<?php echo BASE_URL; ?>/public/frontend/pizza.php">Pizza</a></li>
                <li><a href="<?php echo BASE_URL; ?>/public/frontend/focaccia.php">Focaccia</a></li>
                <li><a href="<?php echo BASE_URL; ?>/public/frontend/dranken.php">Dranken</a></li>
                <li><a href="<?php echo BASE_URL; ?>/public/frontend/privacyverklaring.php">Privacyverklaring</a></li>
            </ul>
        </div>
    </nav>

    <div class="header-title hidden">
        <h2 class="bg-primary-colour-scheme">
            <a href="<?php echo BASE_URL; ?>/public/index.php" class="bg-primary-colour-scheme">Pizzeria Sole Machina</a>
        </h2>
    </div>

    <nav class="header-navbar hidden">
        <ul class="header-navbar-list bg-primary-colour-scheme">
            <li><a href="<?php echo BASE_URL; ?>/public/frontend/acties.php">Acties</a></li>
            <li><a href="<?php echo BASE_URL; ?>/public/frontend/pizza.php">Pizza</a></li>
            <li><a href="<?php echo BASE_URL; ?>/public/frontend/focaccia.php">Focaccia</a></li>
            <li><a href="<?php echo BASE_URL; ?>/public/frontend/dranken.php">Dranken</a></li>
        </ul>
    </nav>

    <div class="header-flex-container bg-primary-colour-scheme">
        <div class="header-buttons bg-primary-colour-scheme">
            <button class="btn-secondary" onclick="location.href='<?php echo BASE_URL; ?>/public/frontend/login.php'">Inloggen</button>
        </div>

        <div class="header-cart bg-primary-colour-scheme">
            <a href="<?php echo BASE_URL; ?>/public/frontend/cart.php" class="bg-primary-colour-scheme"><i class="fa-solid fa-cart-shopping bg-primary-colour-scheme"></i></a>
        </div>
    </div>
</header>