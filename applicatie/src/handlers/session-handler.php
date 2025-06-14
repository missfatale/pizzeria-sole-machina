<?php

// Checks the Status of the Session and Starts a new Session depending on the Status.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}