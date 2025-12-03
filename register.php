<?php
require "mysql.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $password_confirm = isset($_POST["password_confirm"]) ? $_POST["password_confirm"] : "";

    // Validasi dasar
    if ($username === "" || $password === "" || $password_confirm === "") {
        header("Location: register.html?reg_error=empty");
        exit;
    }

    if ($password !== $password_confirm) {
        header("Location: register.html?reg_error=not_match");
        exit;
    }

    if (strlen($password) < 6) {
        header("Location: register.html?reg_error=short");
        exit;
    }

    // Cek username sudah ada atau belum
    $checkQuery = "SELECT user_id FROM users WHERE username = '$username' LIMIT 1";
    $checkResult = $mysql->query($checkQuery);

    if ($checkResult && $checkResult->num_rows > 0) {
        header("Location: register.html?reg_error=user_taken");
        exit;
    }

    // Simpan user baru
    $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($mysql->query($insertQuery)) {
        header("Location: index.html?success=1");
        exit;
    } else {
        header("Location: register.html?reg_error=unknown");
        exit;
    }

} else {
    header("Location: register.html");
    exit;
}
?>