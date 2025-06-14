<?php

define('BASE_DIR', realpath(__DIR__ . '/../../'));

$scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME']);
$scriptDir = dirname($scriptName);

$baseUrl = str_replace('/public', '', $scriptDir);

define('BASE_URL', rtrim($baseUrl, '/'));