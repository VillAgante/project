<?php
include "koneksi.php";

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if(isset($_GET['NO'])) {
    $no = $_GET['NO'];

    $query = "DELETE FROM monitoring WHERE NO ='$no'";

    if(mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data monitoring telah dihapus');
                window.location.href='monitoring.php';
              </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "<script>
            alert('NO tidak ditemukan');
            window.location.href='monitoring.php';
          </script>";
}
?>