<?php

// Adds Path Handling Functionality
require_once __DIR__ . '/../src/handlers/path-handler.php';

// Adds Session Handling Functionality
require_once BASE_DIR . '/src/handlers/session-handler.php';

// Adds View Functions
require_once BASE_DIR . '/src/view/view-functions.php';

// Sets up Config
$config = require_once 'config.php';

define('WEBSITE_TITLE', $config['websiteTitle']);
define('CHARSET', $config['websiteCharset']);
define('WEBSITE_LANGUAGE', $config['websiteLanguage']);