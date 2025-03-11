<?php 
include 'config.php'; 

$error = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nama = $_POST['nama']; 
    $email = $_POST['email']; 
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email"); 
    $stmt->bindParam(":email", $email); 
    $stmt->execute(); 

    if ($stmt->rowCount() > 0) { 
        $error = "Email sudah terdaftar! Silakan gunakan email lain."; 
    } else { 
        $query = "INSERT INTO users (nama, email, password) VALUES (:nama, :email, :password)"; 
        $stmt = $pdo->prepare($query); 
        $stmt->bindParam(":nama", $nama); 
        $stmt->bindParam(":email", $email); 
        $stmt->bindParam(":password", $password); 

        if ($stmt->execute()) { 
            header("Location: login.php"); 
            exit(); 
        } else { 
            $error = "Terjadi kesalahan saat mendaftar. Silakan coba lagi."; 
        } 
    } 
} 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - HR Management Systems</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('background_login.png') no-repeat center center;
            background-size: cover;
        }
        .card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .logo {
            display: block;
            width: 80px;
            margin: 0 auto 15px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4" style="width: 400px;">
            <img src="logoB.png" alt="Logo PLN" class="logo">
            <h2 class="text-center mb-4">Daftar</h2>
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Daftar</button>
            </form>
            <div class="text-center mt-3">
                <a href="login.php">Sudah punya akun? Login disini</a>
            </div>
        </div>
    </div>
</body>
</html>
