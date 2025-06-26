<?php

/**
 * render-categories.php
 *
 * Contains functions to render items grouped by categories.
 * Uses data fetching from data-categories.php and image helper utilities.
 *
 * Functions:
 * - renderItemsByCategory(): Fetches and displays items in a specified category with their details and add-to-cart form.
 */

require_once SRC_DIR . '/data/data-categories.php';
require_once SRC_DIR . '/helpers/image-helper.php';

function renderItemsByCategory(PDO $db, string $category, string $title): void {
    $items = getItemsByCategory($db, $category);
    ?>
    <section class="flex-container pagina-titel">
        <h1><?= htmlspecialchars($title) ?></h1>
    </section>

    <div class="grid-container">
        <?php foreach ($items as $item): ?>
            <article class="grid-item">
                <img src="<?= htmlspecialchars(getImagePath($item['name'] ?? '', $category)) ?>"
                     alt="<?= htmlspecialchars($item['name'] ?? '') ?>">
                <h3><?= htmlspecialchars($item['name'] ?? '') ?></h3>
                <p><?= htmlspecialchars($item['ingredients'] ?? '') ?></p>
                <div class="flex-container bg-white">
                    <p class="horizontal-flex-start-self">
                        € <?= number_format(floatval($item['price'] ?? 0), 2, ',', '') ?>
                    </p>
                    <form method="POST" action="<?= BASE_URL . '/actions/add-to-cart.php' ?>">
                        <input type="hidden" name="product" value="<?= htmlspecialchars($item['name'] ?? '') ?>">
                        <input type="hidden" name="price" value="<?= floatval($item['price'] ?? '') ?>">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="description" value="<?= htmlspecialchars($item['ingredients'] ?? '') ?>">
                        <input type="hidden" name="type_id" value="<?= htmlspecialchars($category) ?>">
                        <button type="submit" class="btn-primary">Add</button>
                    </form>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
    <?php
}
