<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FAMKIE - Welcome</title>
  <!-- Viewport tag agar responsive di HP -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/welcome.css?v=<?= time(); ?>">
</head>
<body>

  <!-- Toggle Sidebar Button -->
  <button class="sidebar-toggle" onclick="toggleSidebar()">☰ Menu</button>

  <!-- Overlay -->
  <div id="overlay" class="overlay" onclick="closeSidebar()"></div>

  <!-- Top Bar -->
  <div class="top-bar">
    <div class="logo">
      <img src="famkie.png" alt="FAMKIE Logo" height="40">
    </div>
    <div class="login-button">
      <button onclick="toggleLogin()">Login</button>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <div id="sidebar" class="sidebar">
    <a href="auth/register/register.php">Register</a>
    <a href="welcome/pl">Loss Price List</a>
    <a href="welcome/tos.php">Terms of Service</a>
    <a href="welcome/contact.php">Contact</a>
    <a href="welcome/credit.php">Credits</a>
  </div>

  <!-- Login Popup -->
  <div id="login-popup" class="login-popup">
    <form action="auth/login.php" method="POST">
      <h3>Login</h3>
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
      <button type="button" onclick="toggleLogin()">Close</button>
    </form>
  </div>

  <script>
    function toggleLogin() {
      document.getElementById("login-popup").classList.toggle("show");
    }

    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");
      const overlay = document.getElementById("overlay");
      sidebar.classList.toggle("active");
      overlay.classList.toggle("active");
    }

    function closeSidebar() {
      document.getElementById("sidebar").classList.remove("active");
      document.getElementById("overlay").classList.remove("active");
    }
  </script>

</body>
</html>