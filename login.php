<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Pemesanan</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .form-section {
            background: #ffffff;
            padding: 40px 55px;
            border-radius: 18px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            text-align: center;
            width: 380px;
        }

        .form-section img {
            width: 120px;
            margin-bottom: 20px;
        }

        .form-section form {
            display: flex;
            flex-direction: column;   
            gap: 15px;                
        }

        .form-section input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 17px;
        }

        .form-section button {
            width: 100%;
            padding: 15px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            cursor: pointer;
        }

        .form-section button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

    <div class="form-section">
        <img src="logo.png" alt="Logo">

        <form id="orderForm" action="home.php" method="GET">
    <input type="text" id="nama" name="nama" placeholder="Nama Pemesan" required>
    <button type="submit">Mulai Pesan</button>
</form>

    </div>

</body>
</html>
