<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/auth/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /welcome/lobby.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil username dan api_key
$stmt = $conn->prepare("SELECT username, api_key FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username, $api_key);
$stmt->fetch();
$stmt->close();

$api_key_placeholder = $api_key ? '*****' : '';

// Ambil pesan error/success
$errors = $_SESSION['settings_errors'] ?? [];
$success = isset($_GET['success']);
unset($_SESSION['settings_errors']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Account Settings</title>
  <link rel="stylesheet" href="/css/settings.css?v=<?= time(); ?>">
</head>
<body>

<div class="home-container">
  <div class="info-box">
    <h3>Account Settings</h3>

    <?php if ($success): ?>
      <p class="success-message">Perubahan berhasil disimpan.</p>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
      <div class="error-messages">
        <?php foreach ($errors as $e): ?>
          <p><?= htmlspecialchars($e) ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="/pages/settings/process_update_settings.php" class="settings-form">
      <label>Username:</label>
      <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" disabled>

      <label>New Password:</label>
      <input type="password" name="new_password" placeholder="Leave blank if not changing">

      <label>API Key:</label>
      <input type="text" name="api_key" placeholder="<?= $api_key_placeholder ?>">

      <button type="submit">Save Changes</button>
    </form>

    <form method="POST" action="/pages/settings/process_update_settings.php" style="margin-top:10px;">
      <input type="hidden" name="reset_api_key" value="1">
      <button type="submit" class="logout-button" style="background-color:#f39c12;">Reset API Key</button>
    </form>

    <form method="POST" action="/auth/logout.php" style="margin-top:10px;">
      <button type="submit" class="logout-button">Logout</button>
    </form>
  </div>
</div>

</body>
</html>