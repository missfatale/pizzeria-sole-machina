<?php

/**
 * path-handler.php
 *
 * Defines global path constants used throughout the application.
 * BASE_DIR: Absolute base filesystem path
 * BASE_URL: Base URL for public assets
 */

define('BASE_DIR', realpath(__DIR__ . '/../../'));

// Public URL Base (Used in HTML hrefs and srcs)
const BASE_URL = '/public';

// Internal Absolute Paths (Used in require/include)
const PUBLIC_DIR = BASE_DIR . '/public';
const SRC_DIR = BASE_DIR . '/src';
const TEMPLATES_DIR = BASE_DIR . '/templates';