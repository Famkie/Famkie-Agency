<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../auth/db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hash);
        $stmt->fetch();
        if (password_verify($password, $hash)) {
            $_SESSION['user_id'] = $user_id;
            header("Location: ../index.php");
            exit();
        } else {
            $errors[] = "Password salah.";
        }
    } else {
        $errors[] = "Username tidak ditemukan.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Famkie</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../famkie.png" type="image/png">
  <link rel="stylesheet" href="../css/welcome.css?v=<?= time(); ?>">
  <link rel="stylesheet" href="../css/register.css?v=<?= time(); ?>">
</head>
<body>

<div class="container">
  <h2>Login Account</h2>

  <?php foreach ($errors as $e): ?>
    <p class="error-message"><?= htmlspecialchars($e) ?></p>
  <?php endforeach; ?>

  <form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit">Login</button>
  </form>

  <p style="margin-top: 10px;">
    <a href="forgot_password.php" style="color: #00bcd4;">Lupa Password?</a> |
    <a href="register/register.php" style="color: #00bcd4;">Belum punya akun?</a>
  </p>
</div>

</body>
</html>