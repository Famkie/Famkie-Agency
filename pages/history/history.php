<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require $_SERVER['DOCUMENT_ROOT'] . '/auth/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    echo "Kamu belum login.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil data personal attack history (limit 100)
$stmt = $conn->prepare("
    SELECT attacker_id, timestamp, attack_id, result, defender_id, fee
    FROM attack_history
    WHERE attacker_id = ?
    ORDER BY timestamp DESC
    LIMIT 100
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>History - Dashboard</title>
<link rel="stylesheet" href="../css/history.css?v=<?= time(); ?>">
</head>
<body>

<header>
  <h1>History Dashboard</h1>
  <input type="search" id="searchBox" placeholder="Search in Personal Attack History..." onkeyup="filterTable()" />
</header>

<main>
  <section class="history-section">
    <h2>Withdrawal History</h2>
    <p class="info-text">Data not available yet.</p>
  </section>

  <section class="history-section">
    <h2>Loss Order History</h2>
    <p class="info-text">Data not available yet.</p>
  </section>

  <section class="history-section">
    <h2>Attack Overall History</h2>
    <p class="info-text">Data not available yet.</p>
  </section>

  <section class="history-section">
    <h2>Personal Attack History</h2>
    <div class="table-wrapper">
      <table id="attackHistoryTable">
        <thead>
          <tr>
            <th onclick="sortTable(0)">Attacker Name &#x25B2;&#x25BC;</th>
            <th onclick="sortTable(1)">Timestamp &#x25B2;&#x25BC;</th>
            <th onclick="sortTable(2)">Attack ID &#x25B2;&#x25BC;</th>
            <th onclick="sortTable(3)">Result &#x25B2;&#x25BC;</th>
            <th onclick="sortTable(4)">Defender &#x25B2;&#x25BC;</th>
            <th onclick="sortTable(5)">Fee &#x25B2;&#x25BC;</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result->num_rows === 0): ?>
            <tr><td colspan="6" class="no-data">No attack history found.</td></tr>
          <?php else: ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= htmlspecialchars($row['attacker_name']) ?></td>
                <td><?= htmlspecialchars($row['timestamp']) ?></td>
                <td><?= htmlspecialchars($row['attack_id']) ?></td>
                <td><?= htmlspecialchars($row['result']) ?></td>
                <td><?= htmlspecialchars($row['defender_name']) ?></td>
                <td>$<?= number_format($row['fee'], 2) ?></td>
              </tr>
            <?php endwhile; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </section>
</main>

<script>
  // Simple table filter
  function filterTable() {
    const input = document.getElementById('searchBox');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('attackHistoryTable');
    const tr = table.tBodies[0].getElementsByTagName('tr');

    for (let i = 0; i < tr.length; i++) {
      const tds = tr[i].getElementsByTagName('td');
      let matched = false;
      for (let j = 0; j < tds.length; j++) {
        if (tds[j].textContent.toLowerCase().includes(filter)) {
          matched = true;
          break;
        }
      }
      tr[i].style.display = matched ? '' : 'none';
    }
  }

  // Simple table sort (toggle asc/desc)
  let sortAsc = true;
  function sortTable(colIndex) {
    const table = document.getElementById('attackHistoryTable');
    const tbody = table.tBodies[0];
    let rows = Array.from(tbody.rows);

    rows.sort((a, b) => {
      const aText = a.cells[colIndex].textContent.trim();
      const bText = b.cells[colIndex].textContent.trim();

      // Check if sorting numeric column (Fee, Attack ID) or date
      if(colIndex === 2 || colIndex === 5) {
        return sortAsc ? aText.localeCompare(bText, undefined, {numeric: true}) : bText.localeCompare(aText, undefined, {numeric: true});
      } else if (colIndex === 1) {
        return sortAsc ? new Date(aText) - new Date(bText) : new Date(bText) - new Date(aText);
      } else {
        return sortAsc ? aText.localeCompare(bText) : bText.localeCompare(aText);
      }
    });

    // Rebuild tbody
    rows.forEach(row => tbody.appendChild(row));

    sortAsc = !sortAsc;
  }
</script>

</body>
</html>