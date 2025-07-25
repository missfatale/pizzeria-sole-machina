<?php

/**
 * voorgerecht.php
 *
 * Pagina die alle voorgerecht-items ophaalt en toont.
 * Maakt gebruik van de helper renderItemsByCategory() om de items dynamisch te renderen.
 *
 */

require_once SRC_DIR . '/view/view-categories.php';

$db = maakVerbinding();

renderItemsByCategory($db, 'voorgerecht', 'Onze Voorgerechten');