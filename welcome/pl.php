<?php
// pl.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FAMKIE - Loss Price List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/welcome.css?v=<?= time(); ?>">
  <style>
    .price-section {
      margin: 120px 20px 40px;
      padding: 20px;
      background: #f8f9fa;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .price-section h2 {
      color: #003366;
      margin-bottom: 20px;
    }

    .price-table {
      width: 100%;
      border-collapse: collapse;
    }

    .price-table th,
    .price-table td {
      padding: 12px 16px;
      border-bottom: 1px solid #ccc;
      text-align: left;
    }

    .price-table th {
      background-color: #003366;
      color: #fff;
    }

    .price-table tr:hover {
      background-color: #f1f1f1;
    }

    @media (max-width: 768px) {
      .price-section {
        margin-top: 100px;
      }

      .price-table th, .price-table td {
        font-size: 14px;
        padding: 10px;
      }
    }
  </style>
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
  <div class="price-section">
    <h2>Loss Price List</h2>
    <table class="price-table">
      <thead>
        <tr>
          <th>Service Type</th>
          <th>Price per Loss</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Reguler Service</td>
          <td>400k</td>
        </tr>
        <tr>
          <td>Premium Service</td>
          <td>500k</td>
        </tr>
      </tbody>
    </table>
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