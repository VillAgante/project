<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$selected_year = isset($_GET['year']) ? $_GET['year'] : date('Y');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Anggaran</title>
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
            <a href="index.html">HOME</a>
            <a href="pegawai.php">PEGAWAI</a>
            <a href="anggaran.php">ANGGARAN</a>
            <a href="monitoring.php">MONITORING</a>
            <a href="about.html">ABOUT US</a>
            <a href="logout.php">LOGOUT</a>
        </div>
    </nav>
    <div class="container">
        <h1>Manajemen Anggaran</h1>
        <div class="top-action">
            <a href="tambah_anggaran.php"><button>(+) Tambah Anggaran</button></a>
        <div class="year-selector">
            <span class="<?= ($selected_year == 2023) ? 'active' : '' ?>">
                <a href="?year=2023">2023</a>
            </span>
            <span class="<?= ($selected_year == 2024) ? 'active' : '' ?>">
                <a href="?year=2024">2024</a>
            </span>
            <span class="<?= ($selected_year == 2025) ? 'active' : '' ?>">
                <a href="?year=2025">2025</a>
            </span>
        </div>
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Program Diklat/Sertifikasi</th>
                    <th>Sasaran/Tujuan</th>
                    <th>Jenis</th>
                    <th>Waktu Pelaksanaan</th>
                    <th>Provider</th>
                    <th>Jumlah Peserta</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM anggaran WHERE YEAR(Waktu_Pelaksanaan) = $selected_year";
                $result = mysqli_query($koneksi, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
    <td>{$row['NO']}</td>
    <td>{$row['Program_Diklat_Sertifikasi']}</td>
    <td>{$row['Sasaran_Tujuan_Diklat']}</td>
    <td>{$row['Jenis']}</td>
    <td>{$row['Waktu_Pelaksanaan']}</td>
    <td>{$row['Provider']}</td>
    <td>{$row['Jumlah_Peserta']}</td>
    <td>Rp " . number_format($row['Harga_Satuan_Paket'], 0, ',', '.') . "</td>
    <td>Rp " . number_format($row['Total'], 0, ',', '.') . "</td>
    <td><span class='status {$row['Status']}'>{$row['Status']}</span></td>
    <td>
        <a href='edit_anggaran.php?NO={$row['NO']}' class='btn-edit'><i class='bx bx-edit'></i></a>
        <a href='delete_anggaran.php?NO={$row['NO']}' class='btn-delete' onclick='return confirm(\"Yakin hapus?\")'><i class='bx bx-trash'></i></a>
    </td>
</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>