<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
  header('Location: login.php');
  exit;
}
require 'functions.php';

// cek apakah tombol submit sudah ditekan
if ( isset ($_POST["submit"]) ) {


    // cek apakah data berhasil di tambah / tdk
    if ( tambah($_POST) > 0 ) {
        echo 
        "<script>
        alert('Data berhasil di tambahkan');
        document.location.href = 'pegawai.php';
        </script>";
    } else {
        echo 
        "<script>
        alert('Data gagal di tambahkan');
        </script>";
    }
} 

?>



<!DOCTYPE html>
<html data-theme="forest" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hero {
            margin: 100px auto;
        }
    </style>
</head>
<body>
    <div class="hero bg-base-100">
        <div class="hero-content">
            <div class="card p-5 shrink-0 w-full max-w-sm shadow-2xl bg-base-200">
                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">

                    <ul>
                        <li>
                            <label for="nama">Nama :</label><br>
                            <input type="text" name="nama" id="nama" required placeholder="Masukkan nama..." class="input input-bordered w-full max-w-xs" />
                        </li>
                        <li>
                            <label for="nik">Nik :</label><br>
                            <input type="text" name="nik" id="nik" required placeholder="Masukkan NIK..." class="input input-bordered w-full max-w-xs" />

                        </li>
                        <li>
                            <label for="email">Email :</label><br>
                            <input type="text" name="email" id="email" required placeholder="Masukkan email.." class="input input-bordered w-full max-w-xs" />

                        </li>
                        <li>
                            <label for="jabatan">Jabatan :</label><br>
                            <input type="text" name="jabatan" id="jabatan" required placeholder="Masukkan jabatan..." class="input input-bordered w-full max-w-xs" />
                        </li>
                        <li>
                            <label for="gambar">Gambar :</label><br>
                            <input type="file" name="gambar" id="gambar" class="file-input file-input-bordered w-full max-w-xs" />
                        </li>
                        <div class="container mt-4 flex flex-col items-center">
                        <li>
                            <button class="btn btn-success " type="submit" name="submit">Tambah Data!</button>
                        </li>
                        </div>
                    </ul>


                </form>
            </div>
        </div>
    </div>
</body>
</html>