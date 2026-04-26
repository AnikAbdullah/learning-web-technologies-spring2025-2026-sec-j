<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}
?>