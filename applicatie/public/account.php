<?php
// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/boostrap.php';

// Page Title
$pageTitle = "Account";

// Redirect User IF Not Logged In
if (!userIsLoggedIn()) {
    header('Location: ' . LOGIN_PAGE);
    exit();
}

// Gets Current User
$user = currentUser();

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection(); ?>
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/account.css' ?>">
</head>

<body>
<?php require_once BASE_DIR . '/templates/elements/header.php'; ?>

<main id="main-account">
    <section class="flex-container pagina-titel">
        <h1>Welkom, <?= htmlspecialchars($user['firstname']) ?></h1>
    </section>

    <section class="flex-container flex-container-cart">
        <div class="account-box">
            <h2>Accountgegevens</h2>
            <p>Je bent ingelogd als: <strong class="bg-white"><?= htmlspecialchars($user['username']) ?></strong></p>
            <p>Rol: <strong class="bg-white"><?= htmlspecialchars($user['role']) ?></strong></p>

            <form action="<?= BASE_URL . '/actions/logout-action.php' ?>" method="POST" class="bg-white">
                <button type="submit" class="btn-secondary logout-button">Uitloggen</button>
            </form>
        </div>
    </section>

</main>

<?php require_once BASE_DIR . '/templates/elements/footer.php'; ?>
</body>

</html>
