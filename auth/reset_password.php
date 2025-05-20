<?php
include '../auth/db.php';

$token = $_GET['token'] ?? '';
$error = '';
$success = '';

if (!$token) {
    $error = "Token tidak valid.";
} else {
    $stmt = $conn->prepare("SELECT id, reset_expires FROM users WHERE reset_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $reset_expires);
        $stmt->fetch();

        if (strtotime($reset_expires) < time()) {
            $error = "Token sudah kadaluarsa.";
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'];
            $confirm = $_POST['confirm_password'];

            if ($password !== $confirm) {
                $error = "Password tidak cocok.";
            } elseif (strlen($password) < 6) {
                $error = "Password minimal 6 karakter.";
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $update = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE id = ?");
                $update->bind_param("si", $hash, $user_id);
                $update->execute();

                $success = "Password berhasil direset. <a href='login.php'>Login sekarang</a>";
            }
        }
    } else {
        $error = "Token tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reset Password - FAMKIE</title>
  <link rel="icon" href="../famkie.png" type="image/png">
  <link rel="stylesheet" href="../css/welcome.css?v=<?= time(); ?>">
  <link rel="stylesheet" href="../css/register.css?v=<?= time(); ?>">
</head>
<body>

<div class="container">
  <h2>Reset Password</h2>

  <?php if ($error): ?>
    <p style="color: red;"><?= $error ?></p>
  <?php elseif ($success): ?>
    <p style="color: green;"><?= $success ?></p>
  <?php endif; ?>

  <?php if (!$success && !$error): ?>
  <form method="POST">
    <input type="password" name="password" placeholder="Password Baru" required />
    <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required />
    <button type="submit">Reset Password</button>
  </form>
  <?php endif; ?>
</div>

</body>
</html>