<header id="header">
    <nav id="hamburger-navigation">
        <div id="hamburger-menu-toggle">
            <input type="checkbox" id="hamburger-menu-checkbox">

            <span></span>
            <span></span>
            <span></span>

            <ul id="hamburger-menu-list">
                <li><a href="<?= INDEX_PAGE; ?>">Home</a></li>
                <li><a href="<?= BASE_URL . '/category.php?category=voorgerecht'; ?>">Voorgerecht</a></li>
                <li><a href="<?= BASE_URL . '/category.php?category=maaltijd'; ?>">Maaltijd</a></li>
                <li><a href="<?= BASE_URL . '/category.php?category=pizza'; ?>">Pizza</a></li>
                <li><a href="<?= BASE_URL . '/category.php?category=drank'; ?>">Drank</a></li>
                <li><a href="<?= BASE_URL . '/page.php?page=privacy'; ?>">Privacyverklaring</a></li>
            </ul>
        </div>
    </nav>

    <div class="header-title hidden">
        <h2 class="bg-primary-colour-scheme">
            <a href="<?php echo INDEX_PAGE; ?>" class="bg-primary-colour-scheme"><?= htmlspecialchars(WEBSITE_TITLE)?></a>
        </h2>
    </div>

    <nav class="header-navbar hidden">
        <ul class="header-navbar-list bg-primary-colour-scheme">
            <li><a href="<?= BASE_URL . '/category.php?category=voorgerecht'; ?>">Voorgerecht</a></li>
            <li><a href="<?= BASE_URL . '/category.php?category=maaltijd'; ?>">Maaltijd</a></li>
            <li><a href="<?= BASE_URL . '/category.php?category=pizza'; ?>">Pizza</a></li>
            <li><a href="<?= BASE_URL . '/category.php?category=drank'; ?>">Drank</a></li>
        </ul>
    </nav>

    <div class="header-flex-container bg-primary-colour-scheme">

        <div class="header-buttons bg-primary-colour-scheme">
            <?php if (userIsLoggedIn()): ?>
            <a href="<?= ACCOUNT_PAGE; ?>" class="username-link bg-primary-colour-scheme"><?= htmlspecialchars($user['firstname']) ?>
            </a>
            <?php else: ?>
                <button class="btn-secondary" onclick="location.href='<?= LOGIN_PAGE ?>'">Inloggen</button>
            <?php endif; ?>
        </div>

        <div class="header-cart bg-primary-colour-scheme">
            <a href="<?= CART_PAGE ?>" class="bg-primary-colour-scheme">
                <i class="fa-solid fa-cart-shopping bg-primary-colour-scheme"></i>
            </a>
        </div>
    </div>
</header>