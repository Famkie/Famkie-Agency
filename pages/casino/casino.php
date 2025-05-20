<!DOCTYPE html><html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Casino</title>
 <link rel="stylesheet" href="/css/casino.css?v=<?= time() ?>">
</head>
<body>
  <?php include 'layout.php'; ?>
  <main class="casino-container">
    <h1 style="color: white;">Welcome to the Casino</h1>
    <div class="casino-games">
      <div class="casino-card">
        <h3>Slot Machine</h3>
        <p>Try your luck spinning reels to win big prizes!</p>
        <a href="casino_slot.php">Play Slot</a>
      </div><div class="casino-card">
    <h3>Roulette</h3>
    <p>Bet on red, black, or numbers in classic roulette style.</p>
    <a href="casino_roulette.php">Play Roulette</a>
  </div>

  <div class="casino-card">
    <h3>High / Low Card</h3>
    <p>Guess whether the next card will be higher or lower!</p>
    <a href="casino_highlow.php">Play High / Low</a>
  </div>

  <div class="casino-card">
    <h3>Blackjack</h3>
    <p>Try to beat the dealer in a game of 21!</p>
    <a href="casino_blackjack.php">Play Blackjack</a>
  </div>

  <div class="casino-card">
    <h3>Spin the Wheel</h3>
    <p>Spin the wheel and hope for the best prize!</p>
    <a href="casino_spin.php">Spin Now</a>
  </div>
</div>

  </main>
</body>
</html>