<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
  header('Location: login.php');
  exit;
}
require 'functions.php';

// ambil data di url
$id = $_GET["id"];
// query data pegawai berdasarkan id
$mhs = query("SELECT * FROM pegawai WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan
if ( isset ($_POST["submit"]) ) {
    
    // cek apakah data berhasil di ubah / tdk
    if ( ubah($_POST) > 0 ) {
        echo
        "<script>
            alert('Data berhasil di ubah');
                document.location.href = 'pegawai.php';
        </script>";
    } else {
        echo 
        "<script>
            alert('Data gagal di ubah');
        </script>";
    }
} 

?>



<!DOCTYPE html>
<html data-theme="forest" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah data pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>


</head>
<body>
    <div class="hero min-h-screen bg-base-100">
        <div class="hero-content flex-col lg:flex-row-reverse ">
            <div class="card p-6 shrink-0 w-full max-w-sm shadow-2xl bg-base-200">

    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"] ?>">
    <ul>
        <li>
            <label for="nik">Nik :</label>
            <input type="text" name="nik" id="nik" required value="<?= $mhs["nik"] ?>" class="input input-bordered w-full max-w-xs" />

        </li>
        <li>
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"] ?>" class="input input-bordered w-full max-w-xs" />

        </li>
        <li>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" required value="<?= $mhs["email"] ?>" class="input input-bordered w-full max-w-xs" />

        </li>
        <li>
            <label for="jabatan">Jabatan :</label>
            <input type="text" name="jabatan" id="jabatan" required value="<?= $mhs["jabatan"] ?>" class="input input-bordered w-full max-w-xs" />

        </li>
        <li>
            <label for="gambar">Gambar :</label>
            <img class="mt-1 mb-3" src="img/<?= $mhs['gambar'] ?>" alt="" width="50">
            <input type="file" name="gambar" id="gambar" class="file-input file-input-bordered w-full max-w-xs" />


        </li>
        <div class="container mt-2 flex flex-col items-center">
            <li>
                <button class="btn btn-success mt-4" type="submit" name="submit">Ubah Data!</button>
            </li>
        </div>
    </ul>
    </form>
            </div>
        </div>
    </div>
</body>
</html>