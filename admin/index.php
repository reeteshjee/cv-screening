<?php 
include('../config/config.php');
if(isset($_SESSION['username'])){
    header("Location: dashboard.php");
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username=='reetesh' && $password=='reetesh'){
        $_SESSION['admin'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    }else{
        $_SESSION['flash'] = "Invalid credentials";
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #665fd5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        .btn-primary {
            background-color: #665fd5;
            border-color: #554ec0;
        }
        .btn-primary:hover {
            background-color: #554ec0;
            border-color: #443ea9;
        }
    </style>
</head>
<body>
    <div class="login-container text-center">
        <h2 class="mb-4" style="color: #665fd5;">Admin Login</h2>
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
