<?php include 'auth/check_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Seller Ranking</title>
  <link rel="stylesheet" href="css/ranking.css?v=<?= time(); ?>">
</head>
<body>

<div class="ranking-container">
  <div class="ranking-box">
    <h2>Seller Ranking</h2>
    <table class="ranking-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Seller Name</th>
          <th>Seller ID</th>
          <th>Total Hits</th>
        </tr>
      </thead>
      <tbody>
        <!-- Contoh Data Sementara -->
        <tr>
          <td>1</td>
          <td>DarkWolf</td>
          <td>1234567</td>
          <td>4,820</td>
        </tr>
        <tr>
          <td>2</td>
          <td>CrimsonBlade</td>
          <td>7654321</td>
          <td>4,115</td>
        </tr>
        <tr>
          <td>3</td>
          <td>NeoStrike</td>
          <td>2468101</td>
          <td>3,900</td>
        </tr>
        <!-- Tambahkan lebih banyak data di sini -->
      </tbody>
    </table>
  </div>
</div>

</body>
</html>