<?php
require 'mysql.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp'];
    $pesan = $_POST['pesan'];

    $query = "INSERT INTO contact (nama, email, nomor_hp, pesan) VALUES ('$nama', '$email', '$nomor_hp', '$pesan')";
    $result = mysqli_query($mysql, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($mysql);
    }else {
        header ("Location: isi_pesan.php");
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>☕17 Coffee - Contact</title>
    <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
</head>

<body>
    <header>
        <h1>17 Coffee</h1>
        <p>Leave a Message</p>
    </header>

  <!--Navigasi-->

  <nav>
    <a href="home.php">Home</a>
    <a href="drink.php">Drink</a>
    <a href="food.php">Food</a>
    <a href="contact.php">Contact</a>
 </nav>  
      <h2 class="font">Contact Us</h2>

  <!--Form Konatak-->

    <form action="" method="POST" id="ContactForm">
      <div>
        <label for="nama">  </label>
        <input type="text" id="nama" name="nama" required placeholder="Nama Anda">
      </div>
      <div>
        <label for="email"></label>
        <input type="email" id="email" name="email"required placeholder="Email Anda">
      </div>
      <div>
        <label for="nomor_hp"></label>
        <input type="text" id="nomor_hp" name="nomor_hp" required placeholder="Nomor HP Anda">
      </div>
      <div>
        <label for="pesan"></label>
        <input type="text" id="pesan" name="pesan" required placeholder="Masukkan Pesan">
      </div>
      <button type="submit" name="submit">Kirim</button>
    </form>  
    
    <div class="font">
       <p>Kamu bisa menghubungi kami melalui:</p>
        📍Alamat: Jl. Pikopi No.222 
        <br>
        📍Instagram: @kopkop.17 
        <br>
        📍No. HP: 086543210987
    </div>

  <!--Footer-->

    <footer class="font">
      <p> © Copyright by kelompok 5 2025</p>
    </footer>
</body>
</html>
