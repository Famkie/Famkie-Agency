<?php include 'auth/check_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Famkie Staff</title>
  <link rel="stylesheet" href="css/staff.css?v=<?= time(); ?>">
</head>
<body>

<div class="staff-container">
  <div class="staff-box">
    <h2>Famkie Agency Staff</h2>

    <div class="staff-list">
      <!-- Staff Item -->
      <div class="staff-item">
        <h3>Enma [1]</h3>
        <p><strong>Role:</strong> Founder & System Architect</p>
        <p><strong>Responsibilities:</strong> Oversees all system development, API integration, and core features.</p>
      </div>

      <div class="staff-item">
        <h3>Ragna [23456]</h3>
        <p><strong>Role:</strong> Bank Manager</p>
        <p><strong>Responsibilities:</strong> Handles withdrawal & deposit processing, balance tracking, and loan approvals.</p>
      </div>

      <div class="staff-item">
        <h3>Lynx [98765]</h3>
        <p><strong>Role:</strong> Trade Coordinator</p>
        <p><strong>Responsibilities:</strong> Manages buy/sell loss coordination, ensures timely matching of buyer-seller.</p>
      </div>

      <div class="staff-item">
        <h3>Nova [45678]</h3>
        <p><strong>Role:</strong> Raffle Manager</p>
        <p><strong>Responsibilities:</strong> Organizes and monitors raffles, ensures fairness and prize delivery.</p>
      </div>

      <!-- Tambahkan staff lain sesuai kebutuhan -->
    </div>
  </div>
</div>

</body>
</html>