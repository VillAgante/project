<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pegawai</title>
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
        h1 {
            text-align: center;
            color: #3E8DA8;
            margin-top: 80px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #3E8DA8;
            color: white;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 3px;
        }
        .btn-tambah {
            background-color: #28a745;
        }
        .btn-logout {
            background-color: #dc3545;
        }
        .btn-edit {
            background-color: #4CAF50;
        }
        .btn-view {
            background-color: #2196F3;
        }
        .btn-delete {
            background-color: #f44336;
        }
        .top-action {
            text-align: center;
            margin: 20px 0;
        }
        .top-action a button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .top-action a button:hover {
            background-color: #218838;
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
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #3E8DA8;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #2c6a7e;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .year-selector {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .year-selector span {
            margin: 0 10px;
            padding: 10px 20px;
            background-color: #3E8DA8;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .year-selector span:hover {
            background-color: #2c6a7e;
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
        <ul class="links"> 
        <a href="index.html">HOME</a>
        <a href="pegawai.php">PEGAWAI</a>
        <a href="anggaran.php">ANGGARAN</a>
        <a href="monitoring.php">MONITORING</a>
        <a href="about.html">ABOUT US</a>
        <a href="logout.php">LOGOUT</a> 
        </ul> 
        </div>
    </nav>
    <div class="container">
        <h1>Manajemen Pegawai</h1>
        <div class="top-action">
            <a href="tambah_pegawai.php"><button>(+) Tambah Pegawai</button></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Nama Panjang Posisi</th>
                    <th>Bidang</th>
                    <th>Sub Bidang</th>
                    <th>Bagian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($koneksi, "SELECT * FROM pegawai");
                if (!$result) {
                    die("Query error: " . mysqli_error($koneksi));
                }
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['NIP']}</td>
                        <td>{$row['Nama_Pegawai']}</td>
                        <td>{$row['Nama_Panjang_Posisi']}</td>
                        <td>{$row['Bidang']}</td>
                        <td>{$row['Sub_bidang']}</td>
                        <td>{$row['Bagian']}</td>
                        <td>
                            <a href='edit_pegawai.php?NIP={$row['NIP']}' class='btn btn-edit'>Edit</a>
                            <a href='delete_pegawai.php?NIP={$row['NIP']}' class='btn btn-delete' onclick=\"return confirm('Apakah kamu yakin menghapus data ini?')\">Hapus</a>
                        </td>
                    </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>