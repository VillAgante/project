<?php
include "koneksi.php";

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if(isset($_GET['NIP'])) {
    $NIP = $_GET['NIP'];

    $query = "DELETE FROM pegawai WHERE NIP ='$NIP'";

    if(mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data pegawai telah dihapus');
                window.location.href='pegawai.php';
              </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "<script>
            alert('NIP tidak ditemukan');
            window.location.href='pegawai.php';
          </script>";
}
?>
