<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../authentication/login.php?message=Please log in');
    exit();
}
?>