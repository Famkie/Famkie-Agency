<?php
// lobby.php

// Simulasi total loss
$loss_last_day = 1234;
$loss_last_month = 5678;
$loss_overall = 9012;

// Simulasi review buyer
$reviews = [
  "Fast response dan sangat membantu!",
  "Barang sesuai, proses loss done cepat.",
  "Recommended seller, puas banget!",
  "Pelayanan terbaik, tidak mengecewakan.",
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FAMKIE - Lobby</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/lobby.css?v=<?= time(); ?>">
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
    <h2>Lobby</h2>

    <!-- Loss Box -->
    <div class="loss-box-container">
      <div class="loss-box">
        <div class="number"><?= number_format($loss_last_day); ?></div>
        <div>Last Day</div>
      </div>
      <div class="loss-box">
        <div class="number"><?= number_format($loss_last_month); ?></div>
        <div>Last Month</div>
      </div>
      <div class="loss-box">
        <div class="number"><?= number_format($loss_overall); ?></div>
        <div>Overall</div>
      </div>
    </div>

    <!-- Review Carousel -->
    <div class="review-carousel">
      <div class="carousel-track">
        <?php foreach ($reviews as $review): ?>
          <div class="carousel-item"><?= htmlspecialchars($review); ?></div>
        <?php endforeach; ?>
      </div>
      <button class="carousel-button prev" onclick="moveSlide(-1)">❮</button>
      <button class="carousel-button next" onclick="moveSlide(1)">❯</button>
      <div class="carousel-dots" id="carousel-dots">
        <?php foreach ($reviews as $index => $review): ?>
          <span class="dot" onclick="goToSlide(<?= $index ?>)"></span>
        <?php endforeach; ?>
      </div>
    </div>
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

    // Carousel Script
    let currentSlide = 0;
    const items = document.querySelectorAll('.carousel-item');
    const track = document.querySelector('.carousel-track');
    const dots = document.querySelectorAll('.dot');
    const totalSlides = items.length;

    function updateCarousel() {
      track.style.transform = `translateX(-${currentSlide * 100}%)`;
      dots.forEach(dot => dot.classList.remove('active'));
      if (dots[currentSlide]) dots[currentSlide].classList.add('active');
    }

    function moveSlide(direction) {
      currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
      updateCarousel();
    }

    function goToSlide(index) {
      currentSlide = index;
      updateCarousel();
    }

    setInterval(() => moveSlide(1), 4000);

    updateCarousel();
  </script>

</body>
</html>