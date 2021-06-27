<?php   

session_start();

//index
// if (isset($_SESSION["login"])) {
//   header("location: indexAdmin.php");
//   exit;
// }

require 'functions.php';

if (isset ($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
      //cek username
      if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"])){
          $_SESSION['login'] = true;
          $_SESSION['username'] = $username;
          if (strpos(strtolower($username), 'admin') !== false){
          // if ($username contains 'admin'){
          header("Location:indexAdmin.php");
          exit;
            } else 
            header("Location:indexUser.php");
        } else 
          echo "<script> alert('Username atau Password Tidak Sesuai!'); </script>";
      } 

}
    
 ?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/loginform.css">
  <title>Masuk/Login</title>
</head>
<body>
  <div class="login-page">
  <div class="form">
    <form action="" class="login-form" method="post">
      <img src="assets/logotk.jpg">
      <input type="text" placeholder="username" name="username" id="username" />
      <input type="password" placeholder="password" name="password" id="password" />
      <button type="submit" name="login" id="login">login</button>
      <p class="message">Belum Memiliki Akun? <br>
        <a href="registrasi.php">Registrasi Melalui Admin</a>
        <br>  
        <a href="index.php">Home</a></p>

    </form>
  </div>
</div>

</body>
</html>