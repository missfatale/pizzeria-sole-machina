<?php

/**
 * view-functions.php
 *
 * Provides view-related helper functions for rendering page titles, head section,
 * and including login/register form templates.
 *
 * Functions:
 * - getPageTitle(): Determines the page title dynamically based on globals or query params.
 * - renderDefaultHeadSection(): Outputs the standard HTML <head> content with metatags and stylesheets.
 * - viewLoginForm(): Includes the login form template.
 * - viewRegisterForm(): Includes the register form template.
 */

function getPageTitle(): string {
    $websiteTitle = WEBSITE_TITLE;

    // Check lokale variabele eerst (via variabele variabele trick)
    if (!empty($GLOBALS['pageTitle'])) {
        $pageNameFormatted = ucwords(str_replace(['-', '_'], ' ', strtolower($GLOBALS['pageTitle'])));
        return "$pageNameFormatted | $websiteTitle";
    }

    // Alternatief: check variabele in de scope waar functie wordt aangeroepen
    if (isset($GLOBALS['pageTitleLocal'])) {
        $pageNameFormatted = ucwords(str_replace(['-', '_'], ' ', strtolower($GLOBALS['pageTitleLocal'])));
        return "$pageNameFormatted | $websiteTitle";
    }

    if (!empty($_GET['category'])) {
        $category = $_GET['category'];
        $pageNameFormatted = ucwords(str_replace(['-', '_'], ' ', strtolower($category)));
        return "$pageNameFormatted | $websiteTitle";
    }

    if (!empty($_GET['page'])) {
        $page = $_GET['page'];
        $pageNameFormatted = ucwords(str_replace(['-', '_'], ' ', strtolower($page)));
        return "$pageNameFormatted | $websiteTitle";
    }

    $currentPage = basename($_SERVER['SCRIPT_NAME']);
    $pageName = pathinfo($currentPage, PATHINFO_FILENAME);
    $pageNameFormatted = ucwords(str_replace(['-', '_'], ' ', strtolower($pageName)));

    return $pageNameFormatted ? "$pageNameFormatted | $websiteTitle" : $websiteTitle;
}

function renderDefaultHeadSection(): void {
    ?>
    <meta charset="<?= htmlspecialchars(CHARSET) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(getPageTitle()) ?></title>
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL . '/assets/favicon.ico'?>">
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/style.css'?>">
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/header.css'?>">
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/footer.css'?>">
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/all.min.css'?>">
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/fontawesome.min.css'?>">
    <?php
}

function viewLoginForm(): void {
    include __DIR__ . '/../../templates/forms/login-form.php';
}

function viewRegisterForm(): void {
    include __DIR__ . '/../../templates/forms/register-form.php';
}