<?php
session_start();

// Jika belum login, arahkan ke welcome page
if (!isset($_SESSION['user_id'])) {
    header('Location: welcome/lobby.php');
    exit;
}

// Ambil parameter 'page' dari URL, default ke 'home'
$page = $_GET['page'] ?? 'home';
$targetPath = "pages/{$page}/{$page}.php";

// Jika file tidak ditemukan, fallback ke home
if (!file_exists($targetPath)) {
    $page = 'home';
    $targetPath = "pages/home/home.php";
}

$content = $targetPath;

// Cek login dan ambil status user
include 'auth/check_login.php';

// Header + Status Bar
include 'includes/header.php';

// Konten utama
include $content;

// Footer
include 'includes/footer.php';