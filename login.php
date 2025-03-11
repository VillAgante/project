<?php 
session_start(); 
require_once "config.php"; 

$error = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $email = $_POST['email']; 
    $password = $_POST['password']; 

    $stmt = $pdo->prepare("SELECT id, nama, password FROM users WHERE email = :email"); 
    $stmt->bindParam(":email", $email); 
    $stmt->execute(); 
    $user = $stmt->fetch(PDO::FETCH_ASSOC); 

    if ($user && password_verify($password, $user["password"])) { 
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["nama"] = $user["nama"]; 
        header("Location: index.html"); 
        exit(); 
    } else { 
        $error = "Email atau password salah"; 
    } 
} 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HR Management Systems</title>
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
            <h2 class="text-center mb-4">Login</h2>
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <div class="text-center mt-3">
                <a href="register.php">Belum punya akun? Daftar disini</a>
            </div>
        </div>
    </div>
</body>
</html>
