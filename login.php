<?php
session_start();
require "mysql.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    // kalau kosong kembali ke form
    if ($username === "" || $password === "") {
        header("Location: index.html?error=1");
        exit;
    }

    // langsung query tanpa prepare
    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($mysql, $sql);

    if ($result && mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        // cek password (plain, sesuai sistemmu)
        if ($password === $row["password"]) {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["role"] = $row["role"];

            // redirect sesuai role
            if ($row["role"] === "admin") {
                header("Location: adminHome.php");
            } else {
                header("Location: home.php");
            }
            exit;
        }
    }

    // kalau login gagal
    header("Location: index.html?error=1");
    exit;

} else {
    header("Location: index.html");
    exit;
}
