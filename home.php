<?php
include 'mysql.php';
?>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>17 COFFEE - Luxury</title>

    <link rel="stylesheet" href="newStyle.css?v=<?= time() ?>">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700;800&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="foto/ico.png">

</head>

<body>

    <!-- NAVBAR -->
<nav class="lux-nav">
    <h2>17 COFFEE</h2>

    <div class="nav-right">
        <a href="home.php">🏠</a>
        <a href="food.php">🍽️</a>
        <a href="drink.php">🥤</a>
        <a href="contact.php">✉️</a>
    </div>
</nav>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-text">
            <h1>
                Elevate Your<br>
                <span>Coffee Experience</span>
            </h1>
            <p>Kopi premium dengan cita rasa mewah. Rasakan kehangatan dan aroma yang memanjakan setiap hari.</p>

            <div class="hero-btn" onclick="window.location='food.php'">Pesan Sekarang</div>
        </div>

        <div class="hero-img">
            <img src="foto/kafe.jpg">
        </div>
    </section>


    <!-- ABSTRACT MENU SECTION -->
    <section class="menu-section">
        <h2 class="menu-title">Menu Premium Kami</h2>

        <div class="abstract-grid">

            <?php
            $q = $mysql->query("SELECT * FROM menu ORDER BY menu_id DESC LIMIT 12");
            while ($m = mysqli_fetch_assoc($q)) {
                $foto = $m['foto'] ? "foto/".$m['foto'] : "foto/default.jpg";

                echo "
                <div class='menu-card'>
                    <img src='$foto'>
                    <h3>{$m['nama_menu']}</h3>
                </div>
                ";
            }
            ?>

        </div>
    </section>


    <!-- FOOTER -->
    <footer>
        © 2025 17 COFFEE • Crafted for luxury taste ☕✨
    </footer>

  <script src="cart.js?v=<?= time() ?>"></script>

</body>
</html>
