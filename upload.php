<?php
session_start();
include 'koneksi.php'; // Pastikan file ini ada dan berisi koneksi ke database

$target_dir = "uploads/";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($_FILES["Uploads"]["name"], PATHINFO_EXTENSION));
$filename = basename($_FILES["Uploads"]["name"]);
$target_file = $target_dir . $filename;

// Periksa apakah file diunggah
if(isset($_POST["submit"])) {
    if (!empty($_FILES["Uploads"]["tmp_name"])) {
        $check = getimagesize($_FILES["Uploads"]["tmp_name"]);
        if($check !== false || $imageFileType == "pdf") {
            $uploadOk = 1;
        } else {
            echo "File bukan gambar atau PDF.";
            $uploadOk = 0;
        }
    }
}

// Periksa apakah file sudah ada
if (file_exists($target_file)) {
    echo "Maaf, file sudah ada.";
    $uploadOk = 0;
}

// Periksa ukuran file (maksimal 5MB)
if ($_FILES["Uploads"]["size"] > 5000000) {
    echo "Maaf, ukuran file terlalu besar.";
    $uploadOk = 0;
}

// Hanya izinkan format tertentu
$allowed_types = ["jpg", "jpeg", "png", "pdf"];
if (!in_array($imageFileType, $allowed_types)) {
    echo "Maaf, hanya file JPG, JPEG, PNG, dan PDF yang diperbolehkan.";
    $uploadOk = 0;
}

// Jika tidak ada error, unggah file
if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["Uploads"]["tmp_name"], $target_file)) {
        // Simpan data ke database
        $sql = "INSERT INTO uploads (filename, filepath) VALUES ('$filename', '$target_file')";
        if (mysqli_query($koneksi, $sql)) {
            echo "File berhasil diunggah dan disimpan di database.";
        } else {
            echo "Gagal menyimpan ke database: " . mysqli_error($koneksi);
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }
} else {
    echo "File tidak diunggah.";
}
?>
