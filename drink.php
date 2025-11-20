<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>☕17 coffee - Drink</title>
  <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
</head>

<body>
  <header>
    <h1>17 Coffee</h1>
    <p>Choose Your Favourite Menu!</p>
  </header>
  
  <!--Navigasi-->

  <nav>
    <a href="home.php">Home</a>
    <a href="drink.php">Drink</a>
    <a href="food.php">Food</a>
    <a href="contact.php">Contact</a>
 </nav>
 <h2 class="font">Pesan Minuman Favoritmu</h2>

  <!--Menu Minuman-->

  <section class="menu">
    <div class="item">
      <img src="foto/latte.jpeg" alt="Latte" class="coffee-img" />
      <h3>Latte - Rp15.000</h3>
      <p>Espresso dan susu UHT</p>
      <br>
      <br>
      <button>Pesan</button>
    </div>

    <div class="item">
      <img src="foto/moccacino.jpeg" alt="Moccacino" class="coffee-img" />
      <h3>Moccacino - Rp15.000</h3>
      <p>Espresso, coklat, dan susu UHT</p>
      <br>
      <br>
      <button>Pesan</button>
    </div>

    <div class="item">
      <img src="foto/cappuccino.jpeg" alt="Cappucino" class="coffee-img" />
      <h3>Cappucino - Rp15.000</h3>
      <p>Espresso, susu, dan busa susu seimbang</p>
      <br>
      <button>Pesan</button>
    </div>

    <div class="item">
      <img src="foto/spanish latte.jpeg" alt="Spanish Latte" class="coffee-img" />
      <h3>Spanish Latte - Rp15.000</h3>
      <p>Espresso, susu UHT, dan susu kental manis</p>
      <br>
      <button>Pesan</button>
    </div>

    <div class="item">
      <img src="foto/kopi susu gula aren.jpeg" alt="Kopi Gula Aren" class="coffee-img" />
      <h3>Kopi Gula Aren - Rp15.000</h3>
      <p>Espresso, susu UHT, dan gula aren</p>
      <br>
      <br>
      <button>Pesan</button>
    </div>

    <div class="item">
      <img src="foto/kopi karamel.jpeg" alt="Kopi Karamel" class="coffee-img" />
      <h3>Kopi Karamel - Rp15.000</h3>
      <p>Espresso, susu UHT, dan gula karamel</p>
      <br>
    
      <button>Pesan</button>
    </div>

    <div class="item">
      <img src="foto/sanger.jpeg" alt="Kopi Sanger" class="coffee-img" />
      <h3>Kopi Sanger - Rp12.000</h3>
      <p>Espresso, susu, dan SKM</p>
      <br>
      <br>
      <button>Pesan</button>
    </div>
  </section>

  <!--Form Pemesanan-->

  <section class="form-section">
    <h2>Form Pemesanan</h2>
    <form id="orderForm">
           <input type="text" id="nama" placeholder="Nama Pemesan" required>
      <input type="text" id="alamat" placeholder="Alamat Pengiriman" required>
      <input type="text" id="nohp" placeholder="Nomor HP" required>
      <p>Total: Rp0</p>
      <button type="submit">Kirim Pesanan</button>
    </form>
  </section>  

  <!--Footer-->

    <footer class="font">
      <p> © Copyright by kelompok 5 2025</p>
    </footer>

</body>
</html>
