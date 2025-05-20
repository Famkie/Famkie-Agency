<?php
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    // Simulasi: di tahap lanjut bisa dicek ke database dan kirim email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // TODO: Tambahkan logika pengecekan dan kirim email reset password
        $success = "Jika email terdaftar, instruksi reset telah dikirim.";
    } else {
        $error = "Alamat email tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lupa Password - FAMKIE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../famkie.png" type="image/png">
  <link rel="stylesheet" href="../css/welcome.css?v=<?= time(); ?>">
  <link rel="stylesheet" href="../css/register.css?v=<?= time(); ?>">
</head>
<body>

  <!-- Sidebar Toggle Button -->
  <button class="sidebar-toggle" onclick="toggleSidebar()">☰ Menu</button>

  <!-- Overlay -->
  <div id="overlay" class="overlay" onclick="closeSidebar()"></div>

  <!-- Top Bar -->
  <div class="top-bar">
    <div class="logo">
      <a href="../welcome.php"><img src="../famkie.png" alt="FAMKIE Logo" height="40"></a>
    </div>
    <div class="login-button">
      <button onclick="toggleLogin()">Login</button>
    </div>
  </div>

  <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
    <a href="../auth/register/register.php">Register</a>
    <a href="../pages/forum.php">Forum</a>
    <a href="../pages/news.php">News</a>
    <a href="../pages/wiki.php">Wiki</a>
    <a href="../welcome/contact.php">Contact</a>
    <a href="../welcome/credit.php">Credits</a>
  </div>

  <!-- Login Popup -->
  <div id="login-popup" class="login-popup">
    <form action="login.php" method="POST">
      <h3>Login</h3>
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
      <button type="button" onclick="toggleLogin()">Close</button>
    </form>
  </div>

  <!-- Forgot Password Form -->
  <div class="container">
    <h2>Lupa Password</h2>

    <?php if ($success): ?>
      <p class="success-message"><?= htmlspecialchars($success) ?></p>
    <?php elseif ($error): ?>
      <p class="error-message"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
      <input type="email" name="email" placeholder="Masukkan Email Anda" required />
      <button type="submit">Kirim Link Reset</button>
    </form>

    <p style="margin-top: 10px;">
      <a href="login.php" style="color: #00bcd4;">Kembali ke Login</a>
    </p>
  </div>

  <script>
    function toggleLogin() {
      document.getElementById("login-popup").classList.toggle("show");
    }

    function toggleSidebar() {
      document.getElementById("sidebar").classList.toggle("active");
      document.getElementById("overlay").classList.toggle("active");
    }

    function closeSidebar() {
      document.getElementById("sidebar").classList.remove("active");
      document.getElementById("overlay").classList.remove("active");
    }
  </script>

</body>
</html>