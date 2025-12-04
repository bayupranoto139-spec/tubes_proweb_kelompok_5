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
    <title>17 COFFEE - Admin</title>
    <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
    <link rel="icon" type="image/png" href="foto/ico.png">
</head>

<body>
    <div id="notif-area"></div>
    <div id="confirm-mini" style="display:none;"></div>

    <?php
    include 'navbarAdmin.php';
    ?>

    <!-- HERO -->
    <div class="hero-header">
        <img src="foto/kafe.jpg" class="hero-img">
        <div class="hero-overlay"></div>

        <div class="hero-text">
            <h1>Admin Page</h1>
            <p>Kelola Semua Menu ✨</p>
        </div>
    </div>



    <!--Menu Rekomendasi-->

    <section class="menu-grid">
        <?php
        // Ambil data menu dari database
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $query = "SELECT * FROM menu";

        $result = mysqli_query($mysql, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="menu-card" id="menu-<?= $row['menu_id'] ?>">
                <img src="foto/<?= $row['foto'] ?>" class="menu-img">

                <h3><?= $row['nama_menu'] ?></h3>
                <p class="menu-price">Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>

                <p class="menu-desc"><?= $row['deskripsi'] ?></p>

                <div class="menu-action">

                    <button type="button" class="delete-btn" onclick="confirmDelete(<?= $row['menu_id'] ?>)">Hapus</button>

                </div>
            </div>
        <?php } ?>
    </section>


    <!--Footer-->

    <footer class="font">
        <p> © Copyright by kelompok 5 2025</p>
    </footer>

    <script src="cart.js?v=<?= time() ?>"></script>
    <script>
        function confirmDelete(id) {

            let box = document.getElementById("confirm-mini");

            // TAMPILKAN POPUP KONFIRMASI
            box.innerHTML = `
        <div class="confirm-overlay"></div>

        <div class="confirm-popup">
            <h3>Konfirmasi</h3>
            <p>Yakin ingin menghapus menu ini?</p>

            <div class="confirm-buttons">
                <button class="yes-btn" onclick="deleteNow(${id})">Ya</button>
                <button class="cancel-btn" onclick="closeConfirm()">Batal</button>
            </div>
        </div>
    `;

            box.style.display = "block";

            setTimeout(() => {
                document.querySelector(".confirm-popup").classList.add("show");
                document.querySelector(".confirm-overlay").classList.add("show");
            }, 10);
        }

        function closeConfirm() {
            document.querySelector(".confirm-popup").classList.remove("show");
            document.querySelector(".confirm-overlay").classList.remove("show");

            setTimeout(() => {
                document.getElementById("confirm-mini").style.display = "none";
            }, 200);
        }

        // ==========================
        //  DELETE AJAX TANPA PINDAH PAGE
        // ==========================
        function deleteNow(id) {

            fetch("adminDelete.php?id=" + id)
                .then(res => res.text())
                .then(res => {

                    closeConfirm(); // tutup popup

                    if (res.trim() === "Ok") {

                        showNotification("Menu berhasil dihapus!", "success");

                        // HAPUS CARD DARI HALAMAN
                        let card = document.getElementById("menu-" + id);
                        if (card) card.remove();

                    } else {
                        showNotification("Gagal menghapus menu!", "error");
                    }
                })
                .catch(err => {
                    showNotification("Terjadi kesalahan!", "error");
                });
        }
    </script>



</body>

</html>