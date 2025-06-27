<?php

// Connects to Database
require_once __DIR__ . '/../database/connect.php';

function getItemsByCategory(PDO $db, string $category): array {
    $sql = "
        SELECT 
            p.name, 
            p.price, 
            STRING_AGG(i.name, ', ') AS ingredients,
            pt.name AS category
        FROM Product p
        JOIN ProductType pt ON p.type_id = pt.name
        LEFT JOIN Product_Ingredient pi ON pi.product_name = p.name
        LEFT JOIN Ingredient i ON i.name = pi.ingredient_name
        WHERE pt.name = :category
        GROUP BY p.name, p.price, pt.name
    ";

    $query = $db->prepare($sql);
    $query->bindParam(':category', $category);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
