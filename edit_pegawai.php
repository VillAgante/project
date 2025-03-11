<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$nip = $_GET['NIP'];
$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE NIP='$nip'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pegawai = $_POST['nama_pegawai'];
    $nama_panjang_posisi = $_POST['nama_panjang_posisi'];
    $bidang = $_POST['bidang'];
    $sub_bidang = $_POST['sub_bidang'];
    $bagian = !empty($_POST['bagian']) ? "'".$_POST['bagian']."'" : "NULL";

    $query = "UPDATE pegawai SET 
              Nama_Pegawai='$nama_pegawai', 
              Nama_Panjang_Posisi='$nama_panjang_posisi', 
              Bidang='$bidang', 
              Sub_bidang='$sub_bidang', 
              Bagian=$bagian 
              WHERE NIP='$nip'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: pegawai.php");
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
    <title>Edit Pegawai</title>
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
        input[type="text"] {
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
        <h1>Edit Pegawai</h1>
        <form method="POST" action="">
            <label for="nip">NIP</label>
            <input type="text" name="nip" value="<?php echo $data['NIP']; ?>" readonly>

            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" name="nama_pegawai" value="<?php echo $data['Nama_Pegawai']; ?>" required>

            <label for="nama_panjang_posisi">Nama Panjang Posisi</label>
            <input type="text" name="nama_panjang_posisi" value="<?php echo $data['Nama_Panjang_Posisi']; ?>" required>

            <label for="bidang">Bidang</label>
            <input type="text" name="bidang" value="<?php echo $data['Bidang']; ?>" required>

            <label for="sub_bidang">Sub Bidang</label>
            <input type="text" name="sub_bidang" value="<?php echo $data['Sub_bidang']; ?>" required>

            <label for="bagian">Bagian</label>
            <input type="text" name="bagian" value="<?php echo $data['Bagian']; ?>">

            <div class="button-group">
                <button type="button" onclick="window.location.href='pegawai.php'">Cancel</button>
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const arrows = document.querySelectorAll('.arrow');
            arrows.forEach(arrow => {
                arrow.addEventListener('click', function() {
                    const subMenu = this.nextElementSibling;
                    subMenu.classList.toggle('show');
                });
            });
        });
    </script>
</body>
</html>