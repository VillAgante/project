<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// Ambil data pegawai dan anggaran
$query_pegawai = "SELECT NIP, Nama_Pegawai, Nama_Panjang_Posisi, Bidang FROM pegawai";
$result_pegawai = mysqli_query($koneksi, $query_pegawai);

$query_anggaran = "SELECT Program_Diklat_Sertifikasi, Provider, Waktu_Pelaksanaan FROM anggaran";
$result_anggaran = mysqli_query($koneksi, $query_anggaran);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $judul_diklat = $_POST['judul_diklat'];
    $nomor_sertifikat = $_POST['nomor_sertifikat'];
    $tanggal_sertifikat = $_POST['tanggal_sertifikat'];
    $tanggal_expired = $_POST['tanggal_expired'];
    $tanggal_pelaksanaan = !empty($_POST['tanggal_pelaksanaan']) ? $_POST['tanggal_pelaksanaan'] : null;
    $dokumen = !empty($_FILES['dokumen']['name']) ? $_FILES['dokumen']['name'] : null;
    $dokumen_tmp = !empty($_FILES['dokumen']['tmp_name']) ? $_FILES['dokumen']['tmp_name'] : null;

    // Query untuk mengambil data pegawai dan anggaran
    $query_pegawai_data = "SELECT Nama_Pegawai, Nama_Panjang_Posisi, Bidang FROM pegawai WHERE NIP = '$nip'";
    $result_pegawai_data = mysqli_query($koneksi, $query_pegawai_data);
    $pegawai_data = mysqli_fetch_assoc($result_pegawai_data);

    $query_anggaran_data = "SELECT Provider, Waktu_Pelaksanaan FROM anggaran WHERE Program_Diklat_Sertifikasi = '$judul_diklat'";
    $result_anggaran_data = mysqli_query($koneksi, $query_anggaran_data);
    $anggaran_data = mysqli_fetch_assoc($result_anggaran_data);

    // Insert data ke tabel monitoring (without Jabatan)
    $query = "INSERT INTO monitoring (NIP, Nama, Bidang, Judul_Diklat_Sertifikasi, Provider, Nomor_Sertifikat, Tanggal_Sertifikat, Tanggal_Expired, Tanggal_Pelaksanaan, Dokumen) 
              VALUES ('$nip', '{$pegawai_data['Nama_Pegawai']}', '{$pegawai_data['Bidang']}', '$judul_diklat', '{$anggaran_data['Provider']}', '$nomor_sertifikat', '$tanggal_sertifikat', '$tanggal_expired', " . ($tanggal_pelaksanaan ? "'$tanggal_pelaksanaan'" : "NULL") . ", " . ($dokumen ? "'$dokumen'" : "NULL") . ")";

    if (mysqli_query($koneksi, $query)) {
        header("Location: monitoring.php");
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
    <title>Tambah Monitoring</title>
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
    <h1>Tambah Monitoring</h1>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="nip">NIP</label>
        <select name="nip" id="nip" required>
            <option value="">Pilih NIP</option>
            <?php while ($row = mysqli_fetch_assoc($result_pegawai)): ?>
                <option value="<?php echo $row['NIP']; ?>">
                    <?php echo $row['NIP'] . " - " . $row['Nama_Pegawai']; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="judul_diklat">Judul Diklat/Sertifikasi</label>
        <select name="judul_diklat" id="judul_diklat" required>
            <option value="">Pilih Judul Diklat/Sertifikasi</option>
            <?php while ($row = mysqli_fetch_assoc($result_anggaran)): ?>
                <option value="<?php echo $row['Program_Diklat_Sertifikasi']; ?>">
                    <?php echo $row['Program_Diklat_Sertifikasi']; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="nomor_sertifikat">Nomor Sertifikat</label>
        <input type="text" name="nomor_sertifikat">

        <label for="tanggal_sertifikat">Tanggal Sertifikat</label>
        <input type="date" name="tanggal_sertifikat">

        <label for="tanggal_expired">Tanggal Expired</label>
        <input type="date" name="tanggal_expired">

        <label for="dokumen">Dokumen</label>
        <input type="file" name="dokumen">

        <div class="button-group">
            <button type="button" onclick="window.location.href='monitoring.php'">Cancel</button>
            <button type="submit">Save</button>
        </div>
    </form>
</div>
</body>
</html>