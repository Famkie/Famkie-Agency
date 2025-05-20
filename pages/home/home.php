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

// Ambil data user
$getUser = $conn->prepare("SELECT username, level, rank, networth, title FROM users WHERE id = ?");
$getUser->bind_param("i", $user_id);
$getUser->execute();
$getUser->bind_result($username, $level, $rank, $networth, $title);
if (!$getUser->fetch()) {
    echo "User tidak ditemukan.";
    exit;
}
$getUser->close();

// Default value jika agency tidak ditemukan
$balance = $total_loss_orders = $total_loss_done = $total_spending = $total_income = $agency_rank = 0;
$loan_status = 'N/A';

// Ambil data agency
$getAgency = $conn->prepare("SELECT balance, total_loss_orders, total_loss_done, total_spending, total_income, loan_status, agency_rank FROM agencies WHERE user_id = ?");
$getAgency->bind_param("i", $user_id);
$getAgency->execute();
$getAgency->store_result();

if ($getAgency->num_rows > 0) {
    $getAgency->bind_result($balance, $total_loss_orders, $total_loss_done, $total_spending, $total_income, $loan_status, $agency_rank);
    $getAgency->fetch();
}
$getAgency->close();
?>

<link rel="stylesheet" href="/css/home.css?v=<?= time() ?>">

<div class="home-container">
    <div class="info-box">
        <h3>General Information</h3>
        <table class="info-table">
            <tr><td>Name</td><td><a href="#"><?= htmlspecialchars($username) ?> [<?= $user_id ?>]</a></td></tr>
            <tr><td>Level</td><td><?= $level ?></td></tr>
            <tr><td>Rank</td><td>#<?= $rank ?></td></tr>
            <tr><td>Title</td><td><?= htmlspecialchars($title) ?></td></tr>
            <tr><td>Networth</td><td>$<?= number_format($networth) ?></td></tr>
        </table>
    </div>

    <div class="info-box">
        <h3>Agency Information</h3>
        <table class="info-table">
            <tr><td>Current Balance</td><td>$<?= number_format($balance) ?></td></tr>
            <tr><td>Total Loss Order</td><td><?= number_format($total_loss_orders) ?></td></tr>
            <tr><td>Total Loss Done</td><td><?= number_format($total_loss_done) ?></td></tr>
            <tr><td>Total Spending</td><td>$<?= number_format($total_spending) ?></td></tr>
            <tr><td>Total Income</td><td>$<?= number_format($total_income) ?></td></tr>
            <tr><td>Loan Status</td><td><?= htmlspecialchars($loan_status) ?></td></tr>
            <tr><td>Agency Rank</td><td>#<?= $agency_rank ?></td></tr>
        </table>
    </div>
</div>