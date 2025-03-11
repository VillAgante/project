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
    <title>Monitoring</title>
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
    <h1>Monitoring</h1>
    <div class="top-action">
        <a href="tambah_monitoring.php"><button> (+) Tambah Monitoring</button></a>
    </div>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Bidang</th>
                <th>Judul Diklat/Sertifikasi</th>
                <th>Provider</th>
                <th>Tanggal Pelaksanaan</th>
                <th>Status</th>
                <th>Nomor Sertifikat</th>
                <th>Tanggal Sertifikat</th>
                <th>Tanggal Expired</th>
                <th>Dokumen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "
                SELECT 
                    m.NO, 
                    p.NIP, 
                    p.Nama_Pegawai AS Nama, 
                    p.Nama_Panjang_Posisi AS Jabatan, 
                    p.Bidang, 
                    a.Program_Diklat_Sertifikasi AS Judul_Diklat_Sertifikasi, 
                    a.Provider, 
                    m.Tanggal_Pelaksanaan, 
                    m.Status, 
                    m.Nomor_Sertifikat, 
                    m.Tanggal_Sertifikat, 
                    m.Tanggal_Expired, 
                    m.Dokumen
                FROM monitoring m
                JOIN pegawai p ON m.NIP = p.NIP
                JOIN anggaran a ON m.Judul_Diklat_Sertifikasi = a.Program_Diklat_Sertifikasi
            ";
            $result = mysqli_query($koneksi, $query);

            if (!$result) {
                die("Query error: " . mysqli_error($koneksi));
            }

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['NO']}</td>
                        <td>{$row['NIP']}</td>
                        <td>{$row['Nama']}</td>
                        <td>{$row['Jabatan']}</td>
                        <td>{$row['Bidang']}</td>
                        <td>{$row['Judul_Diklat_Sertifikasi']}</td>
                        <td>{$row['Provider']}</td>
                        <td>" . ($row['Tanggal_Pelaksanaan'] ? $row['Tanggal_Pelaksanaan'] : '') . "</td>
                        <td>{$row['Status']}</td>
                        <td>" . ($row['Nomor_Sertifikat'] ? $row['Nomor_Sertifikat'] : '') . "</td>
                        <td>" . ($row['Tanggal_Sertifikat'] ? $row['Tanggal_Sertifikat'] : '') . "</td>
                        <td>" . ($row['Tanggal_Expired'] ? $row['Tanggal_Expired'] : '') . "</td>
                        <td>" . ($row['Dokumen'] ? "<a href='uploads/{$row['Dokumen']}' target='_blank'>Lihat Dokumen</a>" : '') . "</td>
                        <td>
                            <a href='edit_monitoring.php?NO={$row['NO']}' class='btn btn-edit'>Edit</a>
                            <a href='delete_monitoring.php?NO={$row['NO']}' class='btn btn-delete' onclick=\"return confirm('Apakah kamu yakin menghapus data ini?')\">Hapus</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='14' style='text-align: center;'>Tidak ada data ditemukan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>