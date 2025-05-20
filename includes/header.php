<?php include 'auth/check_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FAMKIE Game Layout</title>
  <link rel="stylesheet" href="css/header.css?v=<?= time(); ?>">
</head>
<body>

<!-- Header -->
<div class="header">
  <img src="famkie.png" alt="Famkie Logo" class="logo" />
</div>

<!-- Announcement banner -->
<div class="announcement">
  Welcome to Enma [<?= $user_id; ?>]'s game interface!
</div>

<!-- Navigation menu -->
<div class="menu-wrapper">
  <div class="menu">
    <?php include 'includes/menu.php'; ?>
  </div>
</div>

<!-- Content Wrapper -->
<div class="content">