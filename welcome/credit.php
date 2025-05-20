<?php
// credit.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FAMKIE - Credits</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/welcome.css?v=<?= time(); ?>">
</head>
<body>

  <!-- Sidebar Toggle -->
  <button class="sidebar-toggle" onclick="toggleSidebar()">☰ Menu</button>

  <!-- Overlay -->
  <div id="overlay" class="overlay" onclick="closeSidebar()"></div>

  <!-- Top Bar -->
  <div class="top-bar">
    <div class="logo">
      <img src="../famkie.png" alt="FAMKIE Logo">
    </div>
    <div class="login-button">
      <button onclick="toggleLogin()">Login</button>
    </div>
  </div>

  <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
  <a href="register.php">Register</a>
  <a href="lobby.php">Lobby</a>
  <a href="pl.php">Loss Price List</a>
  <a href="tos.php">Terms of Service</a>
  <a href="contact.php">Contact</a>
  <a href="credit.php">Credits</a>
</div>

  <!-- Login Popup -->
  <div id="login-popup" class="login-popup">
    <form action="../auth/login.php" method="POST">
      <h3>Login</h3>
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
      <button type="button" onclick="toggleLogin()">Close</button>
    </form>
  </div>

  <!-- Main Content -->
  <div style="margin-left: 20px; padding: 100px 20px 20px 20px;">
    <h2>Credits</h2>
    <p>Terima kasih kepada para kontributor dan resource:</p>
    <ul>
      <li>Author : <strong>Enma [3604249]</strong></li>
      <li>Icon dan gambar: <a href="https://www.flaticon.com" target="_blank">Flaticon</a></li>
      <li>Framework CSS: Custom</li>
      <li>Font: Segoe UI</li>
      <li>Inspirasi: Torn City, browser-based RPG games</li>
    </ul>
  </div>

  <!-- Script -->
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