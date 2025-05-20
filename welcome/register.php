<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FAMKIE - Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../famkie.png" type="image/png">
  <link rel="stylesheet" href="../../css/welcome.css?v=<?= time(); ?>">
  <link rel="stylesheet" href="../../css/register.css?v=<?= time(); ?>">
</head>
<body>

  <!-- Sidebar Toggle Button -->
  <button class="sidebar-toggle" onclick="toggleSidebar()">☰ Menu</button>

  <!-- Overlay -->
  <div id="overlay" class="overlay" onclick="closeSidebar()"></div>

  <!-- Top Bar -->
  <div class="top-bar">
    <div class="logo">
      <a href="../../welcome.php"><img src="../../famkie.png" alt="FAMKIE Logo" height="40"></a>
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
    <form action="auth/login.php" method="POST">
      <h3>Login</h3>
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
      <button type="button" onclick="toggleLogin()">Close</button>
    </form>
  </div>

  <!-- Register Form -->
  <div class="container">
    <h2>Register Account</h2>
    <form action="../../auth/register/process_register.php" method="POST">
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <input type="password" name="confirm_password" placeholder="Confirm Password" required />
      <button type="submit">Register</button>
    </form>
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