<?php

/**
 * maaltijd.php
 *
 * Pagina die alle maaltijd-items ophaalt en toont.
 * Maakt gebruik van de helper renderItemsByCategory() om de items dynamisch te renderen.
 *
 */

require_once SRC_DIR . '/helpers/render-categories.php';

$db = maakVerbinding();

renderItemsByCategory($db, 'maaltijd', 'Onze Maaltijden');