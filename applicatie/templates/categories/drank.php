<?php

/**
 * drank.php
 *
 * Pagina die alle drank-items ophaalt en toont.
 * Maakt gebruik van de helper renderItemsByCategory() om de items dynamisch te renderen.
 *
 */

require_once SRC_DIR . '/view/view-categories.php';

$db = maakVerbinding();

renderItemsByCategory($db, 'drank', 'Onze Dranken');