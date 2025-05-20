<?php include 'auth/check_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Famkie Guide</title>
  <link rel="stylesheet" href="css/guide.css?v=<?= time(); ?>">
</head>
<body>

<div class="guide-container">
  <div class="guide-box">
    <h2>What is Famkie Agency?</h2>
    <p>Famkie Agency is a service platform that facilitates secure transactions between players who want to buy or sell losses in Torn City. We act as a trusted third party to ensure fairness and safety.</p>
  </div>

  <div class="guide-box">
    <h2>How to Sell Loss at Famkie Agency</h2>
    <p>To sell your loss, you simply need to list yourself as a seller, set your attacker fee, and make yourself available. Once a buyer selects you, follow the instructions in the dashboard and execute hits as agreed.</p>
  </div>

  <div class="guide-box">
    <h2>How to Buy Loss at Famkie Agency</h2>
    <p>As a buyer, browse the list of available sellers with attacker fees. Choose the one that suits you, initiate the transaction, and your credits will be held safely until the loss is complete.</p>
  </div>

  <div class="guide-box">
    <h2>How to Withdraw Balance</h2>
    <p>You can withdraw your Famkie balance anytime from your profile dashboard. Withdrawals are processed via in-game trade or direct payout methods configured in your account settings.</p>
  </div>

  <div class="guide-box">
    <h2>How We Manage Your API</h2>
    <p>We only use your API key to access data related to your status, hits, and basic information. It is stored securely and never shared. You can revoke or update your key at any time via settings.</p>
  </div>
</div>

</body>
</html>