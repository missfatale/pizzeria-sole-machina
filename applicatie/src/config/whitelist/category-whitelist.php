<?php

/**
 * category-whitelist.php
 *
 * Bevat de whitelist van toegestane productcategorieën voor de applicatie.
 *
 * Array keys representeren hoofdgroepen (bijv. 'producten').
 * Array values zijn lijsten van toegestane subcategorieën binnen die groepen.
 *
 * Voorbeeld gebruik:
 * - Validatie van categorieën in URL parameters.
 * - Filteren van getoonde items.
 *
 */

return [
    'producten' => ['voorgerecht', 'maaltijd', 'pizza', 'drank']
];