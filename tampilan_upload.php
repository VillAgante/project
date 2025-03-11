<?php
include 'koneksi.php';

$sql = "SELECT * FROM uploads ORDER BY upload_date DESC";
$result = mysqli_query($koneksi, $sql);

echo "<h2>Daftar File yang Diupload</h2>";
echo "<ul>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li><a href='{$row['filepath']}' target='_blank'>{$row['filename']}</a></li>";
}
echo "</ul>";
?>
