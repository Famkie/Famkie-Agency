<?php
include 'auth/db.php';

$user_id = $_SESSION['user_id'] ?? null;

// Cek login
if (!$user_id) {
    header("Location: login.php");
    exit;
}