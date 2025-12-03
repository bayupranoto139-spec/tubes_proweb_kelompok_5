<?php
require 'mysql.php'; // koneksi: $mysql

// Ambil semua order + username user
$sqlOrders = "
    SELECT 
        o.order_id,
        o.user_id,
        o.tanggal,
        o.total_harga,
        u.username
    FROM orders o
    JOIN users u ON o.user_id = u.user_id
    ORDER BY o.tanggal DESC
";

$orders = mysqli_query($mysql, $sqlOrders);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan User</title>
    <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
</head>

<body>

    <div id="notif-area"></div>
    <div id="confirm-mini" style="display:none;"></div>

    <?php
    include 'navbar.php';
    ?>

    <div class="hero-header">
        <img src="foto/kafe.jpg" class="hero-img" alt="Kafe">
        <div class="hero-overlay"></div>
        <div class="hero-text">
            <h1>Daftar Pesanan User</h1>
            <p>Berikut adalah pesanan yang sudah dibuat oleh user.</p>
        </div>
    </div>

    <table id="tampilan">
        <thead>
            <tr class="atas">
                <th>No</th>
                <th>ID Order</th>
                <th>Username</th>
                <th>Tanggal</th>
                <th>Detail Pesanan</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($orders)):
                // Ambil item untuk setiap order
                $orderId = (int) $row['order_id'];

                $sqlItems = "
                SELECT 
                    oi.jumlah,
                    oi.subtotal,
                    m.nama_menu
                FROM order_items oi
                JOIN menu m ON oi.menu_id = m.menu_id
                WHERE oi.order_id = $orderId
            ";
                $items = mysqli_query($mysql, $sqlItems);
                ?>
                <tr id="order-<?= $row['order_id'] ?>">
                    <td><?= $no++; ?></td>
                    <td>#<?= htmlspecialchars($row['order_id']); ?></td>
                    <td><?= htmlspecialchars($row['username']); ?></td>
                    <td><?= htmlspecialchars($row['tanggal']); ?></td>
                    <td>
                        <ul style="padding-left: 18px; margin: 0;">
                            <?php while ($item = mysqli_fetch_assoc($items)): ?>
                                <li>
                                    <?= htmlspecialchars($item['nama_menu']); ?>
                                    x <?= (int) $item['jumlah']; ?>
                                    (Rp <?= number_format($item['subtotal'], 0, ',', '.'); ?>)
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </td>
                    <td>
                        Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?>
                    <td>
                        <button class="delete-btn" onclick="confirmDeleteOrder(<?= $row['order_id']; ?>)">Hapus</button>
                    </td>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php
    include 'footer.php';
    ?>

    <script src="cart.js?v=<?= time() ?>"></script>

    <script>
        function confirmDeleteOrder(id) {

            let box = document.getElementById("confirm-mini");

            // TAMPILKAN POPUP KONFIRMASI
            box.innerHTML = `
        <div class="confirm-overlay"></div>

        <div class="confirm-popup">
            <h3>Konfirmasi</h3>
            <p>Yakin ingin menghapus pesanan ini?</p>

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

            fetch("hapus_pesan.php?id=" + id)
                .then(res => res.text())
                .then(res => {

                    closeConfirm(); // tutup popup

                    if (res.trim() === "Ok") {

                        showNotification("Pesanan berhasil dihapus!", "success");

                        // HAPUS CARD DARI HALAMAN
                        let row = document.getElementById("order-" + id);
                        if (row) row.remove();


                    } else {
                        showNotification("Gagal menghapus pesanan!", "error");
                    }
                })
                .catch(err => {
                    showNotification("Terjadi kesalahan!", "error");
                });
        }
    </script>
</body>

</html>