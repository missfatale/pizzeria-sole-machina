<?php

/**
 * logout-handler.php
 *
 * Handles the logout process by destroying the session and redirecting to the login page.
 * This file assumes it is routed through logout-action.php.
 */

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../boostrap.php';

logout(); // Destroy Session
session_regenerate_id(true); // Prevents Session Fixation

header('Location: ' . INDEX_PAGE);
exit();