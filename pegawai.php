<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
  header('Location: login.php');
  exit;
}
require 'functions.php';

$pegawai = query("SELECT * FROM pegawai");

// tombol cari di tekan
if ( isset($_POST["cari"]) ) {
  $pegawai = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html data-theme="forest" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />

    <style>
      img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
      }
    </style>
</head>
<body>
  <!-- NAVBAR -->
  <div class="navbar bg-base-100">
      
  <!-- SIDEBAR -->
  <div class="flex-none">
    <div class="drawer">
      <input id="my-drawer" type="checkbox" class="drawer-toggle" />
      <div class="drawer-content">
       
          <button for="my-drawer" class="btn btn-square btn-ghost drawer-button"> 
            <label for="my-drawer" class=" drawer-button">
              <svg class="swap-off fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z"/></svg>
            </label>
          </button>
        
      </div>
      <div  class="drawer-side z-10">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
          <!-- Sidebar content here -->
          <a  href="tambah.php">
              <button class="btn btn-info m-5" >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
              </svg>
              Tambah data pegawai
            </button>
          </a>
          <li><a href="index.php">Dashboard</a></li>
          <li><a href="#">Data pegawai</a></li>
          <div class="dropdown dropdown-end ">
          <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar mt-6">
            <div class="w-10 rounded-full ">
              <img alt="Tailwind CSS Navbar component" src="img/mahasiswa.png" />
            </div>
          </div>
            <ul tabindex="0" class=" z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div>
        </ul>
      </div>
    </div>
    <!-- SIDEBAR END -->
  
  </div>
    <div class="flex-1">
    </div>
    <div class="flex-none gap-4">
      <!-- SEARCH BAR -->
      <div class="form-control ">
        <form action="" method="post">
          <input class="input input-bordered w-24 md:w-auto me-1.5" type="text" placeholder="Search" name="keyword" size="30" autofocus autocomplete="off"  />
          <button class="btn btn-outline btn-success " type="submit" name="cari">Cari!</button>
        </form>
      </div>
      <!-- SEARCH BAR END -->

      <!-- PROFIL NAVBAR -->
      <!-- <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
          <div class="w-10 rounded-full">
            <img alt="Tailwind CSS Navbar component" src="img/mahasiswa.png" />
          </div>
        </div>
        <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div> -->
      <!-- PROFIL NAVBAR END -->

    </div>
  </div>
  <!-- NAVBAR END -->

  <h1 class="text-center text-xl m-5">Daftar data pegawai</h1>

  <!-- <button class="btn btn-info">
  <a href="tambah.php">Tambah data pegawai</a>
  </button> -->

  <!-- <form action="" method="">
    
  <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
  <button class="btn btn-info" type="submit" name="cari">Cari!</button>
  
  </form> -->




  <!-- TABLE -->
  <div class="overflow-x-auto">
    <table class="table table-zebra">

    <?php $i = 1 ?> 
    <?php foreach( $pegawai as $row ) : ?>
    <tr>
      <th>No</th>
      <th>Foto</th>
      <!-- nomor identitas terdiri atas 2404010001 (tahun,bulan,jabatan( sekretasi = 1, marketing = 2, manajer = 3, direktur = 4) urutan) -->
      <th>Nomor Identitas</th> 
      <th>Nama</th>
      <th>Email</th>
      <th>Jabatan</th>
      <th>Aksi</th>
    </tr>

    <tr>
      <td><?= $i ?></td>
      <td>
        <img src="img/<?= $row["gambar"]?>" alt="">
      </td>
      <td><?= $row["nik"]?></td>
      <td><?= $row["nama"]?></td>
      <td><?= $row["email"]?></td>
      <td><?= $row["jabatan"]?></td>
      <td>
        <button class="btn btn-warning">
        <a href="ubah.php?id=<?= $row["id"]; ?>">Edit</a> 
        </button>
        |
        
        <button class="btn btn-error">
        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda yakin ingin menghapus data?')">Delete</a>
        </button>
      </td>
    </tr>

      <?php $i++ ?>
      <?php endforeach; ?>

    </table>
  </div>
  <!-- TABLE END-->

<!-- FOOTER -->
<footer class="footer footer-center p-4 bg-base-300 text-base-content">
  <aside>
    <p>Copyright © 2024 - All right reserved by Ilyas Al Furqon </p>
  </aside>
</footer>
<!-- FOOTER END -->

  <!-- CDN DaisyUI -->
  <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>