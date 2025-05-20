<?php
session_start();
ini_set('display_errors', 1); // Tambahkan ini untuk debug
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$user_query = mysqli_query($conn, "SELECT * FROM akun WHERE id = $user_id");
$user = mysqli_fetch_assoc($user_query);

if (!$user) {
    die("User tidak ditemukan!");
}

$balance = isset($user['Money']) ? $user['Money'] : 0;

function drawCard() {
    $cards = [2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10, 11];
    return $cards[array_rand($cards)];
}

function calculateTotal($hand) {
    $total = array_sum($hand);
    $aces = array_count_values($hand)[11] ?? 0;
    while ($total > 21 && $aces > 0) {
        $total -= 10;
        $aces--;
    }
    return $total;
}

if (isset($_POST['reset'])) {
    unset($_SESSION['blackjack']);
    header("Location: casino_blackjack.php");
    exit;
}

$amount_won = 0;

if (!isset($_SESSION['blackjack']) && isset($_POST['bet'])) {
    $bet_raw = str_replace(',', '', $_POST['bet']);
    $bet = intval($bet_raw);

    if ($bet < 1 || $bet > $balance) {
        $error = "Jumlah taruhan tidak valid!";
    } else {
        mysqli_query($conn, "UPDATE akun SET Money = Money - $bet WHERE id = $user_id");
        $_SESSION['blackjack'] = [
            'player' => [drawCard(), drawCard()],
            'dealer' => [drawCard(), drawCard()],
            'finished' => false,
            'result' => '',
            'bet' => $bet,
            'won' => 0
        ];
        $balance -= $bet;
    }
}

$game = $_SESSION['blackjack'] ?? null;

if ($game) {
    $playerTotal = calculateTotal($game['player']);
    $dealerTotal = calculateTotal($game['dealer']);

    if (isset($_POST['action']) && !$game['finished']) {
        if ($_POST['action'] == 'hit') {
            $game['player'][] = drawCard();
            $playerTotal = calculateTotal($game['player']);
            if ($playerTotal > 21) {
                $game['result'] = 'You busted!';
                $game['finished'] = true;
            }
        } elseif ($_POST['action'] == 'stand') {
            while ($dealerTotal < 17) {
                $game['dealer'][] = drawCard();
                $dealerTotal = calculateTotal($game['dealer']);
            }

            if ($dealerTotal > 21 || $playerTotal > $dealerTotal) {
                $game['result'] = 'You win!';
                $amount_won = $game['bet'] * 2;
                $game['won'] = $amount_won;
                mysqli_query($conn, "UPDATE akun SET Money = Money + $amount_won WHERE id = $user_id");
                $balance += $amount_won;
            } elseif ($playerTotal < $dealerTotal) {
                $game['result'] = 'Dealer wins!';
                $game['won'] = 0;
            } else {
                $game['result'] = 'Draw!';
                $amount_won = $game['bet'];
                $game['won'] = $amount_won;
                mysqli_query($conn, "UPDATE akun SET Money = Money + $amount_won WHERE id = $user_id");
                $balance += $amount_won;
            }
            $game['finished'] = true;
        }
        $_SESSION['blackjack'] = $game;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blackjack</title>
    <style>
        body { font-family: sans-serif; background: #111; color: #eee; text-align: center; padding: 20px; }
        .cards { font-size: 1.5em; margin-bottom: 1em; }
        button, input { padding: 10px; font-size: 1em; margin: 5px; }
    </style>
</head>
<body>
    <h1>Blackjack</h1>
    <p>Balance: $<?= number_format($balance, 0, ',', '.') ?></p>

    <?php if (!isset($game)): ?>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <label>Masukkan taruhan kamu:</label><br>
            <input type="text" name="bet" required pattern="[0-9,]+" oninput="this.value = this.value.replace(/[^0-9,]/g, '')">
            <br><br>
            <button type="submit">Mulai Game</button>
        </form>
    <?php else: ?>
        <div class="cards">
            <p><strong>Kartu kamu:</strong> <?= implode(', ', $game['player']) ?> (<?= $playerTotal ?>)</p>
            <p><strong>Kartu dealer:</strong>
                <?= $game['finished'] ? implode(', ', $game['dealer']) . " ($dealerTotal)" : $game['dealer'][0] . ', ?' ?>
            </p>
        </div>

        <?php if (!$game['finished']): ?>
            <form method="POST">
                <button name="action" value="hit">Hit</button>
                <button name="action" value="stand">Stand</button>
            </form>
        <?php else: ?>
            <h2><?= $game['result'] ?></h2>
            <?php if ($game['won'] > 0): ?>
                <p>Kamu memenangkan: <strong>$<?= number_format($game['won'], 0, ',', '.') ?></strong></p>
            <?php endif; ?>
            <form method="POST">
                <button name="reset">Main Lagi</button>
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <br>
    <p><a href="casino.php" style="color:lightblue;">Kembali ke Casino</a></p>
</body>
</html>