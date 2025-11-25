<?php
session_start();
require "mysql.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    // kalau kosong, balik aja ke form
    if ($username === "" || $password === "") {
        header("Location: index.html?error=1");
        exit;
    }

    // pakai prepared statement
    $stmt = $mysql->prepare("SELECT user_id, username, password, role FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // contoh sederhana: password disimpan polos di database
        // (untuk production sebaiknya gunakan password_hash dan password_verify)
        if ($password === $row["password"]) {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["role"] = $row["role"];


            if ($row["role"] === "admin") {
                header("Location: contact.php");
            } else {
                header("Location: home.php");
            }
            exit;
        }
    }

    // kalau salah username/password
    header("Location: index.html?error=1");
    exit;
} else {
    header("Location: index.html");
    exit;
}
