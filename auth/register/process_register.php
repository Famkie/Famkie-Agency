<?php
// Debug ON — tampilkan semua error (hapus di production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../auth/db.php';
date_default_timezone_set('Asia/Jakarta');

// Ambil data dari form
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

// Validasi dasar
if (empty($username) || empty($password) || empty($confirm)) {
    die("Semua field wajib diisi.");
}

if ($password !== $confirm) {
    die("Password dan konfirmasi tidak cocok!");
}

// Cek apakah username sudah digunakan
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    die("Username sudah digunakan!");
}
$stmt->close();

// Hash password
$hashed = password_hash($password, PASSWORD_DEFAULT);

// Masukkan user baru (pastikan kolom password ada di database)
$insert = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$insert->bind_param("ss", $username, $hashed);

if ($insert->execute()) {
    header("Location: ../login.php?success=1");
    exit();
} else {
    echo "Pendaftaran gagal: " . $conn->error;
}
?>