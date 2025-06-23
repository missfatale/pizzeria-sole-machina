<?php

function getPageTitle(): string {
    $websiteTitle = WEBSITE_TITLE;
    $websitePage = $GLOBALS['pageTitle'] ?? null;

    return $websitePage ? "$websitePage | $websiteTitle" : $websiteTitle;
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