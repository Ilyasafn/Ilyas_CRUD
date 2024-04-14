<?php 
require 'functions.php';

if ( isset($_POST["register"]) ) {

    if( registrasi($_POST) > 0 ) {
        echo "
        <script>
            alert('User baru berhasil di tambahkan');
            document.location.href = 'login.php';
        </script>";
    } else {
        echo mysqli_error($conn);
    }

}


?>


<!DOCTYPE html>
<html data-theme="forest" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />


    <style>
        .hero {
            margin: 80px auto;
        }
    </style>
</head>
<body>
    <div class="hero min-h-screen bg-base-100">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-200">
                <form action="" class="card-body" method="post" autocomplete="off">
                    <!-- USERNAME -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" placeholder="username" name="username" class="input input-bordered" required />
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

                    <!-- PASSWORD 2 -->
                    <div class="form-controlx">
                        <label class="label ">
                            <span class="label-text ">Konfirmasi Password</span>
                        </label>
                        <input type="password" placeholder="password" name="password2" class="input input-bordered" required />
                    </div>
                    <!-- PASSWORD 2 END -->

                    <div class="form-control">
                        <button class="btn btn-primary " type="submit" name="register">Register!</button>
                    </div>
                    
                    <!-- Login -->
                    <label class="label-text-alt">
                            Sudah punya akun ?
                            <a href="login.php" class="label-text-alt link link-hover">Login!</a>
                        </label>
                    <!-- Login END -->

                </form>
            </div>
        </div>
    </div>




</body>
</html>