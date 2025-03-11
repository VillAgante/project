<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $program_diklat = $_POST['program_diklat'];
    $sasaran_tujuan = $_POST['sasaran_tujuan'];
    $jenis = $_POST['jenis'];
    $waktu_pelaksanaan = $_POST['waktu_pelaksanaan'];
    $provider = $_POST['provider'];
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $harga_satuan = $_POST['harga_satuan'];
    $total = $jumlah_peserta * $harga_satuan;
    $status = $_POST['status'];

    $query = "INSERT INTO anggaran (Program_Diklat_Sertifikasi, Sasaran_Tujuan_Diklat, Jenis, Waktu_Pelaksanaan, Provider, Jumlah_Peserta, Harga_Satuan_Paket, Total, Status) 
              VALUES ('$program_diklat', '$sasaran_tujuan', '$jenis', '$waktu_pelaksanaan', '$provider', '$jumlah_peserta', '$harga_satuan', '$total', '$status')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: anggaran.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggaran</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('background_main.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 100px auto 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #3E8DA8;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="date"], input[type="number"], select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 48%;
        }
        button[type="submit"] {
            background-color: #28a745;
            color: white;
        }
        button[type="submit"]:hover {
            background-color: #218838;
        }
        button[type="button"] {
            background-color: #dc3545;
            color: white;
        }
        button[type="button"]:hover {
            background-color: #c82333;
        }
        nav {
            background-color: #3E8DA8;
            padding: 10px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 30px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="logoA.png" alt="Logo PLN">
            <a href="#">PLN</a>
        </div>
        <div class="nav-links">
            <a href="index.html">HOME</a>
            <a href="pegawai.php">PEGAWAI</a>
            <a href="anggaran.php">ANGGARAN</a>
            <a href="monitoring.php">MONITORING</a>
            <a href="about.html">ABOUT US</a>
            <a href="logout.php">LOGOUT</a>
        </div>
    </nav>

    <div class="container">
        <h1>Tambah Anggaran</h1>
        <form method="POST" action="tambah_anggaran.php">
            <label for="program_diklat">Program Diklat/Sertifikasi</label>
            <input type="text" name="program_diklat" required>

            <label for="sasaran_tujuan">Sasaran / Tujuan Diklat</label>
            <input type="text" name="sasaran_tujuan" required>

            <label for="jenis">Jenis (Diklat/Sertifikasi)</label>
            <select name="jenis" required>
                <option value="Diklat">Diklat</option>
                <option value="Sertifikasi">Sertifikasi</option>
            </select>

            <label for="waktu_pelaksanaan">Waktu Pelaksanaan</label>
            <input type="date" name="waktu_pelaksanaan" required>

            <label for="provider">Provider</label>
            <input type="text" name="provider" required>

            <label for="jumlah_peserta">Jumlah Peserta</label>
            <input type="number" name="jumlah_peserta" required>

            <label for="harga_satuan">Harga Satuan/Paket</label>
            <input type="number" name="harga_satuan" required>

            <label for="status">Status</label>
            <select name="status" required>
                <option value="Terencana">Terencana</option>
                <option value="Terealisasi">Terealisasi</option>
                <option value="Terkontrak">Terkontrak</option>
                <option value="Batal">Batal</option>
            </select>

            <div class="button-group">
                <button type="button" onclick="window.location.href='anggaran.php'">Cancel</button>
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
</body>
</html>