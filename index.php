<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Beranda Kedai Kopi</title>
  <link rel="stylesheet" href="styleLogin.css">
  <link rel="icon" type="image/png" href="foto/ico.png">
</head>
<body style="background: radial-gradient(circle at top, #f6e1c3, #3b2f2f);">
  <div class="container">
    <div class="header">
      <div class="logo-cup"></div>
      <div class="header-text">
        <h1>Selamat datang, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
        <p>Silakan nikmati secangkir kopi favoritmu ☕</p>
      </div>
    </div>

    <p class="tagline">
      Hari yang baik dimulai dengan <span>kopi hangat</span>.
    </p>

    <div class="footer">
      <a href="logout.php" style="color:#f5b25d;text-decoration:none;">Keluar</a>
    </div>
  </div>
</body>
</html>
