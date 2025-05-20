<?php include 'auth/check_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Agency Attackers</title>
  <link rel="stylesheet" href="css/attackers.css?v=<?= time(); ?>">
</head>
<body>

<div class="attackers-container">
  <div class="attackers-box">
    <h2>Agency Attackers</h2>
    <table class="attackers-table">
      <thead>
        <tr>
          <th>Name [ID]</th>
          <th>API Key Status</th>
          <th>Last Hit</th>
          <th>Activity State</th>
          <th>Total Hits</th>
        </tr>
      </thead>
      <tbody>
        <!-- Contoh baris data statis -->
        <tr>
          <td><a href="https://www.torn.com/profiles.php?XID=123456">Enma [123456]</a></td>
          <td class="active">Connected</td>
          <td>2025-05-15 13:42</td>
          <td class="online">Online</td>
          <td>354</td>
        </tr>
        <tr>
          <td><a href="https://www.torn.com/profiles.php?XID=654321">Ryo [654321]</a></td>
          <td class="inactive">Disconnected</td>
          <td>2025-05-14 22:10</td>
          <td class="offline">Offline</td>
          <td>112</td>
        </tr>
        <!-- Tambah baris lainnya dinamis dari DB bila perlu -->
      </tbody>
    </table>
  </div>
</div>

</body>
</html>