<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// Validasi jika parameter NO tidak ada
if (!isset($_GET['NO']) || empty($_GET['NO'])) {
    die("No tidak ditemukan.");
}

$no = $_GET['NO'];

// Ambil data dari database berdasarkan NO
$query = mysqli_query($koneksi, "SELECT * FROM monitoring WHERE NO='$no'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan.");
}

// Ambil data pegawai untuk dropdown
$query_pegawai = "SELECT NIP, Nama_Pegawai, Nama_Panjang_Posisi, Bidang FROM pegawai";
$result_pegawai = mysqli_query($koneksi, $query_pegawai);

// Ambil data anggaran untuk dropdown
$query_anggaran = "SELECT Program_Diklat_Sertifikasi, Provider FROM anggaran";
$result_anggaran = mysqli_query($koneksi, $query_anggaran);

// Proses update data jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $judul_diklat = $_POST['judul_diklat'];
    $nomor_sertifikat = $_POST['nomor_sertifikat'];
    $tanggal_sertifikat = $_POST['tanggal_sertifikat'];
    $tanggal_expired = $_POST['tanggal_expired'];
    $tanggal_pelaksanaan = !empty($_POST['tanggal_pelaksanaan']) ? $_POST['tanggal_pelaksanaan'] : null;
    $status = $_POST['status'] ?? null;

    // Proses upload dokumen
    $dokumen = $data['Dokumen']; // Default pakai yang lama
    if (!empty($_FILES['dokumen']['name'])) {
        $upload_dir = "uploads/";
        $dokumen = basename($_FILES['dokumen']['name']);
        $dokumen_tmp = $_FILES['dokumen']['tmp_name'];

        move_uploaded_file($dokumen_tmp, $upload_dir . $dokumen);
    }

    // Query update data
    $query_update = "UPDATE monitoring SET 
              NIP='$nip', 
              Judul_Diklat_Sertifikasi='$judul_diklat', 
              Tanggal_Pelaksanaan=" . ($tanggal_pelaksanaan ? "'$tanggal_pelaksanaan'" : "NULL") . ", 
              Status='$status', 
              Nomor_Sertifikat='$nomor_sertifikat', 
              Tanggal_Sertifikat='$tanggal_sertifikat', 
              Tanggal_Expired='$tanggal_expired', 
              Dokumen=" . ($dokumen ? "'$dokumen'" : "NULL") . " 
              WHERE NO='$no'";

    if (mysqli_query($koneksi, $query_update)) {
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
    <title>Edit Monitoring</title>
    <link rel="stylesheet" href="style.css">
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
    <h1>Edit Monitoring</h1>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="nip">NIP</label>
        <input type="text" name="nip" value="<?php echo htmlspecialchars($data['NIP']); ?>" required>

        <label for="judul_diklat">Judul Diklat/Sertifikasi</label>
        <input type="text" name="judul_diklat" value="<?php echo htmlspecialchars($data['Judul_Diklat_Sertifikasi']); ?>" required>

        <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
        <input type="date" name="tanggal_pelaksanaan" value="<?php echo htmlspecialchars($data['Tanggal_Pelaksanaan'] ?? ''); ?>">

        <label for="status">Status</label>
        <select name="status" required>
            <option value="Lulus" <?php echo ($data['Status'] == 'Lulus') ? 'selected' : ''; ?>>Lulus</option>
            <option value="Tidak Lulus" <?php echo ($data['Status'] == 'Tidak Lulus') ? 'selected' : ''; ?>>Tidak Lulus</option>
        </select>

        <label for="nomor_sertifikat">Nomor Sertifikat</label>
        <input type="text" name="nomor_sertifikat" value="<?php echo htmlspecialchars($data['Nomor_Sertifikat']); ?>">

        <label for="tanggal_sertifikat">Tanggal Sertifikat</label>
        <input type="date" name="tanggal_sertifikat" value="<?php echo htmlspecialchars($data['Tanggal_Sertifikat']); ?>">

        <label for="tanggal_expired">Tanggal Expired</label>
        <input type="date" name="tanggal_expired" value="<?php echo htmlspecialchars($data['Tanggal_Expired']); ?>">

        <label for="dokumen">Dokumen</label>
        <input type="file" name="dokumen">
        <?php if (!empty($data['Dokumen'])) : ?>
            <small>Dokumen saat ini: <a href="uploads/<?php echo htmlspecialchars($data['Dokumen']); ?>" target="_blank"><?php echo htmlspecialchars($data['Dokumen']); ?></a></small>
        <?php endif; ?>

        <div class="button-group">
            <button type="button" onclick="window.location.href='monitoring.php'">Cancel</button>
            <button type="submit">Update</button>
        </div>
    </form>
</div>

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
</body>
</html>
