<?php

function resolvePageContentFile($page, $whitelist, $defaultFile) {
    if (in_array($page, $whitelist)) {
        return BASE_DIR . "/templates/pages/{$page}.php";
    }
    http_response_code(404);
    return $defaultFile;
}

function resolveCategoryContentFile() {

}

function resolveItemContentFile() {

}