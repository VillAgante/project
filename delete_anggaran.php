<?php
include "koneksi.php";

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if(isset($_GET['NO'])) {
    $no = $_GET['NO'];

    $query = "DELETE FROM anggaran WHERE NO ='$no'";

    if(mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data anggaran telah dihapus');
                window.location.href='anggaran.php';
              </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "<script>
            alert('NO tidak ditemukan');
            window.location.href='anggaran.php';
          </script>";
}
?>