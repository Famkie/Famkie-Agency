<?php include 'auth/check_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Agency Bank</title>
  <link rel="stylesheet" href="css/bank.css?v=<?= time(); ?>">
</head>
<body>

<div class="bank-container">
  <div class="bank-box">
    <h2>Agency Bank</h2>

    <div class="bank-stats">
      <div><strong>Current Balance:</strong> $1,200,000</div>
      <div><strong>Total Income:</strong> $5,400,000</div>
      <div><strong>Total Spending:</strong> $4,200,000</div>
    </div>

    <!-- Withdraw Request -->
    <div class="bank-section">
      <h3>Withdraw Request</h3>
      <form class="bank-form">
        <input type="number" placeholder="Amount" required>
        <textarea placeholder="Withdraw Notes..." rows="3"></textarea>
        <button type="submit">Submit Withdraw</button>
      </form>
      <div class="bank-status">
        <p><strong>Last Withdraw Status:</strong> Pending approval</p>
      </div>
    </div>

    <!-- Deposit Request -->
    <div class="bank-section">
      <h3>Deposit Request</h3>
      <form class="bank-form">
        <input type="number" placeholder="Amount" required>
        <button type="submit">Submit Deposit</button>
      </form>
      <div class="bank-status">
        <p><strong>Last Deposit Status:</strong> Confirmed</p>
      </div>
    </div>

    <!-- Loan Request -->
    <div class="bank-section">
      <h3>Loan Request</h3>
      <form class="bank-form">
        <input type="number" placeholder="Amount" required>
        <textarea placeholder="Loan Purpose..." rows="3"></textarea>
        <button type="submit">Submit Loan Request</button>
      </form>
      <div class="bank-status">
        <p><strong>Current Loan Status:</strong> Active - $500,000 remaining</p>
      </div>
    </div>
  </div>
</div>

</body>
</html>