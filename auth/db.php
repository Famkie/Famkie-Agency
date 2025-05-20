<?php
date_default_timezone_set('Asia/Jakarta');
$host = 'localhost';
$user = 'famkiewe_agency';
$pass = 'Wildrrio19';
$db   = 'famkiewe_fagency';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>