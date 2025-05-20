<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Active Targets</title>
  <link rel="stylesheet" href="css/target.css?v=<?= time(); ?>">
</head>
<body>
  <?php include 'layout.php'; ?>
  <main class="target-container">
    <h1>Active Targets</h1>

    <div class="target-box">
      <table class="target-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Target Link</th>
            <th>Contact Type</th>
            <th>Hits</th>
            <th>Attacker Fee per Hits</th>
            <th>Last Update</th>
          </tr>
        </thead>
        <tbody>
          <!-- Example Row -->
          <tr>
            <td><a href="https://www.torn.com/profiles.php?XID=3604249">Enma [3604249]</a></td>
            <td><a href="https://www.torn.com/loader.php?sid=attack&user2ID=3604249" target="_blank">Attack</a></td>
            <td>Loss</td>
            <td>500</td>
            <td>$500,000</td>
            <td>2025-05-16 12:34</td>
          </tr>
          <!-- Add more rows dynamically from database -->
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>