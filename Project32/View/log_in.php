<?php
require_once '../functions.php';
session_start();

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST' && isset($_POST['username'])) {
    $username = $_POST['username'];
    $_SESSION['username'] = $username;
    $password = $_POST['password'];

    if (checkLogIn($username, $password)) {
        header("Location:../View/home.php");
    } else {
        header("Location: ../View/log_in.php?error=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        h3 {
            color: blueviolet;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center text-uppercase">Log in</h3>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST">
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter your username" name='username'>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <?php
        // Check if there is an error parameter in the URL
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<script>alert("Tên người dùng hoặc mật khẩu không chính xác. Vui lòng thử lại.");</script>';
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
