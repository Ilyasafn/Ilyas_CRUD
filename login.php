<?php 
session_start();
require 'functions.php';

// cek cookie
if ( isset($_COOKIE['rahasia']) && isset($_COOKIE['apahayo'])) {
    $id = $_COOKIE['rahasia'];
    $key = $_COOKIE['apahayo'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = '$id'");
    $row = mysqli_fetch_array($result);

    // cek cookie dan username
    if ( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}


if ( isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

if ( isset($_POST['login']) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");


    // cek username 
    if ( mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ) {
            // set session 
            $_SESSION["login"] = true;
            
            // cek remember me
            if ( isset($_POST["remember"]) ) {
                // buat cookie
            setcookie( 'rahasia', $row['id'], time()+3600);
            setcookie( 'apahayo', hash('sha256', $row['username']), time()+3600 );
            header('Location: index.php');
            exit;
        } 
    }

    $error = true;
}
}
?>


<!DOCTYPE html>
<html data-theme="forest" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />

    <style>
        .hero {
            margin: 100px auto;
        }
    </style>
</head>
<body>
    <!-- LOGIN -->
    <div class="hero min-h-screen bg-base-100">
        <div class="hero-content flex-col lg:flex-row-reverse ">
            <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-200">
                <form action="" class="card-body" method="post" autocomplete="off">
                    <!-- USERNAME -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" placeholder="username" name="username" class="input input-bordered" autofocus required />
                    </div>
                    <!-- USERNAME END -->

                    <!-- PASSWORD -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" placeholder="password" name="password" class="input input-bordered" required />
                    </div>
                    <!-- PASSWORD END -->

                    <!-- REMEMBER -->
                    <div class="form-control">
                        <label class="cursor-pointer label">
                            <span class="label-text">Remember me</span>
                            <input type="checkbox" checked="checked" class="checkbox checkbox-secondary" name="remember"/>
                        </label>
                    </div>
                    <!-- REMEMBER END -->

                    <!-- LOGIN BUTTON -->
                    <div class="form-control mt-4">
                        <button class="btn btn-primary" type="submit" name="login">Login!</button>
                    </div>
                    <!-- LOGIN BUTTON END -->

                    <!-- Register -->
                    <label class="label-text-alt">
                            Belum punya akun ?
                            <a href="registrasi.php" class="label-text-alt link link-hover">Register!</a>
                        </label>
                    <!-- Register END -->

                    <?php if( isset($error) ) : ?>
                        <p style="color: red; font-style:italic;">Username / password salah</p>
                    <?php endif; ?>

                </form>
            </div>
        </div>
    </div>        


    </form>
</body>
</html>