<?php

session_start();

if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

$nis = $_SESSION['username'];

$conn = mysqli_connect("localhost","root","","sia_tk");
$result = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = '$nis';");

$ppdb = mysqli_fetch_row($result);

$result2 = mysqli_query($conn, "SELECT * FROM ppdb WHERE id_ppdb = '$ppdb[1]';");

$user = mysqli_fetch_row($result2);

 ?>




<!DOCTYPE html>
<html>
<head>
  <title>Halaman User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="css/ppdb.css">
  <link rel="stylesheet" href="css/styles.css">
  
  <div class="header">
    <script type="https://kit.fontawesome.com/a076d05399.js"></script>
    <img src="assets/logotk.jpg" width="200">
    <h1>TK Islam Daarutaqwa</h1>
    <p>Jl. Raya bogor, KM. 44, Pakansari, Cibinong, Bogor, West Java 16915</p>
  </div>

  <div class="topnav">
    <a href="index.php">Mengenai Kita</a>
    <a href="fotokegiatan.php">Foto Kegiatan</a>
    <a href="ppdb.php">PPDB</a>
    <a href="logout.php" style="float:right" >Log Out</a>
  </div>
</head>
<body>
  <h1>Selamat Datang, <?= $user[1] ?></h1>
  <div class="container">
  <div class="content">
    <form class="#">

    <h2>Data Diri</h2>
<div class="user-details">

<div class="input-box">
      <label class="details">NIS :</label>
      <label><?= $nis ?></label>
 </div>
      <br><br>
<div class="input-box">

      <label>Nama :</label>
      <label><?= $user[1] ?></label>
</div>
      <br><br>
<div class="input-box">

      <label>Tanggal Lahir :</label>
      <label><?= $user[4] ?></label>
</div>

      <br><br>
<div class="input-box">

      <label>Tempat Lahir :</label>
      <label><?= $user[5] ?></label>
</div>

      <br><br>
<div class="input-box">

      <label>Kelompok Belajar :</label>
      <label><?= $ppdb[3] ?></label>
</div>

      <br>
</div>    
    <h2>Keuangan</h2>
      <label for="">Halaman Status Pembayaran</label>
      <div class="button">
      <input type="button" onclick="location.href='pembayaran.php';" value="Check" />
      </div>
      
    <h2>Nilai dan Rapot</h2>
    
      <label for="">Halaman Nilai dan Rapot</label>
      <div class="button">
      <input type="button" onclick="location.href='eraporuser.php';" value="Check" />
    
    </div>
      <br>
      <br>

</div>
</form>
</div>
    

</body>

<footer>
  <div class="kontainer">
    <div class="sec aboutus">
      <h1>TK Daarutaqwa</h1>
      <p>Merupakan TK Islam yang berlokasi di cibinong yang beralamat di jl. Raya bogor, KM. 44, Pakansari, Cibinong, Bogor, West Java 16915</p>

    </div>
    <div class="sec contact">
      <h1>Contact Info</h1>

      <ul class="info">
        <li>
          <span><i class="fa fa-map"></i></span>
          <span>Cibinong <br>
            Kab bogor <br>Indonesia</span></li>
        <li>
          <span><i class="fa fa-phone"></i></span>
          <p><a href="#">+1234567</a><br><a href="#">+1234567
          </p>
          </li>
            <li>
          <span><i class="fa fa-envelope"></i></span>
          <p><a href="#">tkislamdaarutaqwa@gmail.com</a></p>
          </li>
      </ul>
    </div>
</div>
<div class="body">
    <div class="sci">
      <li><a href="#"><span class="fa fa-facebook "></span></a></li>
      <li><a href="#"><span class="fa fa-instagram "></span></a></li>
      <li><a href="#"><span class="fa fa-twitter "></span></a></li>
      <li><a href="#"><span class="fa fa-youtube"></span></a></li>
     
      
    </div>
  </div>
</footer>
<div class="copyrightText">TK - Daarutaqwa ©2021</div>
</html>
