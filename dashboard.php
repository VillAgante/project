<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard HRM System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 3px;
        }
        .btn-edit {
            background-color: #4CAF50;
        }
        .btn-delete {
            background-color: #f44336;
        }
        .btn-view {
            background-color: #2196F3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang, <?php echo $_SESSION['nama']; ?>!</h1>
        <a href="logout.php">Logout</a>

        <h2>Manajemen Pegawai</h2>
        <a href="tambah_pegawai.php">Tambah Pegawai</a>
        <table>
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Bidang</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $pdo->query("SELECT * FROM pegawai");
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$row['nip']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['bidang']}</td>
                            <td>{$row['jabatan']}</td>
                            <td>
                                <a href='edit_pegawai.php?id={$row['nip']}' class='btn btn-edit'>Edit</a>
                                <a href='lihat_pegawai.php?id={$row['nip']}' class='btn btn-view'>Lihat</a>
                                <a href='hapus_pegawai.php?id={$row['nip']}' class='btn btn-delete'>Hapus</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Anggaran Pelatihan</h2>
        <a href="tambah_anggaran.php">Tambah Anggaran</a>
        <table>
            <thead>
                <tr>
                    <th>Judul Diklat/Sertifikasi</th>
                    <th>Jenis</th>
                    <th>Provider</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $pdo->query("SELECT * FROM anggaran");
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$row['judul_diklat']}</td>
                            <td>{$row['jenis']}</td>
                            <td>{$row['provider']}</td>
                            <td>{$row['status']}</td>
                            <td>
                                <a href='edit_anggaran.php?id={$row['id']}' class='btn btn-edit'>Edit</a>
                                <a href='lihat_anggaran.php?id={$row['id']}' class='btn btn-view'>Lihat</a>
                                <a href='hapus_anggaran.php?id={$row['id']}' class='btn btn-delete'>Hapus</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Monitoring Pelaksanaan Diklat/Sertifikasi</h2>
        <a href="tambah_monitoring.php">Tambah Monitoring</a>
        <table>
            <thead>
                <tr>
                    <th>Judul Diklat/Sertifikasi</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $pdo->query("SELECT * FROM monitoring_pelaksanaan_diklat");
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$row['judul_diklat']}</td>
                            <td>{$row['nip']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['status']}</td>
                            <td>
                                <a href='edit_monitoring.php?id={$row['id']}' class='btn btn-edit'>Edit</a>
                                <a href='lihat_monitoring.php?id={$row['id']}' class='btn btn-view'>Lihat</a>
                                <a href='hapus_monitoring.php?id={$row['id']}' class='btn btn-delete'>Hapus</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>