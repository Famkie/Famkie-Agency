<?php include 'auth/check_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Current Raffles</title>
  <link rel="stylesheet" href="css/raffles.css?v=<?= time(); ?>">
</head>
<body>

<div class="raffles-container">
  <div class="raffles-box">
    <h2>Current Raffles</h2>
    
    <div class="raffle-list">
      <!-- Contoh Data Raffle -->
      <div class="raffle-item">
        <div class="raffle-header">
          <span class="raffle-title">BB Jackpot - May Week 3</span>
          <span class="raffle-status">Open</span>
        </div>
        <div class="raffle-details">
          <p><strong>Prize:</strong> 10,000 BB</p>
          <p><strong>Entry Fee:</strong> 250 BB</p>
          <p><strong>Participants:</strong> 34</p>
          <p><strong>Ends In:</strong> 1d 4h</p>
        </div>
      </div>

      <div class="raffle-item">
        <div class="raffle-header">
          <span class="raffle-title">Weapon Crate Raffle</span>
          <span class="raffle-status closed">Closed</span>
        </div>
        <div class="raffle-details">
          <p><strong>Prize:</strong> 1x Gold Plated AK-47</p>
          <p><strong>Entry Fee:</strong> 500 BB</p>
          <p><strong>Participants:</strong> 50</p>
          <p><strong>Winner:</strong> Wolf123 [ID: 998877]</p>
        </div>
      </div>

      <!-- Tambahkan raffle lainnya di sini -->
    </div>
  </div>
</div>

</body>
</html>