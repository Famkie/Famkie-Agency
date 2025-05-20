<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/auth/db.php';

$user_id = $_SESSION['user_id'] ?? null;
$errors = [];

if (!$user_id) {
    header("Location: /welcome/lobby.php");
    exit;
}

// Reset API Key
if (isset($_POST['reset_api_key'])) {
    $stmt = $conn->prepare("UPDATE users SET api_key = NULL WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();
    header("Location: setting.php?success=1");
    exit;
}

// Update logic
$new_password = $_POST['new_password'] ?? '';
$api_key_input = $_POST['api_key'] ?? '';

// Password update
if (!empty($new_password)) {
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $hashed_password, $user_id);
    $stmt->execute();
    $stmt->close();
}

// API Key update
if (!empty($api_key_input) && $api_key_input !== '*****') {
    $hashed_api_key = password_hash($api_key_input, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET api_key = ? WHERE id = ?");
    $stmt->bind_param("si", $hashed_api_key, $user_id);
    $stmt->execute();
    $stmt->close();
}

header("Location: /pages/settings/setting.php?success=1");
exit;